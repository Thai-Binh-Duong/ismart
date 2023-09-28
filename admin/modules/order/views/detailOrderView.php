<?php get_header(); ?>

<!-- <?php show_array($order); ?> -->


<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?php echo $order['id']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $order['address']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail">
                            <?php if( $order['payment'] == 'direct-payment' ){
                                echo "Thanh toán tại cửa hàng";
                            }else{
                                echo "Thanh toán tại nhà";
                            } ?></span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="status">
                                <option  value='0'>Chờ duyệt</option><option selected='selected' value='1'>Đang vận chuyển</option><option  value='2'>Thành công</option>                            </select>
                            <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $product = json_decode($order['customer_order'],true)['buy'];
                            $stt = 0;
                            foreach( $product as $item ){
                                $stt++;
                            ?>
                            <tr>
                                <td class="thead-text"><?php echo $stt; ?></td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="<?php echo $item['product_main_image_url']; ?>" alt="">
                                    </div>
                                </td>
                                <td class="thead-text"><?php echo $item['product_name']; ?></td>
                                <td class="thead-text"><?php echo currency_format($item['product_price']); ?></td>
                                <td class="thead-text"><?php echo $item['qty']; ?></td>
                                <td class="thead-text"><?php echo currency_format($item['sub_total']); ?></td>
                            </tr>
                            <?php } ?>
                            <!-- <tr>
                                <td class="thead-text">1</td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="public/images/img-product.png" alt="">
                                    </div>
                                </td>
                                <td class="thead-text">Chân váy nữ</td>
                                <td class="thead-text">145,000 VNĐ</td>
                                <td class="thead-text">5</td>
                                <td class="thead-text">725,000 VNĐ</td>
                            </tr>
                            <tr>
                                <td class="thead-text">1</td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="public/images/img-product.png" alt="">
                                    </div>
                                </td>
                                <td class="thead-text">Chân váy nữ</td>
                                <td class="thead-text">145,000 VNĐ</td>
                                <td class="thead-text">5</td>
                                <td class="thead-text">725,000 VNĐ</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <?php $order_info = json_decode($order['customer_order'],true)['info']; ?>
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $order_info['num_order']; ?> sản phẩm</span>
                            <span class="total"><?php echo currency_format($order_info['total']); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php get_footer(); ?>