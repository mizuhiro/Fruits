<div id="comment-area">
  <?php if (have_comments()): // コメントがあったら ?>
  <p id="comments">コメント一覧</p>
  <ul class="commets-list">
    <?php wp_list_comments('avatar_size=40'); ?>
  </ul>
  <?php endif; ?>
</div>


<?php
// デフォルト値取得
$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = ($req ? " aria-required='true'" : '');

// $fields設定
$fields = array(
    'author' => '<p id="inputtext">'.'<label for="author">'.__('Name')
                .($req ? '（必須）' : '').'</label> '.
                '<br /><input id="author" name="author" type="text" value="'
                .esc_attr($commenter['comment_author']).'" size="30"'.$aria_req.' /></p>',

    'email' => '<p id="inputtext"><label for="email">'.__('Email')
                .($req ? '（必須/公開はされません）' : '').'</label> '.
                '<br /><input id="email" name="email" type="text" value="'
                .esc_attr($commenter['comment_author_email']).'" size="30"'.$aria_req.' /></p>',

    'url' => '',
    );

// $comment_field設定
$comment_field = '<p class="comment-form-comment"><label for="comment">'._x('Comment', 'noun').'（必須）</label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

// $comment_notes_before設定
$comment_notes_before = null;

// $args設定
$args = array(
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'comment_field' => $comment_field,
    'comment_notes_before' => $comment_notes_before,
);
?>

<?php comment_form($args); ?>
