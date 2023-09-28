<?php

    function get_pagination( $num_page , $page , $base_url = "" ){
        $str_paging = "<ul id='list-paging' class='fl-right'>";

        if( $page > 1 ){
            $page_prev = $page -1;
            $str_paging.="<li><a href=\"{$base_url}&page={$page_prev}\">Truoc</a></li>";
        }

        for( $i=1 ; $i <= $num_page ; $i++ ) {
            $active = "";
            if( $i == $page ) $active = "class = 'active'";
            $str_paging.="<li {$active}><a href=\"{$base_url}&page={$i}\">{$i}</a></li>";
        }

        if( $page < $num_page ){
            $page_next = $page + 1;
            $str_paging.="<li><a href=\"{$base_url}&page={$page_next}\">Sau</a></li>";
        }

        $str_paging.= "</ul>";

        return $str_paging;
    }