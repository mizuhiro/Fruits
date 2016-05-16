<?php get_header(); ?>
<div class="ContentsandSide">
  <div class="contents" id="main">
    <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="contents-outer">
        <div class="single-padding">
          <div class="contents-inner">
            <article>
              <h1 class="single-title page-title"><?php the_title(); ?></a></h1>
              <div class="main-text">
                <p class="top-text">
                  <?php the_content(); ?>
                </p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
    <?php
        endwhile;
        else : ?>
      <div class="post no">
        <h2>記事はありません</h2>
        <p>お探しの記事は見つかりませんでした。</p>
      </div>
      <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
</html>
