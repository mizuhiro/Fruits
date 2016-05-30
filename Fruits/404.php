<?php get_header(); ?>
<div class="ContentsandSide">
  <div class="contents" id="main">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="contents-outer">
        <div class="single-padding">
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
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
</html>
