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
    $posts_per_page = 1;

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
      <?php the_post_thumbnail('serv-thumb', array('class' => 'attachment-serv-thumb wp-post-image alignleft')); ?>
      <?php the_content(); ?>
      <ul class="lista-conferencias">
          <?php
          $date = get_post_meta( $post->ID, "_date", true );
          if ($date){
          ?>
          <li>
            <span class="yellow-normal">Fecha:</span>
            <?php echo $date; ?>
          </li>
          <?php
          }
          $place = get_post_meta( $post->ID, "_place", true );
          if ($place){
          ?>
          <li>
            <span class="yellow-normal">Lugar:</span>
            <?php echo $place; ?>
          </li>
          <?php
          }
          $duration = get_post_meta( $post->ID, "_duration", true );
          if ($duration){
          ?>
          <li>
            <span class="yellow-normal">Duración:</span>
            <?php echo $duration; ?>
          </li>
          <?php
          }
          $value = get_post_meta( $post->ID, "_value", true );
          if ($value){
          ?>
          <li>
            <span class="yellow-normal">Valor:</span>
            <?php echo $value; ?>
          </li>
          <?php } ?>
      </ul>
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

  <?php wp_reset_postdata(); ?>
</div>
