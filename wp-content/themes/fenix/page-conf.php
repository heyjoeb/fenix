<div class="main-content">
  <?
    global $post;
    $parent = get_post($post->post_parent);
    $pre_title = $parent->post_title .' // ';
  ?>

  <h1><?php echo $pre_title ?><?php the_title(); ?></h1>
  <div class="underline"></div>

  <div class="one-column">
    <p class="text-light"><?php echo $post->post_content; ?></p>

    <?php
    $posts_per_page = 2;

    // get the current page
    if ( get_query_var('paged') ) {
      $current_page = get_query_var('paged');
    } else if ( get_query_var('page') ) {
      $current_page = get_query_var('page');
    } else {
      $current_page = 1;
    }

    $args = array( 'post_type' => 'conference', 'posts_per_page' => $posts_per_page );
    if ($current_page > 1) {
      $args['paged'] = $current_page;
    }
    query_posts( $args );
    ?>

    <?php while ( have_posts() ) : the_post(); ?>
      <h2 class="yellow-normal"><?php the_title(); ?></h2>
      <img src="img/img_three_columns.jpg" width="180" height="100" alt="img">
      <?php the_content(); ?>
    <?php endwhile; ?>

  </div>

  <div class="pagination">
  <?php
  global $wp_query;
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
