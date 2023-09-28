<?php

function construct(){
    load_model('index');
    load_model('category');
    load('lib','validation');
    load('helper', 'check');
}

function addAction(){

    $data = array();
    
    global $error;
    // global $product_name,$product_code,$product_price,$product_short_desc,$desc,$url_thumb;

    if( isset( $_POST['btn-submit'] ) ) {
        
        // Validate product name price
        if(empty($_POST['product_name'])){
            $error['product_name'] = "Khong duoc de trong ten san pham ";
        }else{
            $product_name = $_POST['product_name'];
        }

        if(empty($_POST['productCat'])){
            $error['productCat'] = "Khong duoc de trong danh muc san pham";
        }else{
            $catName = $_POST['productCat'];
        }

        if(empty($_POST['product_code'])){
            $error['product_code'] = "Khong duoc de trong ma san pham ";
        }else{
            $product_code = $_POST['product_code'];
        }

        if(empty($_POST['product_price'])){
            $error['product_price'] = "Khong duoc de trong gia san pham ";
        }else{
            $product_price  = $_POST['product_price'];
        }

        if(empty($_POST['product_short_desc'])){
            $error['product_short_desc'] = "Khong duoc de trong mota ngan ";
        }else{
            $product_short_desc  = $_POST['product_short_desc'];
        }

        // CKeditor 
        if( isset( $_POST['product_desc'] ) ) {
            $desc  = $_POST['product_desc'];
        }else{
            $error['product_desc'] = "Khong duoc de trong mota chi tiet san pham ";
        }

        // UPLOAD IMAGE PART
        if( !empty($_FILES['file'])){

            // show_array($_FILES);

            $data['file'] = $_FILES;
            // show_array($data['file']);

            //Thu muc chua file upload len server
            $upload_dir ='public/images/upload/products/';
            //duong dan cua file sau khi upload
            $upload_file=$upload_dir.$_FILES['file']['name'];
            //Xu ly upload dung file anh
            $type_allow=array('png','jpg','gif','jpeg' , 'webp');
            //Lay duoi file de kiem tra xem co phai images khong
            $type=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
            // echo $type."<br>";
            if(!in_array(strtolower($type),$type_allow)){
                $error['type']="Chi duoc upload nhung file co duoi png,jpg,gif,jpeg,webp";
            };
            //Upload file co kich thuoc duoi 20MB ~ 29.000.000 byte
            $file_size=$_FILES['file']['size'];
            // echo $file_size."<br>";
            if($file_size > 29000000){
                $error['file_size']="Chi duoc up file duoi 20Mb";
            }
            //Kiem tra trung ten tren he thong
            if(file_exists($upload_file)){
                // $error['file_exists']="File da ton tai tren he thong";
                //==========================================================
                //Xu ly doi ten file tu dong tren he thong neu trung ten
                //==========================================================
                //Tao file moi = TenFile.DuoiFile
                $file_name=pathinfo($_FILES['file']['name'],PATHINFO_FILENAME);
                $new_file_name=$file_name."-Copy.";
                $new_upload_file=$upload_dir.$new_file_name.$type;
                $k=1;
                while(file_exists($new_upload_file)){
                    $new_file_name=$file_name."-Copy({$k}).";
                    $k++;
                    $new_upload_file=$upload_dir.$new_file_name.$type;
                }
                $upload_file=$new_upload_file;

            }
        
            if(empty($error)){

                if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_file)){
                    // echo $upload_file;
                    // echo "<a href='$upload_file'>Download:{$_FILES['file']['name']}</a>";
                    $data['url_thumb']  = $upload_file;
                    $url_thumb = $data['url_thumb'];
                    // echo $url_thumb;
                }else{
                    $error['file_upload']="Upload file ko thanh cong";
                }
            }else{
                // show_array($error);
            }
            
        }else{
            $error['file']="Chon anh san pham";
        }

        $admin = $_SESSION['user_login'];
        $create_time = time();

        if(empty($error)){
            // show_array($_POST);
            // show_array($_FILES);
            $data_insert = array(
                'product_name' => $product_name,
                'product_cat' => $catName,
                'product_main_image_url' => $url_thumb,
                'product_code' => $product_code,
                'product_price' => $product_price,
                'short_description' => $product_short_desc,
                'detail_description' => $desc,
                'create_time' => $create_time,
                'admin' => $admin,
            );
            db_insert('tbl_products', $data_insert);

            redirect("?mod=products&action=index");
        }
    }

    $data['categoryName'] = get_catName(); 

    load_view('addProducts', $data );
}

function indexAction(){
    load( 'helper' , 'pagination');
    // $data['list_product']  = list_product();

    // $num_rows = db_num_rows("SELECT * FROM `tbl_users` ");
    $num_rows = num_row_product(); // lay tong so ban ghi trong bang
        // Pagination
    $num_per_page = 5 ; // so ban ghi trong 1 trang
    $total_page = $num_rows ; 

    $data['num_page']  = ceil($total_page/$num_per_page); // lam tron so trang khi chia
    // echo $num_page ; 

    // Start
    $page = isset($_GET['page']) ? $_GET['page'] : 1 ;
    $data['page'] = $page;
    $start = ($page-1)*$num_per_page;
    $data['start'] = $start;
    //echo $start;
    
    // $list_users = db_fetch_array("SELECT * FROM `tbl_users` LIMIT {$start},{$num_per_page}");
    $data['list_product'] = paging_list_product($start,$num_per_page);

    load_view('index' , $data);
}

function updateAction(){

    (int)$id = $_GET['id']; 
    
    $curentpProduct = get_product_by_id($id);
    $curentpProductImage = $curentpProduct['product_main_image_url'];

    global $error;

    if( isset( $_POST['btn-update'] ) ){
        // show_array($_POST);
        // Validate product name price
        if(empty($_POST['product_name'])){
            $error['product_name'] = "Khong duoc de trong ten san pham ";
        }else{
            $product_name = $_POST['product_name'];
        }

        if(empty($_POST['productCat'])){
            $error['productCat'] = "Khong duoc de trong danh muc ";
        }else{
            $catName = $_POST['productCat'];
        }

        if(empty($_POST['product_code'])){
            $error['product_code'] = "Khong duoc de trong ma san pham ";
        }else{
            $product_code = $_POST['product_code'];
        }

        if(empty($_POST['product_price'])){
            $error['product_price'] = "Khong duoc de trong gia san pham ";
        }else{
            $product_price   = $_POST['product_price'];
        }

        if(empty($_POST['product_short_desc'])){
            $error['product_short_desc'] = "Khong duoc de trong mota ngan ";
        }else{
            $product_short_desc  = $_POST['product_short_desc'];
        }

        // CKeditor 
        if( isset( $_POST['product_desc'] ) ) {
            $desc = $_POST['product_desc'];
        }else{
            $error['product_desc'] = "Khong duoc de trong mota chi tiet san pham ";
        }

        // show_array($_FILES);

        // UPLOAD IMAGE PART
        if( !empty($_FILES['file']) && $_FILES['file']['name']){
        // Neu nguoi dung chon anh
            // show_array($_FILES);

            //Thu muc chua file upload len server
            $upload_dir ='public/images/upload/products/';
            
            //duong dan cua file sau khi upload
            $upload_file=$upload_dir.$_FILES['file']['name'];
            
            //Xu ly upload dung file anh
            $type_allow=array('png','jpg','gif','jpeg' , 'webp');
            //Lay duoi file de kiem tra xem co phai images khong
            $type=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
            // echo $type."<br>";
            if(!in_array(strtolower($type),$type_allow)){
                $error['type']="Chi duoc upload nhung file co duoi png,jpg,gif,jpeg,webp";
            };
            //Upload file co kich thuoc duoi 20MB ~ 29.000.000 byte
            $file_size=$_FILES['file']['size'];
            // echo $file_size."<br>";
            if($file_size > 29000000){
                $error['file_size']="Chi duoc up file duoi 20Mb";
            }
            //Kiem tra trung ten tren he thong
            // if(file_exists($upload_file)){
            //     // $error['file_exists']="File da ton tai tren he thong";
            //     //==========================================================
            //     //Xu ly doi ten file tu dong tren he thong neu trung ten
            //     //==========================================================
            //     //Tao file moi = TenFile.DuoiFile
            //     $file_name=pathinfo($_FILES['file']['name'],PATHINFO_FILENAME);
            //     $new_file_name=$file_name."-Copy.";
            //     $new_upload_file=$upload_dir.$new_file_name.$type;
            //     $k=1;
            //     while(file_exists($new_upload_file)){
            //         $new_file_name=$file_name."-Copy({$k}).";
            //         $k++;
            //         $new_upload_file=$upload_dir.$new_file_name.$type;
            //     }
            //     $upload_file=$new_upload_file;
            // }
        
            if(empty($error)){

                if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_file)){
                    // echo $upload_file;
                    // echo "<a href='$upload_file'>Download:{$_FILES['file']['name']}</a>";
                    $url_thumb  = $upload_file;
                    // echo $url_thumb;
                }else{
                    $error['upload_file'] = "Upload file ko thanh cong";
                }
            }else{
                // show_array($error);
            }
            
        }else{
            // neu nguoi dung khong chon thay doi anh
            $url_thumb = $curentpProductImage;
            // $error['file']="Chon anh san pham";
        }

        if(empty($error)){

            $data_update = array(
                'product_name' => $product_name,
                'product_cat' => $catName,
                'product_main_image_url' => $url_thumb,
                'product_code' => $product_code,
                'product_price' => $product_price,
                'short_description' => $product_short_desc,
                'detail_description' => $desc,
            );
            db_update('tbl_products', $data_update , "`id`= '{$id}' ");

            redirect("?mod=products&action=index");
        }else{
            // show_array($error);
        }
    }

    $data['product'] = get_product_by_id($id);

    $data['list_cate'] = get_catName();
    

    load_view('updateProduct',$data);
}

function deleteAction(){
    (int)$id = $_GET['id']; 
    db_delete('tbl_products',"`id`= {$id}");

    load_view('deleteProduct');
}
