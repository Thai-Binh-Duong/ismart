<?php

function construct(){
    load_model('index');
    load('helper','format');
    load('lib','validation');
    load('helper','cart');
}

function indexAction(){
    update_info_cart();
    if( !empty($_SESSION['cart']['buy']) ) {
        if( isset( $_POST['order-btn'] ) ){
            $error = array();
            global $error,$fullname,$email,$address,$phone,$payment_method;
    
            if( !empty( $_POST['fullname'] ) ){
                $fullname = $_POST['fullname'];
            }else{
                $error['fullname'] = "Khong duoc de trong truong fullname";
            }

            if( !empty( $_POST['email'] ) ){
                if(is_email($_POST['email'])) {
                    $email = $_POST['email'];
                }else{
                    $error['email'] = "Du lieu khong phai email";
                }
            }else{
                $error['email'] = "Khong duoc de trong truong email";
            }

            if( !empty( $_POST['address'] ) ){
                $address = $_POST['address'];
            }else{
                $error['address'] = "Khong duoc de trong truong address";
            }

            if( !empty( $_POST['phone'] ) ){
                $phone = $_POST['phone'];
            }else{
                $error['phone'] = "Khong duoc de trong truong phone";
            }

            if( !empty( $_POST['payment_method'] ) ){
                $payment_method = $_POST['payment_method'];
            }else{
                $error['payment_method'] = "Khong duoc de trong truong payment_method";
            }
            $time = time();

            if(empty($error)){

                // echo $fullname."--".$payment_method."--".$email."--".$address."--".$phone."<br>";

                // // show_array ($_SESSION['cart']);
                // $json_cart =  json_encode($_SESSION['cart']);
                // echo $json_cart;
                // show_array( json_decode($json_cart,true) );
                
                $data = array(
                    'name' => $fullname,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'payment' => $payment_method,
                    'customer_order' => json_encode($_SESSION['cart']),
                    'note' => $_POST['note'],
                    'time_order' => $time,
                );

                db_insert('tbl_orders', $data);

                unset( $_SESSION['cart'] );

                redirect("?mod=home&action=index");
            }else{
                // show_array($error);
            }

        }
    }else{
        redirect("?mod=cart&action=index");
    }
    

    load_view('index');
}