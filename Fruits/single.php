<?php get_header(); ?>
<div class="ContentsandSide">
  <div class="contents" id="main">
    <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="contents-outer">
        <div class="single-padding">
          <div class="contents-inner">
            <div class="posttime">
              <i class="fa fa-calendar-o"></i>
              <time>
                <?php echo get_the_date(); ?>
              </time>
            </div>
            <div class="category-inside">
              <?php the_category('') ?>
            </div>
            <article>
              <h1 class="single-title"><?php the_title(); ?></a></h1>
              <div class="scl_btn">
                <?php SocialButtonVertical(); ?>
              </div>
              <div class="main-text">
                <p class="top-text">
                  <?php the_content(); ?>
                </p>
              </div>
            </article>
            <?php if (is_active_sidebar('widget-under-article')) :
             dynamic_sidebar('widget-under-article');
            endif; ?>
            <div class="tag single-tag">
              <?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
            </div>
            <div class="scl_btn">
              <?php SocialButtonVertical(); ?>
            </div>
            <div class="author">
              <p class="label">この記事の著者</p>
              <?php show_avatar();?>
            </div>
          </div>
        </div>
        <div id="related-entries">
          <p class="related-entries">関連記事</p>
          <?php include TEMPLATEPATH.'/related-entries.php'; ?>
        </div>
        <!-- #related-entries -->
        <div class="border"></div>
        <?php comments_template(); ?>
      </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

</html>
