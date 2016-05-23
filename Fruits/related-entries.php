<?php
//カテゴリ情報から関連記事を5個ランダムに呼び出す
$categories = get_the_category($post->ID);
$category_ID = array();
foreach ($categories as $category):
  array_push($category_ID, $category->cat_ID);
endforeach;
$args = array(
  'post__not_in' => array($post->ID),
  'posts_per_page' => 4,
  'category__in' => $category_ID,
  'orderby' => 'rand',
);
$query = new WP_Query($args); ?>
  <?php if ($query->have_posts()): ?>
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="related-entry">
      <div class="related-entry-thumb">
  <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php if (has_post_thumbnail()): // サムネイルを持っているとき ?>
        <?php echo get_the_post_thumbnail($post->ID, 'thumb100'); //サムネイルを呼び出す?>
        <?php else: // サムネイルを持っていないとき ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="100px" />
        <?php endif; ?>
        </a>
      </div><!-- /.related-entry-thumb -->

      <div class="related-entry-content">
        <p class="related-entry-title"> <a href="<?php the_permalink(); ?>">
          <?php the_title(); //記事のタイトル?>
        </a></p>
      </div><!-- /.related-entry-content -->
    </div><!-- /.new-entry -->

  <?php endwhile;?>

  <?php else:?>
  <p>関連する記事はありません</p>
  <?php
endif;
wp_reset_postdata();
?>
<br style="clear:both;">
