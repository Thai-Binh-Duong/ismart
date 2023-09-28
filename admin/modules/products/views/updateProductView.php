<?php get_header(); ?>

<?php 
    // show_array($file);
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data" action="">

                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" 
                        value="<?php echo $product['product_name']; ?>" >
                        <?php echo form_error('product_name'); ?>
                        <label>Danh mục sản phẩm</label>
                        <select name="productCat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach( $list_cate as $cat ) { ?>
                            <option value="<?php echo $cat['catName']; ?>" 
                            <?php if(check_selected_catName( $product['product_cat'] , $cat['catName'] )) echo 'selected="selected"'; ?> ><?php echo $cat['catName']; ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('productCat'); ?>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code"
                        value="<?php echo $product['product_code']; ?>">
                        <?php echo form_error('product_code'); ?>
                        <label for="product_price">Giá sản phẩm</label>
                        <input type="text" name="product_price" id="product_price"
                        value="<?php echo $product['product_price']; ?>">
                        <?php echo form_error('product_price'); ?>
                        <label for="product_short_desc">Mô tả ngắn</label>
                        <textarea name="product_short_desc" id="product_short_desc"><?php echo $product['short_description']; ?></textarea>
                        <?php echo form_error('product_short_desc'); ?>
                        <label for="product_desc">Chi tiết</label>
                        <textarea name="product_desc" id="product_desc" class="ckeditor" ><?php echo $product['detail_description']; ?></textarea>
                        <?php echo form_error('product_desc'); ?>
                        <label>Hình ảnh</label>

                        <div id="uploadFile">

                            <!-- <form enctype="multipart/form-data" action="" method="POST"> -->
                                <input type="file" name="file" id="upload-thumb" 
                                value="<?php if( !empty($product['product_main_image_url']) ) echo $product['product_main_image_url'] ?>"
                                >
                                <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->

                            <?php if( empty( $product['product_main_image_url'] ) ) { ?>
                                <img src="public/images/img-thumb.png">
                            <?php }else{ ?>
                                <img src="<?php echo $product['product_main_image_url']; ?>" alt="<?php echo $product['product_main_image_url']; ?>">
                            <?php } ?>

                        </div>
                        
                        <?php echo form_error('type'); ?>
                        <?php echo form_error('file_size'); ?>
                        <?php echo form_error('file'); ?>
                        <?php echo form_error('upload_file'); ?>
                        
                        
                        <button type="submit" name="btn-update" id="btn-update">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>