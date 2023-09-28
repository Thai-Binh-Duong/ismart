<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiết lập mật khẩu mới</title>
    <link rel="stylesheet" href="public/css/resetpass.css">
</head>
<body>
    <div class="form-reset-password">
        <h1>Đổi Mật Khẩu Mới</h1>
        <form action="" method="post">
            <input type="password" name="password" placeholder="Password ">
            <p><?php echo form_error('password') ?></p>
            <input type="submit" name="btn-new-pass" value="Lưu Mật Khẩu"> <br>
            <p><?php echo form_error('account') ?></p>
        </form>
    </div>
</body>
</html>