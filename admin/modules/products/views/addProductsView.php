<?php get_header(); ?>

<?php ?>
<!-- <?php print_r($url_thumb); ?> -->

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data" action="">

                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" 
                        value="<?php if(!empty($product_name)) echo $product_name; ?>" >
                        <?php echo form_error('product_name'); ?>
                        <label>Danh mục sản phẩm</label>
                        <select name="productCat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach( $categoryName as $cat ) { ?>
                            <option value="<?php echo $cat['catName']; ?>" ><?php echo $cat['catName']; ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('productCat'); ?>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code"
                        value="<?php if(!empty($product_code)) echo $product_code; ?>">
                        <?php echo form_error('product_code'); ?>
                        <label for="product_price">Giá sản phẩm</label>
                        <input type="text" name="product_price" id="product_price"
                        value="<?php if(!empty($product_price)) echo $product_price; ?>">
                        <?php echo form_error('product_price'); ?>
                        <label for="product_short_desc">Mô tả ngắn</label>
                        <textarea name="product_short_desc" id="product_short_desc"><?php if(!empty($product_short_desc)) echo $product_short_desc; ?></textarea>
                        <?php echo form_error('product_short_desc'); ?>
                        <label for="product_desc">Chi tiết</label>
                        <textarea name="product_desc" id="product_desc" class="ckeditor" ><?php if( !empty($desc) ) echo $desc; ?></textarea>
                        <?php echo form_error('product_desc'); ?>
                        <label>Hình ảnh</label>

                        <div id="uploadFile">

                            <!-- <form enctype="multipart/form-data" action="" method="POST"> -->
                                <input type="file" name="file" id="upload-thumb"  multiple >
                                <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->

                            <?php if( empty( $url_thumb ) ) { ?>
                                <img src="public/images/img-thumb.png">
                            <?php }else{ ?>
                                <img src="<?php echo $url_thumb; ?>" alt="<?php echo $url_thumb; ?>">
                            <?php } ?>

                        </div>
                        
                        <?php echo form_error('file'); ?>
                        
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>