<?php

    function list_category(){
        $list_category = db_fetch_array("SELECT * FROM `tbl_category` ");
        return $list_category;
    }

    function get_catID_by_catName($catName){
        $item = db_fetch_row("SELECT `catID` FROM `tbl_category` WHERE `catName` = '{$catName}' ");
        return $item;
    }

    function update_level_by_catID($data,$catID){
        $level = db_update('tbl_category',$data," `catID` = '{$catID}' ");
        return $level;
    }

    function get_catName(){
        $catName = db_fetch_array("SELECT `catName` FROM `tbl_category`");
        return $catName;
    }

    function num_row_category(){
        $num_rows = db_num_rows("SELECT * FROM `tbl_category` "); 
        return $num_rows;
    }

    function paging_list_category($start,$num_per_page){
        $paging_list_category = db_fetch_array("SELECT * FROM `tbl_category` LIMIT {$start},{$num_per_page}");
        return $paging_list_category;
    }

    function get_category_by_id($id){
        $cat = db_fetch_row("SELECT `catName`,`parent_cat_id` FROM `tbl_category` WHERE `catID` = '{$id}' ");
        return $cat;
    }