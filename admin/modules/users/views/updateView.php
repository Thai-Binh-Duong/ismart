<?php
    get_header();
?>

<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left  margin-0-20">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix border-top-1px-solid-ddd">

        <?php get_sidebar('user'); ?>

        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo $info['fullname'] ?>">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username"
                        value="<?php  echo $info['username'] ?>" placeholder="admin" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo  $info['email'] ?>">
                        <?php echo form_error('email'); ?>
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" name="phone_number" id="phone_number" value="<?php echo  $info['phone_number'] ?>">
                        <?php echo form_error('phone_number'); ?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo  $info['address'] ?></textarea>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();
?>