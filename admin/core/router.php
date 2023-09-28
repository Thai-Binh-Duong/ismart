<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller().'Controller.php';
// C://xampp/php1/.../section-26/project/modules/{module mình cần}/controllers/{controller mình cần}Controller.php   Ví dụ : .../home/controllers/indexController.php
//ý hiểu là lấy đường dẫn file này để router gọi đến controller để xử lý 
// require theo ý hiểu là lấy các dữ liệu bên file kia về để dùng trong file này
if (file_exists($request_path)) {
    // nếu đường dẫn này tồn tại 
    require $request_path;
    // thì require đường dẫn này
} else {
    echo "Không tìm thấy:$request_path ";
}

$action_name = get_action().'Action';
// trong controller khai báo các hàm đều bao gồm Action ở sau Ví dụ : function indexAction(){}

call_function(array('construct', $action_name));
// hàm call_function() lấy 1 giá trị mảng , lặp nó để nó trả về từng dữ liệu 1 theo kiểu key=> value

if(!is_login() && get_action() != 'login' ){
    redirect("?mod=users&action=login");
}
// nếu không phải các action trên thì chuyển tất cả về login 






