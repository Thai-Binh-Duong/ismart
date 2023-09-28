<?php get_header(); ?>

    <!-- <?php show_array($product); ?> -->
    <?php foreach($product as $key => $value) {
        foreach($value as $item){
            $result[] = $item;
        }
    }
    // show_array($result);
    ?>

<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach($result as $product) { ?>
                        <li>
                            <a href="?mod=home&controller=index&action=detailProduct&id=<?php echo $product['id']; ?>" title="" class="thumb">
                                <img src="admin/<?php echo $product['product_main_image_url']; ?>">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name"><?php echo $product['product_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($product['product_price']); ?></span>
                                <!-- <span class="old">8.990.000đđ</span> -->
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                        <!-- <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-pro-10.png">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">Bphone 2017</a>
                            <div class="price">
                                <span class="new">9.790.000đ</span>
                                <span class="old">10.790.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>

        </div>

        <?php get_sidebar(); ?>

    </div>
</div>
<?php get_footer(); ?>