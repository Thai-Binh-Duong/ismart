<?php get_header(); ?>

    <!-- <?php show_array($item); ?> -->

    <!-- <?php show_array($_SESSION['cart']['buy']); ?> -->
    <?php if( isset( $_SESSION['cart']['buy'] ) ) {
        $data = $_SESSION['cart']['buy'] ;
    } 
    ?>
    
    <!-- <?php show_array($_SESSION['cart']['info']); ?> -->

<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php if( !empty( $_SESSION['cart'] ) ) { ?>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if( isset($data) ) {
                        foreach( $data as $product ) { ?>
                        <tr>
                            <td><?php echo $product['product_code']; ?></td>
                            <td>
                                <a href="?mod=home&action=detailProduct&id=<?php echo $product['id']; ?>" title="" class="thumb">
                                    <img src="admin/<?php echo $product['product_main_image_url']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="?mod=home&action=detailProduct&id=<?php echo $product['id']; ?>" title="" class="name-product"><?php echo $product['product_name']; ?></a>
                            </td>
                            <td> 
                                <span id="product_price">
                                    <?php echo currency_format($product['product_price']); ?>
                                </span> 
                            </td>
                            <td>
                                <input type="number" name="num-order" data-id="<?php echo $product['id']; ?>"
                                data-product-price="<?php echo $product['product_price']; ?>" min="1" value="<?php echo $product['qty']; ?>" class="num-order">
                            </td>
                            <td>
                                <span class="sub_total_price_<?php echo $product['id']; ?>">
                                    <?php echo currency_format($product['sub_total']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="?mod=cart&action=delete_cart&id=<?php echo $product['id']; ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php }} ?>
                        <!-- <tr>
                            <td>HCA00032</td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-23.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product">Laptop Probook HP 4430s</a>
                            </td>
                            <td>350.000đ</td>
                            <td>
                                <input type="text" name="num-order" value="1" class="num-order">
                            </td>
                            <td>350.000đ</td>
                            <td>
                                <a href="" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr> -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span class=" total-price-order"><?php if(isset($_SESSION['cart'])) echo currency_format( $_SESSION['cart']['info']['total'] ); ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="?" title="" id="update-cart">Mua Tiếp</a>
                                        <a href="?mod=checkout&action=index" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <!-- <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p> -->
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <p class="empty-cart"> <?php echo "EMPTY CART!!"; ?></p>
        <a class="d-block text-center" href="?">RETURN HOME PAGE</a>
    <?php } ?>
</div>

<?php get_footer(); ?>