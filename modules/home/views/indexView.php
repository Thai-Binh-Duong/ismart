<?php get_header(); ?>

<!-- <?php show_array($list_product); ?> -->
<!-- <?php show_array($list_category); ?> -->
<!-- <?php show_array($dien_thoai); ?> -->

<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider-01.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach( $list_product as $product ) { ?> 
                        <li>
                            <a href="?mod=home&action=detailProduct&id=<?php echo $product['id']; ?>" title="" class="thumb">
                                <img src="admin/<?php echo $product['product_main_image_url'] ?>">
                            </a>
                            <a href="?mod=home&action=detailProduct&id=<?php echo $product['id']; ?>" title="" class="product-name"><?php echo $product['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($product['product_price']); ?></span>
                                <!-- <span class="old">6.190.000đ</span> -->
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=addCart&id=<?php echo $product['id'] ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=buyNow&id=<?php echo $product['id'] ?>" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                        <!-- <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-pro-09.png">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">IPhone 7 128GB</a>
                            <div class="price">
                                <span class="new">18.990.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>  -->
                    </ul>
                </div>
            </div>

            <?php foreach($dien_thoai as $key => $value) {
                    foreach($value as $item){
                        $result_dien_thoai[] = $item;
                    }
                }
            ?>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach( $result_dien_thoai as $dienthoai ) { ?>
                        <li>
                            <a href="?mod=home&action=detailProduct&id=<?php echo $dienthoai['id']; ?>" title="" class="thumb">
                                <img src="admin/<?php echo $dienthoai['product_main_image_url'] ?>">
                            </a>
                            <a href="?mod=home&action=detailProduct&id=<?php echo $dienthoai['id']; ?>" title="" class="product-name"><?php echo $dienthoai['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($dienthoai['product_price']); ?></span>
                                <!-- <span class="old">8.990.000đđ</span> -->
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=addCart&id=<?php echo $dienthoai['id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=buyNow&id=<?php echo $dienthoai['id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
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
                        </li>  -->
                    </ul>
                </div>
            </div>
            <!-- <?php show_array($laptop); ?> -->
            <?php foreach($laptop as $key_l => $value_l) {
                    foreach($value_l as $item_laptop){
                        $result_laptop[] = $item_laptop;
                    }
                }
            ?>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach( $result_laptop as $laptop ) { ?> 
                        <li>
                            <a href="?mod=home&action=detailProduct&id=<?php echo $laptop['id']; ?>" title="" class="thumb">
                                <img src="admin/<?php echo $laptop['product_main_image_url'] ?>">
                            </a>
                            <a href="?mod=home&action=detailProduct&id=<?php echo $laptop['id']; ?>" title="" class="product-name"><?php echo $laptop['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($laptop['product_price']); ?></span>
                                <!-- <span class="old">8.690.000đ</span> -->
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=addCart&id=<?php echo $laptop['id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=buyNow&id=<?php echo $laptop['id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                        <!-- <li>
                            <a href="" title="" class="thumb">
                                <img src="public/images/img-pro-23.png">
                            </a>
                            <a href="" title="" class="product-name">Laptop Asus A540UP I5</a>
                            <div class="price">
                                <span class="new">14.490.000đ</span>
                                <span class="old">16.490.000đ</span>
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