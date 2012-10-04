<?php get_header(); ?>

<div class="main-content">
  <h1><?php single_cat_title(); ?></h1>
  <div class="underline"></div>
  <div class="one-column">

    <?php
    global $wp_query;
    $posts_per_page = 4;

    // get the current page
    if ( get_query_var('paged') ) {
      $current_page = get_query_var('paged');
    } else if ( get_query_var('page') ) {
      $current_page = get_query_var('page');
    } else {
      $current_page = 1;
    }

    $args = array_merge( $wp_query->query_vars, array( 'post_type' => 'inform', 'posts_per_page' => $posts_per_page ) );
    if ($current_page > 1) {
      $args['paged'] = $current_page;
    }
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
  <div class="pagination">
  <?php
  $base_url = add_query_arg('page','%#%');
  echo paginate_links( array(
    'base' => $base_url,
    'format' => '',
    'current' => $current_page,
    'show_all' => true,
    'total' => $wp_query->max_num_pages,
    'end_size'  => 1,
    'prev_text' => 'Anterior',
    'next_text' => 'Siguiente',
    'type' => 'list',
  ) );
  ?>
  </div>
</div>
<!--termina .main-content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
