<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// DTBM Non Carousel Output
// post Setting
wp_enqueue_script( 'team-isotope-min-js', DTBM_PLUGIN_URL . 'assets/js/isotope.pkgd.min.js' );
wp_enqueue_script( 'team-imagesloaded-js', DTBM_PLUGIN_URL . 'assets/js/imagesloaded.pkgd.js' );
?>
<div class="row all-team dtbm-container-<?php echo esc_attr( $dtbm_post_id ); ?>">
<?php
if ( $dtbm_loop->have_posts() ) {
	while ( $dtbm_loop->have_posts() ) :
		$dtbm_loop->the_post();
		if ( isset( $dtbm_post_settings['dtbm_template_column_ids'] ) && count( $dtbm_post_settings['dtbm_template_column_ids'] ) ) {
			$count = 0;
			foreach ( $dtbm_post_settings['dtbm_template_column_ids'] as $attachment_id ) {

				$dtbm_icon_link_url_first  = $dtbm_post_settings['dtbm_icon_link_url_first'][ $count ];
				$dtbm_icon_link_url_second = $dtbm_post_settings['dtbm_icon_link_url_second'][ $count ];
				$dtbm_icon_link_url_third  = $dtbm_post_settings['dtbm_icon_link_url_third'][ $count ];
				$dtbm_designation          = $dtbm_post_settings['dtbm_designation'][ $count ];

				$attachment = get_post( $attachment_id ); // get all image details
				// load image according to setting saved
				$dtbm_member_image       = wp_get_attachment_image_src( $attachment_id, $dtbm_image_size, true ); // return is URL as array[0]
				$dtbm_member_image_alt   = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
				$dtbm_member_name        = $attachment->post_title; // attachment title
				$dtbm_member_description = $attachment->post_content;
				?>
				<div class="<?php echo esc_attr( $dtbm_total_column ); ?> single-team">
					 <?php if ( $dtbm_template_design == 'template1' ) { ?>
						<figure class="snip1218_<?php echo esc_attr( $dtbm_post_id ); ?>">
							<div class="image_<?php echo esc_attr( $dtbm_post_id ); ?>"><img src="<?php echo esc_url( $dtbm_member_image[0] ); ?>" alt="<?php echo esc_html( $dtbm_member_image_alt ); ?>">
								<?php
								if ( $dtbm_member_description ) {
									?>
									<p>"<?php echo esc_html( $dtbm_member_description ); ?>"</p><?php } ?>
							</div>
							<figcaption>
								<?php
								if ( $dtbm_member_name ) {
									?>
									<h3><?php echo esc_html( $dtbm_member_name ); ?></h3><?php } ?>
								<?php
								if ( $dtbm_designation ) {
									?>
									<h5><?php echo esc_html( $dtbm_designation ); ?></h5><?php } ?>
								<div class="icons_<?php echo esc_attr( $dtbm_post_id ); ?>">
									<?php
									if ( $dtbm_icon_link_url_first ) {
										?>
										<i><a href="<?php echo esc_url( $dtbm_icon_link_url_first ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-facebook"></i></a></i> <?php } ?>
									<?php
									if ( $dtbm_icon_link_url_second ) {
										?>
										<i><a href="<?php echo esc_url( $dtbm_icon_link_url_second ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-twitter"></i></a></i> <?php } ?>
									<?php
									if ( $dtbm_icon_link_url_third ) {
										?>
										<i><a href="<?php echo esc_url( $dtbm_icon_link_url_third ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-linkedin"></i></a></i> <?php } ?>
								</div>
							</figcaption>
						</figure>
						<?php }  if ( $dtbm_template_design == 'template2' ) { ?>
							<div class="team-style">
								<figure class="snip1142_<?php echo esc_attr( $dtbm_post_id ); ?>">
									<img src="<?php echo esc_url( $dtbm_member_image[0] ); ?>" alt="<?php echo esc_html( $dtbm_member_image_alt ); ?>">
									<h3>
									<?php
									if ( $dtbm_member_name ) {
										?>
										<?php echo esc_html( $dtbm_member_name ); ?> &nbsp; <br><?php } ?>
									<span><?php echo esc_html( $dtbm_designation ); ?></span></h3>
									<figcaption>
									<?php
									if ( $dtbm_member_description ) {
										?>
										<p><?php echo esc_html( $dtbm_member_description ); ?></p><?php } ?>
									<div class="icons_<?php echo esc_attr( $dtbm_post_id ); ?>">
										<?php
										if ( $dtbm_icon_link_url_first ) {
											?>
											<i><a href="<?php echo esc_url( $dtbm_icon_link_url_first ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-facebook"></i></a></i> <?php } ?>
										<?php
										if ( $dtbm_icon_link_url_second ) {
											?>
											<i><a href="<?php echo esc_url( $dtbm_icon_link_url_second ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-twitter"></i></a></i> <?php } ?>
										<?php
										if ( $dtbm_icon_link_url_third ) {
											?>
											<i><a href="<?php echo esc_url( $dtbm_icon_link_url_third ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-linkedin"></i></a></i> <?php } ?>
									</div>
									</figcaption>
								</figure>
							</div>
						<?php }  if ( $dtbm_template_design == 'template3' ) { ?>
							<div class="team-block_<?php echo esc_attr( $dtbm_post_id ); ?> content-center_<?php echo esc_attr( $dtbm_post_id ); ?>">
								<img src="<?php echo esc_url( $dtbm_member_image[0] ); ?>" class="img-responsive" alt="<?php echo esc_html( $dtbm_member_image_alt ); ?>">
								<div class="team-three-content">
									<?php
									if ( $dtbm_member_name ) {
										?>
										<h3><?php echo esc_html( $dtbm_member_name ); ?></h3><?php } ?>
									<?php
									if ( $dtbm_designation ) {
										?>
										<em><?php echo esc_html( $dtbm_designation ); ?></em><?php } ?>
									<?php
									if ( $dtbm_member_description ) {
										?>
										<p><?php echo esc_html( $dtbm_member_description ); ?></p><?php } ?>
									<div class="tb-socio_<?php echo esc_attr( $dtbm_post_id ); ?>">
										<?php
										if ( $dtbm_icon_link_url_first ) {
											?>
											<a href="<?php echo esc_url( $dtbm_icon_link_url_first ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-facebook"></i></a><?php } ?>
										<?php
										if ( $dtbm_icon_link_url_second ) {
											?>
											<a href="<?php echo esc_url( $dtbm_icon_link_url_second ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-twitter"></i></a> <?php } ?>
										<?php
										if ( $dtbm_icon_link_url_third ) {
											?>
											<a href="<?php echo esc_url( $dtbm_icon_link_url_third ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-linkedin"></i></a><?php } ?>
									</div>
								</div>
							</div>
						<?php }  if ( $dtbm_template_design == 'template4' ) { ?>
							<figure class="snip1105_<?php echo esc_attr( $dtbm_post_id ); ?>">
							  <img src="<?php echo esc_url( $dtbm_member_image[0] ); ?>" alt="<?php echo esc_html( $dtbm_member_image_alt ); ?>">
								<figcaption>
									<div class="icons_<?php echo esc_attr( $dtbm_post_id ); ?>">
										<?php
										if ( $dtbm_icon_link_url_first ) {
											?>
											<a href="<?php echo esc_url( $dtbm_icon_link_url_first ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-facebook"></i></a><?php } ?>
										<?php
										if ( $dtbm_icon_link_url_second ) {
											?>
											<a href="<?php echo esc_url( $dtbm_icon_link_url_second ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-twitter"></i></a><?php } ?>
										<?php
										if ( $dtbm_icon_link_url_third ) {
											?>
											<a href="<?php echo esc_url( $dtbm_icon_link_url_third ); ?>" target="<?php echo esc_html( $dtbm_link_tab ); ?>"><i class="fa fa-linkedin"></i></a><?php } ?>
									</div>
									<h3>
									<?php
									if ( $dtbm_member_name ) {
										?>
										<?php echo esc_html( $dtbm_member_name ); ?> &nbsp; <br><?php } ?><span><?php echo esc_html( $dtbm_designation ); ?></span></h3>
								</figcaption>
							</figure>
					<?php } ?>
				</div>
				<?php
				$count++;
			} // end of attachment for each
		}
	endwhile;
	// reset post data
	wp_reset_postdata();
}
?>
</div>
<script>
jQuery(document).ready(function () {
	// isotope effect function
	// Method 1 - Initialize Isotope, then trigger layout after each Team loads.
	var $grid = jQuery('.all-team').isotope({
		// options...
		itemSelector: '.single-team',
	});
	// layout Isotope after each Team loads
	$grid.imagesLoaded().progress( function() {
		$grid.isotope('layout');
	});
});
</script>
