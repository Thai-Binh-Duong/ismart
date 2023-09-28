<?php get_header(); ?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <form method="POST" >
                        <label for="cateName">Tên danh mục</label>
                        <input type="text" name="cateName" id="cateName" value="<?php echo $cate['catName']; ?>">
                        <?php echo form_error('cateName'); ?>
                        <label>Danh mục cha</label>
                        <select name="parent_Cat">
                        <option value="">-- Chọn danh mục cha --</option>

                        <?php foreach( $list_cate_parent as $cat ) { ?>
                            <option value="<?php echo $cat['catName']; ?>"
                            <?php if(check_selected_catName( $cat['catID'] , $cate['parent_cat_id'] )) echo 'selected="selected"'; ?>
                            ><?php echo $cat['catName']; ?></option>
                        <?php } ?>
                        </select>
                        <button type="submit" name="btn-update" id="btn-update">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>