<?php get_header(); ?>

<?php
$service_template = get_post_meta( get_the_ID(), '_template', true );
if ($service_template && $service_template == 'conferencias'){
  get_template_part('page', 'conf');
}else{
?>

<div class="main-content">

  <?php
  global $post;
  if ($post->post_parent == 0):
  ?>

  <h1><?php the_title(); ?></h1>
  <div class="underline"></div>
  <div>
  <?php
  $parent_id = get_the_ID();
  include('services_preview.php');
  ?>
  </div>
  <div class="clearfloat"></div>

  <?
  else:
    $parent = get_post($post->post_parent);
    $pre_title = $parent->post_title .' // ';
  ?>

  <h1><?php echo $pre_title ?><?php the_title(); ?></h1>
  <div class="underline"></div>

  <?php endif; ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('one-column'); ?>>
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>

  <div class="clearfloat"></div>
  <div class="underline"></div>
  <div class="underline"></div>
</div>

<?php
}
get_sidebar();
get_footer();
?>
