<?php //コメント数の多い順番 ?>
<?php query_posts('&posts_per_page=5&orderby=comment_count&order=DESC&ignore_sticky_posts=1'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="popular-entry">

  <div class="popular-entry-thumb">
  <?php if (has_post_thumbnail()): // サムネイルを持っているときの処理 ?>
    <a href="<?php the_permalink(); ?>" class="popular-entry-title"><?php the_post_thumbnail('thumb75'); ?></a>
  <?php else: // サムネイルを持っていないときの処理 ?>
    <a href="<?php the_permalink(); ?>" class="popular-entry-title"><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="75" height="75" /></a>
  <?php endif; ?>
  </div><!-- /.popular-entry-thumb -->

  <div class="popular-entry-content">
    <a href="<?php the_permalink(); ?>" class="popular-entry-title"><?php the_title();?></a>
  </div><!-- /.popular-entry-content -->

</div><!-- /.popular-entry -->
<?php endwhile;
else :
  echo '<p>人気記事はありません。</p>';
endif; ?>

<?php wp_reset_query(); ?>
<br style="clear:both;">
