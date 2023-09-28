<?php

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

// them du lieu
function add_data($data){
    return db_insert('tbl_users',$data);
}

// kiem tra xem tai khoan da ton tai chua
function user_exists($username,$email){
    $check_user = db_num_rows(" SELECT * FROM `tbl_users` WHERE `username`= '{$username}' OR `email` = '{$email}' ");
    if($check_user > 0){
        return true;
    }
    
}

function active_user($active_token){
    return db_update('tbl_users',array('is_active' => 1)," `active_token` = '{$active_token}' ");
    
}

function check_active_token($active_token){
    $check = db_num_rows(" SELECT * FROM `tbl_users` WHERE `is_active`= '0' AND `active_token` = '{$active_token}' ");
    if($check > 0)
        return true;
    return false;
}

function check_reset_token($reset_token){
    $check_reset_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token`= '{$reset_token}'  ");
    if($check_reset_token > 0)
        return true;
    return false;
}

function update_pass($data , $reset_token){
    return db_update('tbl_users',$data," `reset_token` = '{$reset_token}' ");

}

function check_login($username,$password){
    $check_li = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    if($check_li > 0)
        return true;
    return false;
}

function check_email($email){
    $check_li = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
    if($check_li > 0)
        return true;
    return false;
}

function update_reset_token($data,$email){
    return db_update('tbl_users',$data,"`email` = '{$email}'");
}