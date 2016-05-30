<?php get_header(); ?>
<div class="ContentsandSide">
  <div class="contents" id="main">
    <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="contents-outer">
        <div class="contents-inner">
          <div class="thumbnail">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
          </div>
          <div class="text-wrapper">
            <div class="posttime">
              <i class="fa fa-calendar-o"></i>
              <time>
                <?php echo get_the_date(); ?>
              </time>
            </div>
            <div class="category-inside">
              <?php the_category('') ?>
            </div>
            <h2 class="top-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="tag">
              <?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pagenation">
      <?php global $wp_rewrite; $paginate_base = get_pagenum_link(1); if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
     $paginate_format = '';
     $paginate_base = add_query_arg('paged', '%#%');
 } else {
     $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/').
        user_trailingslashit('page/%#%/', 'paged');
     $paginate_base .= '%_%';
 }
    echo paginate_links(array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5,
        'current' => ($paged ? $paged : 1),
        'prev_text' => '«',
        'next_text' => '»',
    )); ?>
    </div>
    <?php
        endwhile;
        else : ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="contents-outer">
            <div class="single-padding">
              <div class="contents-inner">
                <div class="contents-inner">
                  <article>
                    <div class="main-text">
                      <p class="top-text">
                        <?php get_template_part('content', 'none'); ?>
                      </p>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php endif; ?>
  </div>
   <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
</html>
