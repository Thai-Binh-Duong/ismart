<?php
// USER
// function get_list_users() {
//     $result = db_fetch_array("SELECT * FROM `tbl_users`");
//     return $result;
// }

// function get_user_by_id($id) {
//     $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
//     return $item;
// }

//PRODUCTS
function get_list_product() {
    $result = db_fetch_array("SELECT * FROM `tbl_products`");
    return $result;
}

function getProductById($id){
    $product = db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = $id ");
    return $product;
}

function getCategoryById($id){
    $product_cat = db_fetch_row("SELECT `product_cat` FROM `tbl_products` WHERE `id` = $id ");
    return $product_cat;
}

function getProductByCatName( $catName ){
    $products = db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_cat` = '{$catName}' ");
    return $products;
}

//CATEGORY
function get_list_category() {
    $result = db_fetch_array("SELECT * FROM `tbl_category`");
    return $result;
}

function getCategoryByCatID( $id ){
    $category = db_fetch_row("SELECT `catName`,`level` FROM `tbl_category` WHERE `catID` = $id ");
    return $category;
}

