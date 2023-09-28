<?php
    function has_child($data , $id){
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