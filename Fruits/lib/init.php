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

//アイキャッチの追加
add_theme_support(‘post - thumbnails’);
add_theme_support('post-thumbnails', array('post'));

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
    <li class="hatena-btn">
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
