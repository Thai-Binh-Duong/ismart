<?php
    
    function list_product(){
        $list_products = db_fetch_array(" SELECT * FROM `tbl_products` ");
        return $list_products;
    }

    function get_product_by_id($id){
        $product = db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = '{$id}' ");
        return $product;
    }

    function num_row_product(){
        $num_rows = db_num_rows("SELECT * FROM `tbl_products` "); 
        return $num_rows;
    }

    function paging_list_product($start,$num_per_page){
        $paging_list_product = db_fetch_array("SELECT * FROM `tbl_products` LIMIT {$start},{$num_per_page}");
        return $paging_list_product;
    }