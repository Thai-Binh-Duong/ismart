<?php

// Hàm kết nối dữ liệu
function db_connect()
{
    global $conn;
    $db = func_get_arg(0);
    // echo "<pre>";
    // print_r($db);
    // echo "</pre>";
    $conn = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);
    if (!$conn) {
        die("Kết nối không thành công " . mysqli_connect_error());
    } 
    // else {
    //     echo "Connect thành công";
    // }
}

//Thực thi chuổi truy vấn
function db_query($query_string)
{
    global $conn;
    $result = mysqli_query($conn, $query_string);
    if (!$result) {
        db_sql_error('Query Error', $query_string);
    }
    return $result;
}

// Lấy một dòng trong CSDL
function db_fetch_row($query_string)
{
    global $conn;
    $result = array();
    $mysqli_result = db_query($query_string);
    // ở trên , có tác dụng kết nối với csdl
    $result = mysqli_fetch_assoc($mysqli_result);
    // Hàm mysqli_fetch_assoc() sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp.
    mysqli_free_result($mysqli_result);
    // Hàm mysqli_free_result() sẽ giải phóng bộ nhớ của biến đã lưu kết quả truy vấn trước đó.
    return $result;
}

//Lấy một mảng trong CSDL
function db_fetch_array($query_string)
{
    global $conn;
    $result = array();
    $mysqli_result = db_query($query_string);
    while ($row = mysqli_fetch_assoc($mysqli_result)) {
 // Hàm mysqli_fetch_assoc() sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp.
        $result[] = $row;
// kết nối CSDL thành công, thực thi hàm trả về 1 mảng (kết quả của nhiều dòng)
// lặp giá trị mảng này và trả về 1 mảng result 
    }
    mysqli_free_result($mysqli_result);
    return $result;
}

//Lấy số bản ghi
function db_num_rows($query_string)
{
    global $conn;
    $mysqli_result = db_query($query_string);
    return mysqli_num_rows($mysqli_result);
    // Hàm mysqli_num_rows() sẽ trả về số hàng trong tập hợp kết quả truyền vào.
}

function db_insert($table, $data)
{
    global $conn;
    $fields = "(" . implode(", ", array_keys($data)) . ")";
/*
$data = array(
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                'username' => $username,
                'gender' => $gender,
            );
*/
// print_r(array_keys($data)); => Array(  [0] => fullname , [1] => email , [2] => password , [3] => username , [4] => gender )
// $str = implode(", ", $arrays);  => fullname, email, password, username, gender
// $fields = (fullname, email, password, username, gender)
    $values = "";
    foreach ($data as $field => $value) {

// $data as $field => $value (tức là lấy key của $data trỏ tới từng giá trị của chính nó)
        if ($value === NULL)
            $values .= "NULL, ";
        else
            $values .= "'" . escape_string($value) . "', ";
    }
    // echo $values; // '$fullname', '$email', '$password', '$username', '$gender',
    $values = substr($values, 0, -2);
    //  echo $values; //  '$fullname', '$email', '$password', '$username', '$gender'   (xoa dau tru o cuoi cung)
// Hàm substr() sẽ trích xuất một phần của chuỗi, phần chuỗi được trích xuất sẽ tùy thuộc vào tham số truyền vào.
// echo $rest = substr("abcdef", 2, -1) "; // cde  vì 2 là b nên nó lấy từ c đến 0 là bỏ b và a , 
// đến 0 nó tính từ phải sang trái , tức là muốn lấy đến -1 thì sẽ bỏ f 
// vậy 2 -1 tức là bỏ lần lượt theo thứ tự b a f 
// vậy code substr($values, 0, -2) nó sẽ bỏ từ phải sang trái 2 kí tự lần lượt là dấu cách và dấu phẩy => xóa 2 kí tự thừa

    db_query("
            INSERT INTO `{$table}` $fields
            VALUES($values)
        ");
// ( INSERT INTO `tbl_users` (fullname, email, password, username, gender) VALUES('$fullname', '$email', '$password', '$username', '$gender'))
    return mysqli_insert_id($conn);
// hàm mysqli_insert_id() trả về id ta vừa insert => mục đích là lấy ra id để echo kiểm tra hoặc làm gì đấy
}

function db_update($table, $data, $where)
{
    global $conn;
    $sql = "";
/*$data = array(
                'fullname' => $fullname,
                'gender' => $gender,
            );
            db_update('tbl_users',$data,"`user_id`=$id");
*/
    foreach ($data as $field => $value) {
        if ($value === NULL)
            $sql .= "$field=NULL, ";
        
        else
            $sql .= "$field='" . escape_string($value) . "', ";
    }
    $sql = substr($sql, 0, -2);
    db_query("
            UPDATE `{$table}`
            SET $sql
            WHERE $where
    ");
    return mysqli_affected_rows($conn);
}

function db_delete($table, $where)
{
    global $conn;
    $query_string = "DELETE FROM `{$table}` WHERE $where";
/*
$id = (int)$_GET['id'];
db_delete('tbl_users',"`user_id`= {$id}");
*/
    db_query($query_string);
    return mysqli_affected_rows($conn);
}

function escape_string($str)
{
    global $conn;
    return mysqli_real_escape_string($conn, $str);
// hàm mysqli_real_escape_string sẽ xóa nhưng kí tự đặc biệt trong câu truy vấn để ko bị mysql injection
}

// Hiển thị lỗi SQL

function db_sql_error($message, $query_string = "")
{
    global $conn;

    $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
    $sqlerror .= "<tr><th colspan='2'>{$message}</th></tr>";
    $sqlerror .= ($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
    $sqlerror .= "<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno($conn) . " " . mysqli_error($conn) . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
    $sqlerror .= "</table>";
    $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
    echo $msgbox_messages;
    exit;
}

