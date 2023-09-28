<?php
    function construct(){
        load_model('index');
        load('helper','format');
    }

    function indexAction(){
    load( 'helper' , 'pagination');

    $num_rows = num_row_order(); // lay tong so ban ghi trong bang
    // Pagination
    $num_per_page = 5 ; // so ban ghi trong 1 trang
    $total_page = $num_rows ; 

    $data['num_page']  = ceil($total_page/$num_per_page); // lam tron so trang khi chia
    // echo $num_page ; 

    // Start
    $page = isset($_GET['page']) ? $_GET['page'] : 1 ;
    $data['page'] = $page;
    $start = ($page-1)*$num_per_page;
    $data['start'] = $start;
    //echo $start;

    $data['list_order'] = paging_list_order($start,$num_per_page);

    /*
        Giải thích : đầu tiên lấy tổng số bản ghi , setup số bản ghi trong 1 trang ,
        tính làm tròn lên số trang nếu nó lẻ khi chia,   
    */

        // $list_order = get_list_order();
        
        load_view('index',$data);
    }

    function detailOrderAction(){
        $id = (int)$_GET['id'];

        $data['order']  = get_order_by_id($id);
        

        load_view('detailOrder',$data);
    }

    function listCustomerAction(){

        

        load_view('listCustomer');
    }