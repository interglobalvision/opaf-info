<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
get_template_part('partials/globie');
get_template_part('partials/seo');
?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">

<?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php } ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<section id="main-container">

  <header id="header" class="margin-bottom-mid">
    <h1 class="u-visuallyhidden"><?php bloginfo('name'); ?></h1>
  <?php
    $options = get_site_option('_igv_site_options');

    if (!empty($options['opaf_logo'])) {
  ?>
    <div id="logo-holder">
      <?php echo wp_get_attachment_image($options['opaf_logo_id'], 'full'); ?>
    </div>
  <?php
    }
  ?>
    <nav class="grid-row font-lucida justify-around padding-bottom-micro padding-top-micro">
      <div class="grid-item">
        <a href="#about" data-nav="about">About</a>
      </div>
      <div class="grid-item">
        <a href="#location" data-nav="location">Location</a>
      </div>
      <div class="grid-item">
        <a href="#participants" data-nav="participants">Participants</a>
      </div>
      <div class="grid-item">
        <a href="#press" data-nav="press">Press</a>
      </div>
    </nav/>
  </header>
