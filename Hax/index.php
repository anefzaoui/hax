<?php
// Don't allow direct access to the theme
if(!defined('DB_NAME')) {
  exit('Direct template access is not allowed');
}

get_header();

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');
?>

<header id="content-head">
  <ul class="nav-crumbs" role="navigation">
    <li><a href="<?php bloginfo('url'); ?>" title="Go to the home page">Home</a></li>
  </ul>

  <h1 class="page-title">Articles</h1>

  <div id="content-bar" class="options">
    <h3>Sort by:</h3>
    <ul class="opt-sort">
      <li<?php tmh_has_query_var('tmh_sort_by', 'date', ' class="selected"', TRUE) ?>><a class="sort-date" href="<?php echo tmh_by_as_url('date'); ?>" title="Sort articles by date, most recent first">Date</a><?php tmh_has_query_var('tmh_sort_by', 'date', ' <em>(this is the current option)</em>', TRUE) ?></li>
    <?php if (function_exists('tmh_page_hits_ok') AND tmh_page_hits_ok()) : ?>
      <li<?php tmh_has_query_var('tmh_sort_by', 'views', ' class="selected"') ?>><a class="sort-views" href="<?php echo tmh_by_as_url('views'); ?>" title="Sort articles by number of views, most popular first">Views</a><?php tmh_has_query_var('tmh_sort_by', 'views', ' <em>(this is the current option)</em>') ?></li>
    <?php endif; ?>
      <li<?php tmh_has_query_var('tmh_sort_by', 'comments', ' class="selected"') ?>><a class="sort-comments" href="<?php echo tmh_by_as_url('comments'); ?>" title="Sort articles by number of comments, most commented first">Comments</a><?php tmh_has_query_var('tmh_sort_by', 'comments', ' <em>(this is the current option)</em>') ?></li>
    </ul>
    <h3>View:</h3>
    <ul class="opt-view">
      <li<?php tmh_has_query_var('tmh_view_as', 'title', ' class="selected"') ?>><a class="view-title" href="<?php echo tmh_by_as_url(TRUE, 'title'); ?>" title="Show only article titles">Title</a><?php tmh_has_query_var('tmh_view_as', 'title', ' <em>(this is the current view)</em>') ?></li>
      <li<?php tmh_has_query_var('tmh_view_as', 'brief', ' class="selected"', TRUE) ?>><a class="view-brief" href="<?php echo tmh_by_as_url(TRUE, 'brief'); ?>" title="Show article excerpts">Brief</a><?php tmh_has_query_var('tmh_view_as', 'brief', ' <em>(this is the current view)</em>', TRUE) ?></li>
      <li<?php tmh_has_query_var('tmh_view_as', 'complete', ' class="selected"') ?>><a class="view-complete" href="<?php echo tmh_by_as_url(TRUE, 'complete'); ?>" title="Show full articles">Complete</a><?php tmh_has_query_var('tmh_view_as', 'complete', ' <em>(this is the current view)</em>') ?></li>
    </ul>

    <?php
      $numposts = wp_count_posts()->publish; // total posts
      $numfeatures = tmh_unique_posts_in_category($featured_id); // posts in Featured Article
      $numdemos = tmh_unique_posts_in_category($demo_id); // posts in Demo
      $numfeatdemos = tmh_unique_posts_in_category($featureddemo_id); // posts in Featured Demo
      $allarticles = $numposts - $numdemos; // articles = total posts minus demos
    ?>
    <ul class="opt-posts">
      <li><a href="<?php echo get_permalink(get_page_by_path('articles')->ID); ?>" title="See all articles">All Articles</a> (<?php if (is_front_page()) : echo $numposts; else : echo $allarticles; endif; ?>)</li>
      <?php if ($featured_id) : ?>
      <li><a href="<?php echo get_category_link($featured_id); ?>" title="See only Featured articles">Featured</a> (<?php echo $numfeatures; ?>)</li>
      <?php endif; ?>
    </ul>

  </div>
</header><!-- /#content-head -->

<main id="content-main" class="section">
<?php if (have_posts()) : ?>
  <?php fc_custom_loop($query_string.'&template=article-list'); ?>

  <?php if (fc_show_posts_nav()) : ?>
    <?php if (function_exists('fc_pagination') ) : fc_pagination(); else: ?>
      <ul class="nav-paging">
        <?php if ( $paged < $wp_query->max_num_pages ) : ?><li class="prev"><?php next_posts_link('Previous'); ?></li><?php endif; ?>
        <?php if ( $paged > 1 ) : ?><li class="next"><?php previous_posts_link('Next'); ?></li><?php endif; ?>
      </ul>
    <?php endif; ?>
  <?php endif; ?>

<?php else : ?>
  <p class="fail">Sorry, there are no articles at the moment.</p>
<?php endif; ?>
</main><!-- /#content-main -->

<?php get_footer(); ?>
