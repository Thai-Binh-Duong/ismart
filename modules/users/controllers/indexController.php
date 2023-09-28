<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib','validation');
    load('lib','email');
}

function regAction(){
    global $fullname,$username,$password,$email,$error;

    $error=array();
    if(isset($_POST['btn_reg'])){
        if(empty($_POST['fullname'])){
            $error['fullname'] = "Khong duoc de trong truong fullname ";
        }else{
            $fullname = $_POST['fullname'];
        }

        if(empty($_POST['username'])){
            $error['user'] = "Khong duoc de trong username";
        }else{
            if(!is_username($_POST['username'])){
                $error['username'] = "Du lieu khong dung dinh dang";
            }else{
                $username = $_POST['username'];
            }
        }
        if(empty($_POST['password'])){
            $error['password'] = "Khong duoc de trong password";
        }else{
            if(!is_password($_POST['password'])){
                $error['password'] = "Du lieu khong dung dinh dang";
            }else{
                $password = md5($_POST['password']);
            }
        }
        if(empty($_POST['email'])){
            $error['email'] = "Khong duoc de trong email";
        }else{
            if(!is_email($_POST['email'])){
                $error['email'] = "Du lieu khong dung dinh dang";
            }else{
                $email = $_POST['email'];
            }
        }
        // kiem tra xem co loi khong
        if(empty($error)){
            // kiem tra tai khoan da ton tai chua
            if(!user_exists($username,$email)){
                $active_token = md5($username.time());
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'active_token' => $active_token
                );
                add_data($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content="
                    <p>Chào bạn '{$fullname}'</p>
                    <p>Mời bạn vui lòng click vào link này để xác thực tài khoản</p>
                    <a href='$link_active'>$link_active</a>
                    <p>Nếu không phải email của bạn , xin bỏ qua email này</p>
                ";
                send_email($email,$fullname,'Kich hoat tai khoan',$content);
                // redirect("?mod=users&action=login");
            }else{
                $error['account'] = "Username hoac Email da ton tai tren he thong!!";
            }
        }else{

        }
    }
    load_view('reg');
}

function activeAction(){
    $active_token = $_GET['active_token'];
    if(check_active_token($active_token)){
        active_user($active_token);
        echo "Bạn đã kích hoạt tài khoản thành công. Click vào link để đăng nhập <a href='?mod=users&action=login'>Login</a>";
    }else{
        echo "Yêu cầu kích hoạt tài khoản không thành công hoặc tài khoản đã được kích hoạt trước đó. Click vào link để đăng nhập <a href='?mod=users&action=login'>Login</a>";
    }
}

function loginAction(){
    global $username,$password,$error;

    $error=array();
    if(isset($_POST['btn_login'])){
        
        if(empty($_POST['username'])){
            $error['user'] = "Khong duoc de trong username";
        }else{
            if(!is_username($_POST['username'])){
                $error['username'] = "Du lieu khong dung dinh dang";
            }else{
                $username = $_POST['username'];
            }
        }
        if(empty($_POST['password'])){
            $error['password'] = "Khong duoc de trong password";
        }else{
            if(!is_password($_POST['password'])){
                $error['password'] = "Du lieu khong dung dinh dang";
            }else{
                $password = md5($_POST['password']);
            }
        }
        // kiem tra xem co loi khong
        if(empty($error)){
            // kiem tra tai khoan da ton tai chua
            if(check_login($username,$password)){
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                redirect("?");
            }else{
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại";
            }
        }else{

        }
    }  
    load_view('login');
}

function logoutAction(){
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}

function resetpassAction(){
    global $email,$error;

    if( !empty($_GET['reset_token'])  ){
        $reset_token = $_GET['reset_token'];
    }
    
    if(!empty($reset_token)){
        if(check_reset_token($reset_token)){
            if(isset($_POST['btn-new-pass'])){
                $error = array();
                if(empty($_POST['password'])){
                    $error['password'] = "Khong duoc de trong password";
                }else{
                    if(!is_password($_POST['password'])){
                        $error['password'] = "Du lieu khong dung dinh dang";
                    }else{
                        $password = md5($_POST['password']);
                    }
                }
                if(empty($error)){
                    $data = array(
                        'password' => $password,
                    );
                    update_pass($data , $reset_token);
                    redirect('?mod=users&action=resetOk');
                }
            }

            load_view('newPass');
        }else{
            echo "Yêu cầu lấy lại mật khẩu không hợp lệ";
        }
    }else{
        $error = array();
        if(isset($_POST['reset_btn']) ){
            if(empty($_POST['email-reset'])){
                $error['email'] = "Không được để trống email";
            }else{
                if(!is_email($_POST['email-reset'])){
                    $error['email'] = "Cấu trúc email sai";
                }else{
                    $email = $_POST['email-reset'];
                }
            }
        if(empty($error)){
            if(check_email($_POST['email-reset'])){
                // lưu trữ phiên đang nhập
                $reset_token = md5($email.time());
                $data = array(
                    'reset_token' => $reset_token,
                );
                // cập nhật reset password cho người dùng
                update_reset_token($data,$email);
                // gửi link khôi phục vào email người dùng
                $link_reset_password = base_url("?mod=users&action=resetpass&reset_token={$reset_token}");
                $content = "
                    <p>Bạn vui lòng click vào <a href='{$link_reset_password}'> Link sau </a> để khôi phục mật khẩu. Nếu không phải yêu cầu của bạn , vui lòng bỏ qua email này</p>
                ";
                send_email($email,' ','Khoi phuc mat khau',$content);
            }else{
                $error['email'] = "Email không tồn tại trong hệ thống";
            }
            }
        }

        load_view('resetpass');
        }
}

function resetOkAction(){
    load_view('resetOk');
}


function indexAction() {
    load('helper','format');
    $list_users = get_list_users();
// show_array($list_users);
    $data['list_users'] = $list_users;
    load_view('index', $data);
}

function addAction() {
    echo "Thêm dữ liệu";
}

function editAction() {
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}
function delete(){
    
}