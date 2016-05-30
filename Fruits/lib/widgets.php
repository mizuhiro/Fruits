<?php

//サイドバーウィジェットの追加
register_sidebar(array(
'name' => 'サイドバーウィジット',
'id' => 'sidebar',
'description' => 'サイドバーのウィジットエリアです。',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<p class="widgettitle">',
'after_title' => '</p>',
));

//記事下広告ウィジェットの追加
register_sidebar(array(
'name' => '記事下広告エリア',
'id' => 'widget-under-article',
'description' => '記事下に表示される広告のウィジェットエリアです。「テキスト」をドロップして内容にコードを入力してください。タイトルはラベルとして表示されます。',
'before_widget' => '<div id="%1$s" class="widget-under-article %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="widget-under-article-title">',
'after_title' => '</div>',
));

// 記事内広告ウィジェットの追加
register_sidebars(1,
  array(
  'name' => '記事内広告エリア',
  'id' => 'widget-in-article',
  'description' => '記事内の最初のh2タグ(見出し)前に表示される広告のウィジェットエリアです。「テキスト」をドロップして内容にコードを入力してください。タイトルはラベルとして表示されます。',
  'before_widget' => '<div id="%1$s" class="widget-in-article %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<div class="widget-in-article-title">',
  'after_title' => '</div>',
));
