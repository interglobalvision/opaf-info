<?php
get_header();
?>

<main id="main-content" class="margin-bottom-mid">
  <div class="container">
    <div class="grid-row">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $location = get_post_meta($post->ID, '_igv_home_location', true);
    $press = get_post_meta($post->ID, '_igv_home_press', true);
    $options = get_site_option('_igv_site_options');
?>

      <article <?php post_class('grid-item item-s-12'); ?> id="post-<?php the_ID(); ?>">

      <?php
        if (!empty($options['contact_email']) || !empty($options['socialmedia_instagram']) || !empty($options['socialmedia_twitter']) || !empty($options['socialmedia_facebook'])) {
      ?>
        <section id="contact" class="margin-bottom-basic">
          <ul>
            <?php echo !empty($options['contact_email']) ? '<li><a href="mailto:' . $options['contact_email'] . '">Email</a></li>' : ''; ?>
            <?php echo !empty($options['socialmedia_instagram']) ? '<li><a href="https://instagram.com/' . $options['socialmedia_instagram'] . '">Instagram</a></li>' : ''; ?>
            <?php echo !empty($options['socialmedia_twitter']) ? '<li><a href="https://twitter.com/' . $options['socialmedia_twitter'] . '">Twitter</a></li>' : ''; ?>
            <?php echo !empty($options['socialmedia_facebook']) ? '<li><a href="' . $options['socialmedia_facebook'] . '">Facebook</a></li>' : ''; ?>
          </ul>
        </section>
      <?php
        }
      ?>

        <section id="about" class="margin-bottom-basic padding-top-tiny">
          <h2 class="font-lucida font-size-large margin-bottom-tiny">About</h2>
          <?php the_content(); ?>
        </section>

      <?php
        if (!empty($location)) {
      ?>
        <section id="location" class="margin-bottom-basic padding-top-tiny">
          <h2 class="font-lucida font-size-large margin-bottom-tiny">Location</h2>
          <?php echo apply_filters('the_content', $location); ?>
        </section>
      <?php
        }

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
            $participants = get_post_meta($post->ID, '_igv_fair_participants', true);

            if (!empty($participants)) {
      ?>
        <section id="participants" class="margin-bottom-basic padding-top-tiny">
          <h2 class="font-lucida font-size-large margin-bottom-tiny">Participants <?php echo $fair_year; ?></h2>
          <?php echo apply_filters('the_content', $participants); ?>
        </section>
      <?php
            }
          }
        }

        wp_reset_postdata();

        if (!empty($press)) {
      ?>
        <section id="press" class="margin-bottom-basic padding-top-tiny">
          <h2 class="font-lucida font-size-large margin-bottom-tiny">Press</h2>
          <?php echo apply_filters('the_content', $press); ?>
        </section>
      <?php
        }
      ?>

      </article>

<?php
  }
}
?>

    </div>
  </div>
</main>

<?php
get_footer();
?>
