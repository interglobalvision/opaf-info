<?php
get_header();
?>

<main id="main-content">
  <section id="posts">
    <div class="container">
      <div class="grid-row">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $location = get_post_meta($post->ID, '_igv_home_location', true);
    $press = get_post_meta($post->ID, '_igv_home_press', true);

    $fair_args = array(
      'post_type' => 'fair',
      'orderby' => 'meta_value_num',
      'meta_key' => '_igv_fair_year',
      'posts_per_page' => 1,
    );

    $fair_query = new WP_Query($fair_args);

    if ($fair_query->have_posts()) {
      while ($fair_query->have_posts()) {
        $fair_query->the_post();

        $fair_year = get_post_meta($post->ID, '_igv_fair_year', true);
        pr($fair_year);
      }
    }

    wp_reset_postdata()
?>

        <article <?php post_class('grid-item item-s-12'); ?> id="post-<?php the_ID(); ?>">

          <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

          <?php the_content(); ?>

        </article>

<?php
  }
} else {
?>
        <article class="u-alert grid-item item-s-12"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

      </div>
    </div>
  </section>

  <?php get_template_part('partials/pagination'); ?>

</main>

<?php
get_footer();
?>
