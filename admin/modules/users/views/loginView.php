<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/reset.css" type="text/css">
    <link rel="stylesheet" href="public/css/login.css" type="text/css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div id="wp_form_login">
        <h1 class="heading">Login</h1>
        <form id="form_login" action="" method="POST">
            <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Username"> 
            <?php echo form_error('username'); ?>
            <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password" autocomplete="on"> 
            <?php echo form_error('password'); ?>
            <input type="submit" name="btn_login" id="btn-login" value="LOGIN">
            <?php echo form_error('account');?>
        </form>

    </div>
</body>

</html>