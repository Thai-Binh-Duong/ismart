<?php
    function construct(){
        load_model('team');
    }

    function indexAction(){
        $list_user_admin = get_list_user_admin();
        $data['list_user'] = $list_user_admin;
        load_view('team',$data);
    }