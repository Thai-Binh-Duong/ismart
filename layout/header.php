<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/custom.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/ajax.js"></script>

    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?page=home" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="?page=blog" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?page=home" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php if( !empty( $_SESSION['cart']['info']) ) echo $_SESSION['cart']['info']['num_order']; ?></span>
                                    </div>
                                    <div id="dropdown">
                                    <?php if( !empty( $_SESSION['cart']['buy']) ) { ?>
                                        <?php if( isset( $_SESSION['cart']['buy'] ) ) { ?>
                                        <p class="desc">Có <span><?php if( $_SESSION['cart']['buy'] != '') echo count($_SESSION['cart']['buy']); ?> sản phẩm</span> trong giỏ hàng</p>
                                        <?php } ?>
                                        <ul class="list-cart">
                                            <?php
                                            if( !empty( $_SESSION['cart']['buy']) ) {
                                                foreach( $_SESSION['cart']['buy'] as $product) { ?>
                                                <li class="clearfix">
                                                    <a href="?mod=home&action=detailProduct&id=<?php echo $product['id']; ?>" title="" class="thumb fl-left">
                                                        <img src="admin/<?php echo $product['product_main_image_url'] ?>" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?mod=home&action=detailProduct&id=<?php echo $product['id']; ?>" title="" class="product-name"><?php echo $product['product_name'] ?></a>
                                                        <p class="price"><?php echo currency_format($product['product_price']); ?></p>
                                                        <p class="qty">Số lượng: <span class="quantity<?php echo $product['id']; ?>"><?php echo $product['qty']; ?></span></p>
                                                    </div>
                                                </li>
                                            <?php }}  ?>
                                            <!-- <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="public/images/img-pro-23.png" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name">Laptop Lenovo 10</a>
                                                    <p class="price">16.250.000đ</p>
                                                    <p class="qty">Số lượng: <span>1</span></p>
                                                </div>
                                            </li> -->
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right total-price-order"><?php if(isset($_SESSION['cart']['info'])) echo currency_format( $_SESSION['cart']['info']['total'] ); ?></p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="?mod=cart&action=addCart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="?mod=checkout&action=index" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    <?php }else{ ?>

                                    <p class="empty-cart"> <?php echo "Gio hang trong!";?></p>

                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>