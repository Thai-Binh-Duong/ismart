<?php get_header(); ?>

<div id="main-content-wp" class="list-post-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left  margin-0-20">NHÓM QUẢN TRỊ</h3>
        </div>
    </div>
    <div class="wrap clearfix  border-top-1px-solid-ddd">

        <?php 
            get_sidebar('user');
        ?>

        <div id="content" class="fl-right">
            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table list-table-wp list-user">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên</span></td>
                                    <td><span class="thead-text">Chức Vụ</span></td>
                                    <td><span class="thead-text">Mô Tả</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 0;
                                foreach($list_user as $items) : 
                                $stt+=1;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $stt; ?></span>
                                    <td><span class="tbody-text"><?php echo $items['fullname']; ?></span></td>
                                    <td><span class="tbody-text">Admin</span></td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">Bacon ipsum dolor amet hamburger frankfurter cow biltong pork loin capicola </a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Tên</span></td>
                                    <td><span class="tfoot-text">Chức Vụ</span></td>
                                    <td><span class="tfoot-text">Mô tả</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>