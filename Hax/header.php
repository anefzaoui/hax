<?php if (( is_single() || is_page() ) && (!is_front_page()) ) : $pageClass = 'home'; ?>

<?php endif ?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//fonts.googleapis.com/css?family=Fira+Sans:400,500" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" media="all" href="https://www.mozilla.org/tabzilla/media/css/tabzilla.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/highlight.js/8.6.0/styles/solarized_light.min.css">
  <title><?php if (( is_single() || is_page() ) && (!is_front_page()) ) : ?><?php wp_title($sep = ''); ?> &#x2605;
    <?php elseif ( is_search() ) : ?>Search results for &#8220;<?php the_search_query(); ?>&#8221; &#x2605;
    <?php elseif ( is_category('Demo') ) : ?>Demos &#x2605;
    <?php elseif ( is_category('Featured Demo') ) : ?>Featured Demos &#x2605;
    <?php elseif ( is_category('Featured Article') ) : ?>Featured Articles &#x2605;
    <?php elseif ( is_category() ) : ?><?php single_cat_title(); ?> Articles &#x2605;
    <?php elseif ( is_author() ) : ?>Articles by <?php echo get_userdata(intval($author))->display_name; ?> &#x2605;
    <?php elseif ( is_tag() ) : ?>Articles tagged &#8220;<?php single_tag_title(); ?>&#8221; &#x2605;
    <?php elseif ( is_day() ) : ?>Articles for <?php the_time('F jS, Y'); ?> &#x2605;
    <?php elseif ( is_month() ) : ?>Articles for <?php the_time('F Y'); ?> &#x2605;
    <?php elseif ( is_year() ) : ?>Articles for <?php the_time('Y'); ?> &#x2605;
    <?php elseif ( is_404() ) : ?>Not Found &#x2605;
    <?php elseif ( is_home() ) : ?>Articles &#x2605;
    <?php endif; ?>
    <?php bloginfo('name'); ?>
  </title>

  <?php wp_head(); ?>
</head>
<body class="home">
  <div class="outer-wrapper">
    <header class="masthead section row">
      <a aria-label="Mozilla links" href="#" id="tabzilla">Mozilla</a>
      <div class="branding block block--3">
        <h1><a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/mdn-logo.svg" alt="Mozilla"><span>Hacks</span></a></h1>
      </div>
      <div class="search block block--2">
        <form class="search__form" method="get" action="<?php bloginfo('url'); ?>/">
          <input type="search" name="s" class="search__input" placeholder="Search Mozilla Hacks" value="<?php the_search_query(); ?>">
          <i class="fa fa-search search__badge"></i>
        </form>
      </div>
      <nav class="social">
        <a class="social__link youtube" href="http://www.youtube.com/user/mozhacks" title="YouTube"><i class="fa fa-youtube"></i></a>
        <a class="social__link twitter" href="https://twitter.com/mozhacks" title="Twitter"><i class="fa fa-twitter"></i></a>
        <a class="social__link rss" href="" title="Hacks"><i class="fa fa-rss"></i></a>
      </nav>
    </header>
