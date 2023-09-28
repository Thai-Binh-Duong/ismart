<?php

function construct(){
    load_model('index');
    // load('helper','data_tree');
    // load('helper','pagination');
    load('helper','format');
    load('helper','cart');
}

function indexAction(){

    update_info_cart();
    // echo count($_SESSION['cart']['buy'])."<br>";

    // show_array($_SESSION['cart']['buy']);

    load_view('index');
}

function addCartAction()
    {
    

    if( isset($_GET['id']) ){
        $id = (int)$_GET['id'];
        // global $list_product;
        // $item = get_product_by_id($id);
        // $data['id'] = $id;

        // $data['item'] = getProductById($id) ;
        $item = getProductById($id) ;

        // show_array($item);
        //them thong tin vao gio hang

        $qty = 1;
        
        $_SESSION['cart']['buy'][$id] =  array(
            'id' => $item['id'],
            'product_name' => $item['product_name'],
            'product_cat' => $item['product_cat'],
            'product_price' => $item['product_price'],
            'product_main_image_url' => $item['product_main_image_url'],
            'product_code' => $item['product_code'],
            'qty' => $qty,
            'sub_total' => $qty * $item['product_price'],
        );
        
        // show_array( $_SESSION['cart']['buy']);
    }

        redirect("?mod=cart&action=index");
    }

    /*
        $cart_json = json_encode($cart['buy']);
        echo $cart_json;

        $cart_array = json_decode($cart_json , true);
        echo "<pre>";
        print_r($cart_array);

        // array => json_encode() => save DB => string json
        => json_decode(... , true) => array => xuat len GD;

    */

    function delete_cartAction()
    {
        $id = (int)$_GET['id'];

        if ( !empty($_SESSION['cart']['buy'][$id]) ) {
            // xoa san pham co $id trong gio hang
            unset( $_SESSION['cart']['buy'][$id] );
            redirect("?mod=cart&action=index");
        }
    }

    function buyNowAction(){
        $id = (int)$_GET['id'];
        
        $item = getProductById($id) ;
        // show_array($item);
        
        $qty = 1;
        
        $_SESSION['cart']['buy'][$id] =  array(
            'id' => $item['id'],
            'product_name' => $item['product_name'],
            'product_cat' => $item['product_cat'],
            'product_price' => $item['product_price'],
            'product_main_image_url' => $item['product_main_image_url'],
            'product_code' => $item['product_code'],
            'qty' => $qty,
            'sub_total' => $qty * $item['product_price'],
        );

        redirect("?mod=checkout&action=index");
    }

    function update_ajaxAction(){

        $id = json_decode( $_POST['id'] , true);
        $num_order = json_decode( $_POST['num_order'] , true);
        $product_price = json_decode( $_POST['product_price'] , true);

        // $total_product = $_SESSION['cart']['info']['num_order'];
        // $total_price = $_SESSION['cart']['info']['total'];
        // echo $id."---".$num_order."---".$product_price;

        if( isset( $_SESSION['cart']['buy'] )  && array_key_exists($id,$_SESSION['cart']['buy']) ){
            // cap nhat so luong
            $_SESSION['cart']['buy'][$id]['qty'] = $num_order;
            // cap nhat tong tien
            $sub_total_price = $num_order*$product_price;

            $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total_price ;

            $data = array(
                'id' => $id,
                'num_order' => $num_order ,
                'sub_total_price' => currency_format($sub_total_price),
            );
            update_info_cart();

            $data['total_product'] = $_SESSION['cart']['info']['num_order'];
            $data['total_price'] =  currency_format($_SESSION['cart']['info']['total']);

            echo json_encode($data);
        }

        // $data_info = array(
        //     'total_product' => $total_product,
        //     'total_price' => $total_price,
        // );
        // echo json_encode($data_info);
    }
