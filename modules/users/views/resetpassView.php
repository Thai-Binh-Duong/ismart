<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy lại mật khẩu</title>
    <link rel="stylesheet" href="public/css/resetpass.css">
</head>
<body>
    <div class="form-reset-password">
        <h1>RESET PASSWORD</h1>
        <form action="" method="post">
            <input type="text" name="email-reset" placeholder="Email ">
            <p><?php echo form_error('email') ?></p>
            <input type="submit" name="reset_btn" value="Gửi Yêu Cầu"> <br>
        </form>
            <a href="?mod=users&action=login">Đăng nhập</a> | <a href="?mod=users&action=reg">Đăng ký</a>
    </div>
</body>
</html>