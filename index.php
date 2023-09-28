<?php

/*
 * --------------------------------------------------------------------
 * app path
 * --------------------------------------------------------------------
 */

$app_path = dirname(__FILE__); //dir trả về đường dẫn của cha nó , __FILE__ trả về đường dẫn của file đang làm việc
// nên dirname(__FILE__) trả về đường dẫn file cha của file đang làm việc
define('APPPATH', $app_path); // define(tên,giá trị)
// Vậy APPPATH = $app_path = dirname(__FILE__) = trả về C://xampp/php1/.../section-26/project
/*
 * --------------------------------------------------------------------
 * core path
 * --------------------------------------------------------------------
 */
$core_folder = 'core';
define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);
// DIRECTORY_SEPARATOR là dấu / hoặc \ kết nối với đường dẫn sau - đúng với mọi trường hợp
// câu lệnh này trả về C://xampp/php1/.../section-26/project/core
/*
 * --------------------------------------------------------------------
 * modules path
 * --------------------------------------------------------------------
 */
$modules_folder = 'modules';
define('MODULESPATH', APPPATH.DIRECTORY_SEPARATOR.$modules_folder);
//tương tự câu lệnh này trả về C://xampp/php1/.../section-26/project/modules

/*
 * --------------------------------------------------------------------
 * helper path
 * --------------------------------------------------------------------
 */

$helper_folder = 'helper';
define('HELPERPATH', APPPATH.DIRECTORY_SEPARATOR.$helper_folder);
//tương tự câu lệnh này trả về C://xampp/php1/.../section-26/project/helper

/*
 * --------------------------------------------------------------------
 * library path
 * --------------------------------------------------------------------
 */
$lib_folder= 'libraries';
define('LIBPATH', APPPATH.DIRECTORY_SEPARATOR.$lib_folder);
//tương tự câu lệnh này trả về C://xampp/php1/.../section-26/project/libraries

/*
 * --------------------------------------------------------------------
 * layout path
 * --------------------------------------------------------------------
 */
$layout_folder= 'layout';
define('LAYOUTPATH', APPPATH.DIRECTORY_SEPARATOR.$layout_folder);
//tương tự câu lệnh này trả về C://xampp/php1/.../section-26/project/layout
/*
 * --------------------------------------------------------------------
 * config path
 * --------------------------------------------------------------------
 */
$config_folder= 'config';
define('CONFIGPATH', APPPATH.DIRECTORY_SEPARATOR.$config_folder);
//tương tự câu lệnh này trả về C://xampp/php1/.../section-26/project/config

require COREPATH.DIRECTORY_SEPARATOR.'appload.php';
//COREPATH đã được khai báo trên gần đầu với câu lệnh define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);
// COREPATH  trả về C://xampp/php1/.../section-26/project/core
// suy ra câu lệnh này trả về C://xampp/php1/.../section-26/project/core/appload.php
//câu lệnh này có hàm nghĩa là nhận dữ liệu từ đường dẫn trên (theo ý hiểu la lá là vậy) . Giờ chuyển qua appload.php
