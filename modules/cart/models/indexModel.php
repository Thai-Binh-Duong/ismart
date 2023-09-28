<?php
    function getProductById($id){
        $product = db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = $id ");
        return $product;
    }
    