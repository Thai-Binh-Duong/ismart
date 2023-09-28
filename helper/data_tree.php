<?php
    function has_child( $data , $id ){
        foreach( $data as $v ){
            if( $v['parent_cat_id'] == $id ){
                return true;
            }
        }
        return false;
    }

    function data_tree( $data , $parent_cat_id = 0 , $level = 0){
        $result = array();

        foreach($data as $v){
            if($v['parent_cat_id'] == $parent_cat_id ){
                $v['level'] = $level;
                $result[] = $v;
                $result_child = array();
                if( has_child( $data, $v['catID'] ) )
                    $result_child = data_tree( $data , $v['catID'] , $level+1);
                    $result = array_merge( $result , $result_child );
            }
        }
        return $result;
    }

    function render_menu( $data , $parent_cat_id = 0 , $level = 0){
        if( $level == 0 ){
            $result = "<ul class='list-item'>";
        }else{
            $result = '<ul class="sub-menu">';
        }

        foreach($data as $v){
            if($v['parent_cat_id'] == $parent_cat_id ){
                $result .= "<li>";
                $result .= "<a href='?mod=home&action=getProduct&id={$v['catID']}'>{$v['catName']}</a>";
                

                if( has_child( $data, $v['catID'] ) )
                    $result .= render_menu( $data , $v['catID'] , $level+1);

                $result .= "</li>";
            }
        }

        $result .= "</ul>";

        return $result;
    }

    function get_child_category( $data , $id ){
        $result = array();

        foreach($data as $v){

            if($v['catID'] == $id ){
                
                $result[] = $v;
                
                // $result_child = array();
                if(has_child( $data , $id )){
                    $result = data_tree( $data , $id);
                    // $result = array_merge( $result , $result_child );
                }
                // foreach( $data as $s ){
                //     if( $s['parent_cat_id'] == $id ){
                //         $result[] = $s;
                //         // $result = array_merge( $result , $result_child );
                //     }
                // }
                
            }
        }
        return $result;
    }

    /*  
        ví dụ $id = 1 => cate: điện thoại => gán mảng cate:điện thoại vào $result;
        check has_child( $data , $id )
    */

    /* nếu cái category có catID = $id thì kiểm tra xem có category con không ,
    nếu có thì result =  array() ( cho các category con vào result)
    kiểm tra các category con có con không và tiếp tục cho vào hàm result_child()
    nếu có cho các category con vào result_child tiếp tục và cuối cùng array_merge();
     */ 