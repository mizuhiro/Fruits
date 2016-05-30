<?php

//H2見出しを判別する
define('H2_REG', '/<h2.*?>/i');

function get_h2_included_in_body($the_content)
{
    if (preg_match(H2_REG, $the_content, $h2results)) {
    return $h2results[0];
    }
}

function add_widget_before_1st_h2($the_content)
{
    if (is_single() &&
       is_active_sidebar('widget-in-article')
  ) {
    ob_start();
    dynamic_sidebar('widget-in-article');
    $ad_template = ob_get_clean();
        $h2result = get_h2_included_in_body($the_content);
    if ($h2result) {
      $count = 1;
        $the_content = preg_replace(H2_REG, $ad_template.$h2result, $the_content, 1);
    }
    }

    return $the_content;
}
add_filter('the_content', 'add_widget_before_1st_h2');
