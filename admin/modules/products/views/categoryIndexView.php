<?php get_header(); ?>

<?php
    foreach( $list_category as &$cats ){
        $cats['url_update'] = "?mod=products&controller=category&action=update&id={$cats["catID"]}";
        $cats['url_delete'] = "?mod=products&controller=category&action=delete&id={$cats["catID"]}";
        // show_array($cats);
    }
    
?>

<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=products&controller=category&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Quyền</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = $start;
                                foreach( $list_category as $cat ) :
                                $stt++;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $stt; ?></h3></span>
                                    <td class="clearfix unset-border-bot-right-left">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo str_repeat('|--',$cat['level']).$cat['catName']; ?></a>
                                        </div> 
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $cat['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $cat['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $cat['level']; ?></span></td>
                                    <td><span class="tbody-text">Hoạt động</span></td>
                                    <td><span class="tbody-text"><?php echo $cat['admin']; ?></span></td>
                                    <td><span class="tbody-text"><?php echo get_dateTime($cat['create_time']) ; ?></span></td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text">Thứ tự</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>

                    <?php echo get_pagination( $num_page , $page , "?mod=products&controller=category&action=index" ); ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>