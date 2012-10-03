<?php
$args = array( 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'service', 'post_parent' => $parent_id );
$query_services = new WP_Query($args);
while ( $query_services->have_posts() ) : $query_services->the_post();
?>
  <div class="three-columns">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('serv-thumb'); ?></a>
    <h2>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <p class="text-dark">
      <?php echo get_the_excerpt(); ?>
    </p>
  </div>
<?php
endwhile;
wp_reset_postdata();
?>
