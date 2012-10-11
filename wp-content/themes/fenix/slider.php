<?php
if (is_page() || is_category() || 'service' == get_post_type()){
	echo '<div class="header_interna">';
	if (is_page()) {
		the_post_thumbnail('full');
	}elseif(is_category()){
		$informes = get_page_by_path('informes');
		echo get_the_post_thumbnail( $informes->ID, 'full', $attr );
	}else{
		$image_id = get_post_meta( get_the_ID(), "_wide_img", true );
		echo wp_get_attachment_image( $image_id, 'full');
	}
	echo '</div>';
}else{
?>
<div id="slides">
	<div class="slides_container">
		<?php
		$args = array( 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'slide' );
		$query_slider = new WP_Query($args);
		while ( $query_slider->have_posts() ) : $query_slider->the_post();
			$link = get_post_meta( get_the_ID(), '_slide_link', true );
		?>
			<div>
				<a href="<?php echo $link; ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('full'); ?></a>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();
		?>
	</div>
	<!--termina .slides_container-->
</div>
<!--termina #slides-->

<?php } ?>
