<?php get_header(); ?>

<div class="main-content">
  <?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('one-column'); ?>>
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
  <div class="clearfloat"></div>
  <div class="underline"></div>
  <div class="underline"></div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
