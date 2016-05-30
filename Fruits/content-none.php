<div class="content-none">
  <?php if (is_404()) {
    echo 'あなたがアクセスしようとしたページは削除されたかURLが変更されています。以下の方法からもう一度目的のページをお探し下さい。';
} elseif (is_search()) {
    echo '「'.get_search_query().'」で検索しましたがページが見つかりませんでした。以下の方法からもう一度目的のページをお探し下さい。';
} ?>
  <h2>検索して探す</h2>
  <?php get_search_form(); ?>
  <h2>カテゴリーから探す</h2>
  <div class="category-inside">
    <?php
      wp_list_categories(
        array(
          'title_li' => '',
          'depth' => 1,
        )
      );
    ?>
  </div>
  <div></div>
</div>
