<?php get_header(); ?>

<div class="main-content">
  <h1><?php single_cat_title(); ?></h1>
  <div class="underline"></div>
  <div class="one-column">
  <?php
  global $wp_query;
  $args = array_merge( $wp_query->query_vars, array( 'post_type' => 'inform' ) );
  query_posts( $args );
  ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('predicciones-container'); ?>>
      <?php the_post_thumbnail('serv-thumb', array('class' => 'attachment-serv-thumb wp-post-image alignleft')); ?>
      <h2>
          <?php the_title(); ?>
          <span class="fecha-informes"><?php the_time('F j \d\e Y'); ?></span>
      </h2>
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
  </div>
</div>
<!--termina .main-content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
