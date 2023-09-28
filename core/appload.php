<?php
defined('APPPATH') OR exit('Không được quyền truy cập phần này');
// APPPATH = $app_path = dirname(__FILE__) = trả về C://xampp/php1/.../section-26/project
// câu lệnh này có nghĩa là ??

// Include file config/database
require CONFIGPATH . DIRECTORY_SEPARATOR . 'database.php';
// CONFIGPATH  trả về C://xampp/php1/.../section-26/project/config
// vậy tức là require C://xampp/php1/.../section-26/project/config/database.php

// Include file config/config
require CONFIGPATH . DIRECTORY_SEPARATOR . 'config.php';
// tương tự là require C://xampp/php1/.../section-26/project/config/config.php

// Include file config/email
require CONFIGPATH . DIRECTORY_SEPARATOR . 'email.php';
// tương tự là require C://xampp/php1/.../section-26/project/config/email.php

// Include file config/autoload
require CONFIGPATH . DIRECTORY_SEPARATOR . 'autoload.php';
// tương tự là require C://xampp/php1/.../section-26/project/config/autoload.php


// Include core database
require LIBPATH . DIRECTORY_SEPARATOR . 'database.php';
// tương tự là require C://xampp/php1/.../section-26/project/libraries/database.php

// Include core base

require COREPATH . DIRECTORY_SEPARATOR . 'base.php';
// tương tự là require C://xampp/php1/.../section-26/project/core/base.php


if (is_array($autoload)) {
    // $autoload ta khai báo từ config/autoload.php 
    // nó là 1 mảng gắn giá trị : $autoload['lib'] = array(); $autoload['helper'] = array('data','users','url');
    foreach ($autoload as $type => $list_auto) {
        // lấy giá trị của $autoload với key và value vd : key => helper , value => data ...
        if (!empty($list_auto)) {
            // nếu value có giá trị 
            foreach ($list_auto as $name) {
                load($type, $name);
                // hàm load được viết trong base.php
                /* function load($type, $name) {
                    if ($type == 'lib')
                        $path = LIBPATH . DIRECTORY_SEPARATOR . "{$name}.php"; 
                    if ($type == 'helper')
                        $path = HELPERPATH . DIRECTORY_SEPARATOR . "{$name}.php";
                        // VD : C://xampp/php1/.../section-26/project/helper/users.php
                    if (file_exists($path)) {
                        require "$path";
                    } else {
                        echo "{$type}:{$name} không tồn tại";
                    }
                    
                }
                */
            }
        }
    }
}



//
//connect db
db_connect($db);
// hàm db_connect lấy từ database trong lib , $db lấy từ database trong config
// kết hợp lại và từ db_connect ta có được $conn cho tất cả trang trong web

require COREPATH . DIRECTORY_SEPARATOR . 'router.php';
// tương tự là require C://xampp/php1/.../section-26/project/core/router.php
// hàm route có tác dụng điều hướng , trỏ tới các controller để controller đưa về view
















