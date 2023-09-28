<?php
    function get_list_order(){
        $list_order = db_fetch_array("SELECT * FROM `tbl_orders`");
        return $list_order;
    }

    function num_row_order(){
        $num_rows = db_num_rows("SELECT * FROM `tbl_orders` ");
        return $num_rows;
    }

    function paging_list_order($start,$num_per_page){
        $paging_list_order = db_fetch_array("SELECT * FROM `tbl_orders` LIMIT {$start},{$num_per_page}");
        return $paging_list_order;
    }

    function get_order_by_id($id){
        $order =  db_fetch_row("SELECT * FROM `tbl_orders` WHERE `id` = $id ");
        return $order;
    }

    function num_order_by_name($name){
        $num_rows = db_num_rows("SELECT * FROM `tbl_orders` WHERE `name` = '{$name}' ");
        return $num_rows;
    }
