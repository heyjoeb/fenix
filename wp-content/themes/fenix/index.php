<?php get_header(); ?>

<div class="main-content">
  <?php
  $top_services = get_pages( array('parent' => 0, 'sort_column' => 'menu_order', 'post_type' => 'service') );
  foreach($top_services as $service):
    ?>
    <h1><a href="<?php echo get_permalink($service->ID); ?>"><?php echo $service->post_title; ?></a></h1>
    <div class="underline"></div>
    <div>
    <?php
    $parent_id = $service->ID;
    include('services_preview.php');
    ?>
    </div>
    <div class="clearfloat"></div>
  <?php endforeach; ?>

  <div class="underline"></div>
  <div class="underline"></div>

  <div id="linea-directa">
    <span class="title-linea-directa">LÍNEA DIRECTA</span>
    <span class="text-linea-directa">320 315 1335</span>
    <div class="clearfloat"></div>
  </div>
  <!--termina #linea-directa-->
</div>
<!--termina .main-content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
