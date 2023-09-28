<?php

function construct() {

    load_model('index');
    load('helper','data_tree');
    load('helper','pagination');
    load('helper','format');
}

function indexAction() {
    $data['list_product'] = get_list_product();
    $data['list_category'] = get_list_category();

    
    $cates = get_child_category(get_list_category(),1);
    // show_array($cates);

    // show_array( getProductByCatName("HP") );

    if( !empty($cates) ){
        foreach( $cates as $cate ){

            $result[] =  getProductByCatName( $cate['catName'] ) ;
            // $result[] = $cate['catName']; 
        }
        // show_array($result);
        $data['dien_thoai'] = $result;
        
    }

    $cates_laptop = get_child_category(get_list_category(),3);
    // show_array($cates_laptop);

    // show_array( getProductByCatName("HP") );

    if( !empty($cates_laptop) ){
        foreach( $cates_laptop as $cate_laptop ){

            $result_laptop[] =  getProductByCatName( $cate_laptop['catName'] ) ;
            // $result[] = $cate['catName']; 
        }
        // show_array($result);
        $data['laptop'] = $result_laptop;
        
    }

    load_view('index',$data);
}

function getProductAction(){

    $id = (int)$_GET['id'];
    $data = array();
    // $result = array();
    $data['id'] = $id;

    // $category = getCategoryByCatID($id);
    // show_array($category);

    $cates = get_child_category(get_list_category(),$id);
    // show_array($cates);

    // show_array( getProductByCatName("HP") );

    if( !empty($cates) ){
        foreach( $cates as $cate ){

            $result[] =  getProductByCatName( $cate['catName'] ) ;
            // $result[] = $cate['catName']; 
        }
        // show_array($result);
        $data['product'] = $result;
        
    }
    
    // $data['product'] = $result;
    $data['list_category'] = get_list_category();

    load_view('listProduct', $data);

}

function detailProductAction(){

    $id = (int) $_GET['id'];

    $catName = getCategoryById($id);

    $data['relate_product'] = getProductByCatName( $catName['product_cat'] );

    $data['product'] = getProductById($id);
    $data['list_category'] = get_list_category();
    
    load_view('detailProduct',$data);
}




