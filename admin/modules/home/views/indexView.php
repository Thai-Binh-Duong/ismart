<?php

get_header();

?>
<div id="content">
<h1>Trang chu</h1>
        <?php echo time()."<br>"; 
        $time = time();
        ?>
        
        <?php echo get_dateTime( $time); ?>

        <?php echo $_SESSION['user_login']; ?>
</div>

<?php
get_footer();
?>