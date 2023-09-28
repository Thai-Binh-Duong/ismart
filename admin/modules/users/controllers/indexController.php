<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib','validation');
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
    // B1 xay giao dien 
    // B2 validation
    // B3 check pass word cu
    // B4 update
    global $error;

    if( isset( $_POST['btn-update-password'] ) ){
        if(empty($_POST['pass_old'])){
            $error['pass_old'] = "Khong duoc de trong";
        }else{
            if(!is_password($_POST['pass_old'])){
                $error['pass_old'] = "Du lieu khong dung dinh dang";
            }else{
                $pass_old = md5($_POST['pass_old']);
            }
        }

        if(empty($_POST['pass_new'])){
            $error['pass_new'] = "Khong duoc de trong";
        }else{
            if(!is_password($_POST['pass_new'])){
                $error['pass_new'] = "Du lieu khong dung dinh dang";
            }else{
                $pass_new = md5($_POST['pass_new']);
            }
        }

        if(empty($_POST['confirm_pass'])){
            $error['confirm_pass'] = "Khong duoc de trong";
        }else{
            if(!is_password($_POST['confirm_pass'])){
                $error['confirm_pass'] = "Du lieu khong dung dinh dang";
            }else{
                $confirm_pass = md5($_POST['confirm_pass']);
            }
        }

        if( empty($error) ){
            if( $pass_old == get_password_by_username( user_login() )['password']){
                
                if( $pass_new === $confirm_pass ){
                    $data = array(
                        'password' => $pass_new,
                    );
                    update_password($data , user_login() );
                }else{
                    $error['new_password'] = "Mat khau moi khong giong nhau"; 
                }
            }else{
                $error['old_password'] = "Mat khau cu khong dung "; 
            }
        }
    }
    load_view('resetpass');
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
function deleteAction(){
    
}

function updateAction(){
    // B1 Tajo giao dien 
    // B2 Load lai thong tin cu
    // B3 Validation Form
    // B4 Cap nhat thong tin

    global $error;

    if( isset( $_POST['btn-submit'] ) ){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $address = $_POST['address'];

        if(empty($_POST['email'])){
            $error['email'] = "Khong duoc de trong email";
        }else{
            if(!is_email($_POST['email'])){
                $error['email'] = "Du lieu khong dung dinh dang";
            }else{
                $email = $_POST['email'];
            }
        }
        if(empty($_POST['phone_number'])){
            $error['phone_number'] = "Khong duoc de trong phone_number";
        }else{
            if(!is_phone_number($_POST['phone_number'])){
                $error['phone_number'] = "Du lieu khong dung dinh dang";
            }else{
                $phone_number = $_POST['phone_number'];
            }
        }

        // kiem tra xem co loi khong
        if(empty($error)){
            // kiem tra tai khoan da ton tai chua
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'phone_number' => $phone_number,
                'address' => $address,
            );
            update_user_login($data,$username);
        }
    }
    $info_user =  get_user_by_username( user_login() );
    $data['info'] = $info_user;

    load_view('update', $data );
}