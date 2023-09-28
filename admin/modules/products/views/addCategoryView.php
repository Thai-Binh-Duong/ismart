<?php get_header(); ?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <form method="POST" >
                        <label for="cateName">Tên danh mục</label>
                        <input type="text" name="cateName" id="cateName">
                        <?php echo form_error('cateName'); ?>
                        <!-- <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug"> -->
                        <label>Danh mục cha</label>
                        <select name="parent_Cat">
                        <option value="">-- Chọn danh mục cha --</option>
                        <?php foreach( $list_category as $cat ) { ?>
                            <option value="<?php echo $cat['catName']; ?>"><?php echo $cat['catName']; ?></option>
                        <?php } ?>
                        </select>
                        <button type="submit" name="btn-add" id="btn-add">Thêm</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>