<?php

    function get_list_user_admin(){
        $list_user =  db_fetch_array("SELECT * FROM `tbl_users`");
        return $list_user;
    }