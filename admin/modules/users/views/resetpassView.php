<?php get_header(); ?>

<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left margin-0-20">Đổi Mật Khẩu</h3>
        </div>
    </div>
    <div class="wrap clearfix border-top-1px-solid-ddd">

        <?php get_sidebar('user'); ?>

        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass_old" id="pass-old">
                        <?php echo form_error('pass_old'); ?>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass_new" id="pass-new">
                        <?php echo form_error('pass_new'); ?>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_pass" id="confirm-pass">
                        <?php echo form_error('confirm_pass'); ?>
                        <button type="submit" name="btn-update-password" id="btn-update-password">Cập nhật</button>
                        <?php echo form_error('new_password'); ?>
                        <?php echo form_error('old_password'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>