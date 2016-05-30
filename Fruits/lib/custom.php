<?php
//テーマカラー追加
add_action('init', 'rainbow');

function rainbow()
{
    add_option('color');
    add_action('admin_menu', 'option_menu_create');
    function option_menu_create()
    {
        add_theme_page('テーマカラー', 'テーマカラー', 'edit_themes', basename(__FILE__), 'option_page_create'); // 概観メニューのサブメニューとして追加
    }
    function option_page_create()
    {
        $saved = save_option();
        require TEMPLATEPATH.'/admin-option.php';
    }
}
function save_option()
{
    if (empty($_REQUEST['color'])) {
        return;
    }
    $save = update_option('color', $_REQUEST['color']);

    return $save;
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
