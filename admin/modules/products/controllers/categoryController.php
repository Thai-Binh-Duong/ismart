<?php

function construct(){
    load_model('category');
    load('helper','data_tree');
    load('lib','validation');
    load('helper', 'pagination');
    load('helper', 'check');
}

function indexAction(){
    
    $num_rows = num_row_category(); // lay tong so ban ghi trong bang
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
    $data['list_category'] = paging_list_category($start,$num_per_page);

    // $data['list_category']  = list_category();

    // show_array(list_category());
    // show_array($data['list_category']);

    $data_tree = data_tree( list_category());

    // show_array($data_tree) ;

    if( !empty($data_tree) ){

        foreach( $data_tree as $item ){

            $level = array(
                'level' => $item['level'],
            );
            $catID  = get_catID_by_catName( $item['catName'] );

            update_level_by_catID( $level , $catID['catID'] );
            // echo $catID['catID'];
        }
    }

    load_view('categoryIndex' , $data);
}

function addAction(){

    $data['list_category'] = list_category();

    global $error , $cateName , $parent_Cat;

    if( isset( $_POST['btn-add'] ) ) {

        // show_array($_POST);

        if(empty($_POST['cateName'])){
            $error['cateName'] = "Khong duoc de trong ten danh muc";
        }else{
            $cateName = $_POST['cateName'];
        }

        if(empty($_POST['parent_Cat'])){
            $parent_cat_id = 0;
        }else{
            $parent_Cat = get_catID_by_catName($_POST['parent_Cat']);
            $parent_cat_id = $parent_Cat['catID'];
        }

        $admin = $_SESSION['user_login'];
        $create_time = time();

        if(empty($error)){

            $data_insert = array(
                'catName' => $cateName,
                'parent_cat_id' => $parent_cat_id,
                'create_time' => $create_time,
                'admin' => $admin,
            );
            db_insert('tbl_category', $data_insert);

            redirect("?mod=products&controller=category&action=index");
        }
    }
    load_view('addCategory', $data );
}

function updateAction(){
    $id = (int) $_GET['id'];

    $data['list_cate_parent'] = list_category();
    $data['cate'] = get_category_by_id($id);

    global $error;

    if( isset($_POST['btn-update']) ){

        if(empty($_POST['cateName'])){
            $error['cateName'] = "Khong duoc de trong category ";
        }else{
            $data['cateName']  = $_POST['cateName'];
            $cateName = $data['cateName'];
        }

        // if(empty($_POST['cateName'])){
        //     $error['cateName'] = "Khong duoc de trong ten danh muc";
        // }else{
        //     $cateName = $_POST['cateName'];
        // }

        if(empty($_POST['parent_Cat'])){
            $parent_cat_id = 0;
        }else{
            $parent_Cat = get_catID_by_catName($_POST['parent_Cat']);
            $parent_cat_id = $parent_Cat['catID'];
        }

        if(empty($error)){

            $data_update = array(
                'catName' => $cateName,
                'parent_cat_id' => $parent_cat_id,
            );
            db_update('tbl_category', $data_update , "`catID` = $id");

            redirect("?mod=products&controller=category&action=index");
        }
    }


    load_view('updateCategory' , $data);
}

function deleteAction(){
    (int)$id = $_GET['id']; 
    db_delete('tbl_category',"`catID`= {$id}");

    load_view('deleteCategory');
}

/*
    Cau truc link than thien
    # Trang 
    yourdomain.com/lien-he.html

    #Bai Viet
    yourdomain.com/bai-viet/meo-vat
    yourdomain.com/bai-viet/meo-sac-pin-iphone-can-biet.html 

    #San Pham
    yourdomain.com/san-pham/dien-thoai
    yourdomain.com/san-pham/dien-thoai-iphone-14.html 
*/