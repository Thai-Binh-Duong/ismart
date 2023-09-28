<?php
    function check_user_login($username,$password){

        global $list_users;
        
        foreach( $list_users as $user ){
            if($username == $user['username'] && md5($password) == $user['password']){
                return true;
            }
        }
        return false;
    }

    function is_login(){
        if(isset($_SESSION['is_login']))
            return true;
        return false;
    }

    function user_login(){
        if(!empty($_SESSION['user_login'])){
            return $_SESSION['user_login'];
        }
    }

    function getinfo_user($username){
        global $list_users;
        if(isset($_SESSION['is_login'])){
            foreach($list_users as $id){
                if($username == $id['username']){
                    return $id['fullname'];
                }
            }
        }
    }
    