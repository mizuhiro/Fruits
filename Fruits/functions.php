<?php

//カスタムヘッダー
$custom_header = array(
 'random-default' => false,
 'width' => 250,
 'height' => 77,
 'flex-height' => true,
 'flex-width' => true,
 'default-text-color' => '',
 'header-text' => false,
 'uploads' => true,
);
add_theme_support('custom-header', $custom_header);

//ウィジェットの追加
register_sidebar(array(
'name' => 'サイドバーウィジット',
'id' => 'sidebar',
'description' => 'サイドバーのウィジットエリアです。',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<p class="widgettitle">',
'after_title' => '</p>',
));

//ウィジェットの追加
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

// ソーシャルボタン(Vertical)
function SocialButtonVertical()
{
    ?>
<ul>
    <li>
        <div class="fb-like" data-href="<?php the_permalink();
    ?>" data-width="100" data-layout="button" data-action="like" data-show-faces="false" data-share="false">&nbsp;
        </div>
    </li>
    <li>
        <a href="https://twitter.com/share" data-count="horizontal" class="twitter-share-button" data-url="http://example.com<?php the_permalink();
    ?>" data-text="<?php the_title();
    ?>" data-lang="ja">&nbsp;</a>
    </li>
    <li>
        <div class="g-plusone" data-annotation="none" data-size="medium" data-href="<?php the_permalink();
    ?>">&nbsp;
        </div>
    </li>
    <li>
        <div class="wsbl_hatena_button"><a href="http://b.hatena.ne.jp/entry/<?php the_permalink();
    ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title();
    ?>" data-hatena-bookmark-layout="standard" title="はてなブックマークに追加"> <img src="//b.hatena.ne.jp/images/entry-button/button-only@2x.png" alt="はてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
        </div>
    </li>
    <li>
      <a data-pocket-label="pocket" data-pocket-count="none" class="pocket-btn" data-lang="en"></a>
    </li>
</ul>
<?php

}

///////////////////////////////////////
//H2見出しを判別する正規表現を定数にする
///////////////////////////////////////
define('H2_REG', '/<h2.*?>/i');//H2見出しのパターン

///////////////////////////////////////
//本文中にH2見出しが最初に含まれている箇所を返す（含まれない場合はnullを返す）
//H3-H6しか使っていない場合は、h2部分を変更してください
///////////////////////////////////////
function get_h2_included_in_body($the_content)
{
    if (preg_match(H2_REG, $the_content, $h2results)) {
        //H2見出しが本文中にあるかどうか
    return $h2results[0];
    }
}

///////////////////////////////////////
// 投稿本文中の最初のH2見出し手前にウィジェットを追加する処理
///////////////////////////////////////
function add_widget_before_1st_h2($the_content)
{
    if (is_single() && //投稿ページのとき、固定ページも表示する場合はis_singular()にする
       is_active_sidebar('widget-in-article') //ウィジェットが設定されているとき
  ) {
        //広告（AdSense）タグを記入
    ob_start();//バッファリング
    dynamic_sidebar('widget-in-article');//本文中ウィジェットの表示
    $ad_template = ob_get_clean();
        $h2result = get_h2_included_in_body($the_content);//本文にH2タグが含まれていれば取得
    if ($h2result) {
        //H2見出しが本文中にある場合のみ
      //最初のH2の手前に広告を挿入（最初のH2を置換）
      $count = 1;
        $the_content = preg_replace(H2_REG, $ad_template.$h2result, $the_content, 1);
    }
    }

    return $the_content;
}
add_filter('the_content', 'add_widget_before_1st_h2');

//アイキャッチの追加
add_theme_support(‘post - thumbnails’);
add_theme_support('post-thumbnails', array('post'));

//カテゴリーの制限
add_action('admin_print_footer_scripts', 'limit_category_select');
function limit_category_select()
{
    ?>
	<script type="text/javascript">
		jQuery(function($) {
			// 投稿画面のカテゴリー選択を制限
			var cat_checklist = $('.categorychecklist input[type=checkbox]');
			cat_checklist.click( function() {
				$(this).parents('.categorychecklist').find('input[type=checkbox]').attr('checked', false);
				$(this).attr('checked', true);
			});

			// クイック編集のカテゴリー選択を制限
			var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
			quickedit_cat_checklist.click( function() {
				$(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
				$(this).attr('checked', true);
			});

			$('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before('<p style="padding-top:5px;">カテゴリーは1つしか選択できません</p>');
		});
	</script>
	<?php

}

// パンくずリスト
function breadcrumb()
{
    global $post;
    $str = '';
    if (!is_home() && !is_admin()) { /* !is_admin は管理ページ以外という条件分岐 */
        $str .= '<div id="breadcrumb">';
        $str .= '<ul>';
        $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.home_url('/').'" class="home" itemprop="url" ><span itemprop="title"><i class="fa fa-home"></i>HOME</span></a>&gt;</li>';

        /* 投稿のページ */
        if (is_single()) {
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if ($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_category_link($ancestor).'"  itemprop="url" ><span itemprop="title">'.get_cat_name($ancestor).'</span></a></li>';
                }
            }
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_category_link($cat->term_id).'" itemprop="url" ><span itemprop="title"><i class="fa fa-folder-o"></i>'.$cat->cat_name.'</span></a>&gt;</li>';
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><i class="fa fa-file-o"></i>'.$post->post_title.'</span></li>';
        }

        /* 固定ページ */
        elseif (is_page()) {
            if ($post->post_parent != 0) {
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                foreach ($ancestors as $ancestor) {
                    $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_permalink($ancestor).'" itemprop="url" ><span itemprop="title">'.get_the_title($ancestor).'</span></a></li>';
                }
            }
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><i class="fa fa-file-o"></i>'.$post->post_title.'</span></li>';
        }

        /* カテゴリページ */
        elseif (is_category()) {
            $cat = get_queried_object();
            if ($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_category_link($ancestor).'" itemprop="url" ><span itemprop="title">'.get_cat_name($ancestor).'</span></a></li>';
                }
            }
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><i class="fa fa-folder-o"></i>'.$cat->name.'</span></li>';
        }

        /* タグページ */
        elseif (is_tag()) {
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><i class="fa fa-tag"></i>'.single_tag_title('', false).'</span></li>';
        }

        /* 時系列アーカイブページ */
        elseif (is_date()) {
            if (get_query_var('day') != 0) {
                $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_year_link(get_query_var('year')).'" itemprop="url" ><span itemprop="title">'.get_query_var('year').'年</span></a>&gt;</li>';
                $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_month_link(get_query_var('year'), get_query_var('monthnum')).'" itemprop="url" ><span itemprop="title">'.get_query_var('monthnum').'月</span></a>&gt;</li>';
                $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">'.get_query_var('day').'</span>日</li>';
            } elseif (get_query_var('monthnum') != 0) {
                $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_year_link(get_query_var('year')).'" itemprop="url" ><span itemprop="title">'.get_query_var('year').'年</span></a>&gt;</li>';
                $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">'.get_query_var('monthnum').'</span>月</li>';
            } else {
                $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">'.get_query_var('year').'年</span></li>';
            }
        }

        /* 投稿者ページ */
        elseif (is_author()) {
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">投稿者 : '.get_the_author_meta('display_name', get_query_var('author')).'</span></li>';
        }

        /* 添付ファイルページ */
        elseif (is_attachment()) {
            if ($post->post_parent != 0) {
                $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_permalink($post->post_parent).'" itemprop="url" ><span itemprop="title">'.get_the_title($post->post_parent).'</span></a></li>';
            }
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><i class="fa fa-file-o"></i>'.$post->post_title.'</span></li>';
        }

        /* 検索結果ページ */
        elseif (is_search()) {
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><i class="fa fa-search"></i>「'.get_search_query().'」で検索した結果</span></li>';
        }

        /* 404 Not Found ページ */
        elseif (is_404()) {
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">お探しの記事は見つかりませんでした。</span></li>';
        }

        /* その他のページ */
        else {
            $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">'.wp_title('', false).'</span></li>';
        }
        $str .= '</ul>';
        $str .= '</div>';
    }
    echo $str;
}

//テーマカラー追加
add_action('init', 'rainbow');

function rainbow()
{
    add_option('color'); // オプション追加
    add_action('admin_menu', 'option_menu_create'); // 管理メニュー追加
    function option_menu_create()
    {
        add_theme_page('テーマカラー', 'テーマカラー', 'edit_themes', basename(__FILE__), 'option_page_create'); // 概観メニューのサブメニューとして追加
    }
    function option_page_create()
    { // 設定ページ生成
        $saved = save_option();
        require TEMPLATEPATH.'/admin-option.php';
    }
}
function save_option()
{ // オプション保存
    if (empty($_REQUEST['color'])) {
        return;
    }
    $save = update_option('color', $_REQUEST['color']);

    return $save;
}

//投稿者のアバター表示
function show_avatar()
{
    global $user_id;
    $original_avatar = get_the_author_meta('original_avatar', $user_id);
    $avatar_image = '';

    if (isset($original_avatar) && $original_avatar !== '') {
        $avatar_image = '<img src="'.$original_avatar.'" alt="アバター">';
    } else {
        $avatar_image = '<img class="masman" src="'.get_template_directory_uri().'/images/masman.png" alt="masman" />';
    }

    $author_meta_name = get_the_author_meta('display_name');
    $googleplus = get_the_author_meta('googleplus');
    $disp_author_description = get_the_author_meta('description');

    $disp_avatar = <<<eof
      <div class="post-author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
        <div class="clearfix">
          <div class="post-author-img">
            <div class="inner">
            {$avatar_image}
            </div>
          </div>
          <div class="post-author-meta">
            <p itemprop="name" class="author vcard author">{$author_meta_name}</p>
            <p>{$disp_author_description}</p>
          </div>
        </div>
      </div>
eof;

    echo $disp_avatar;
}

//コメントフォームの順序逆
function wp34731_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;

    return $fields;
}
add_filter('comment_form_fields', 'wp34731_move_comment_field_to_bottom');
