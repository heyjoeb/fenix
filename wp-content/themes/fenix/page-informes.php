<?php
/*
 * Template name: Informes
 */
get_header();
?>

<div class="main-content">
  <?php
  $categories = get_categories();
  foreach($categories as $category){
    $category_link = get_category_link( $category->cat_ID );
    ?>
    <h1><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $category->name; ?></a></h1>
    <div class="underline"></div>
    <div class="one-column">
        <?php echo kc_get_term_thumbnail($category->cat_ID, 'serv-thumb', array('class' => 'attachment-serv-thumb alignleft')); ?>
        <?php
        $view_more = '<br /><a href="'. esc_url( $category_link ) .'">Ver '. $category->name .'</a>';
        echo apply_filters('the_content', $category->description.$view_more);
        ?>
        <div class="clearfloat"></div>
    </div>
    <?php
  }
  ?>
  <div class="underline"></div>
  <div class="underline"></div>
</div>
<!--termina .main-content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
