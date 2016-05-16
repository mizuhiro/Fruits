<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="UTF-8">
    <title>
      <?php wp_title('|', true, 'right'); bloginfo('name'); ?>
    </title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php
     if (is_attachment()) {
         $robots = 'noindex,follow';
     } elseif (is_single()) {
         $robots = 'index,follow';
     } elseif (is_home()) {
         $robots = 'index,follow';
     } elseif (is_category()) {
         $robots = 'noindex,follow';
     } elseif (is_page()) {
         $robots = 'index,follow';
     } else {
         $robots = 'noindex,follow';
     }
    ?>
      <meta name="robots" content="<?php echo $robots; ?>" />
      <?php if (is_singular()) {
    wp_enqueue_script('comment-reply');
} ?>
      <?php wp_enqueue_script('jquery'); ?>
      <?php wp_head(); ?>
      <script src="<?php echo get_template_directory_uri(); ?>/js/menubtn.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/top-pagebtn.js"></script>
  </head>

  <body>
    <div class="<?php echo get_option('color'); ?>">
      <header>
        <div class="header-wraper">
          <div class="colorbar"></div>
          <button type="button" id="searchbtn">
            <i class="fa fa-search"></i>
          </button>
          <button type="button" id="menubtn">
            <i class="fa fa-bars"></i>
          </button>
          <div class="blogname">
           <?php if (get_header_image()): ?>
           <a href="<?php echo home_url('/'); ?>">
             <img class="img" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
           </a>
           <?php else: ?>
             <h1 class="text">
               <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
             </h1>
           <?php endif; ?>
          </div>
        </div>
        <div class="category-inner">
          <nav class="category" id="category">
            <?php wp_nav_menu(); ?>
          </nav>
        </div>
        <div id="searchbox-hide">
          <?php get_search_form(); ?>
        </div>
        <div class="pankuzu">
          <?php breadcrumb(); ?>
        </div>
      </header>
      <div id="page-top" class="page-top">
        <p><a id="move-page-top" class="move-page-top"><i class="fa fa-chevron-up"></i></a></p>
      </div>
