<?php

function show_array($data) {
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}

function get_dateTime( $time ){
    if( !empty($time) && $time != 0 ){
        $dateTime = date('d/m/Y  H:i:s', $time );
    }
    return $dateTime;
}