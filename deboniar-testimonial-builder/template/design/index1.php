<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wpsm_row">  
<style>

#wpsm_testi_d_row_<?php echo esc_attr($post_id); ?> .wpsm_testi_title{
	font-size:<?php echo esc_attr($test_mb_name_font_size); ?>px !important;
	color:<?php echo esc_attr($test_mb_name_clr); ?> !important;
	font-family:'<?php  echo esc_attr($test_font_family); ?>';
	margin-top: 12px !important;
    margin-bottom: 8px !important;
	padding:0px !important;
}
#wpsm_testi_d_row_<?php echo esc_attr($post_id); ?> .wpsm_testi_title > small{
	font-size:<?php echo esc_attr($test_mb_deg_font_size); ?>px !important;
	color:<?php echo esc_attr($test_mb_deg_clr); ?> !important;
	font-family:'<?php  echo esc_attr($test_font_family); ?>';
}
#wpsm_testi_d_row_<?php echo esc_attr($post_id); ?> .wpsm_testi_links{
	font-size:<?php echo esc_attr($test_mb_web_link_font_size); ?>px !important;
	color:<?php echo esc_attr($test_mb_web_link_clr); ?> !important;
	font-family:'<?php  echo esc_attr($test_font_family); ?>';
}
#wpsm_testi_d_row_<?php echo esc_attr($post_id); ?> .wpsm_testi_description{
	font-size:<?php echo esc_attr($test_mb_content_font_size); ?>px !important;
	color:<?php echo esc_attr($test_mb_content_clr); ?> !important;
	font-family:'<?php  echo esc_attr($test_font_family); ?>';
	font-weight: 400;
}
#wpsm_testi_d_row_<?php echo esc_attr($post_id); ?> .wpsm_testi_pic > img{
	<?php  if($test_image_layout=="2") { ?>
		border-radius: 50% !important;
	<?php } else { ?>
		border-radius: 0% !important;
	<?php } ?>
}
<?php echo esc_attr($custom_css); ?>
</style>
 <?php
 
 $i=1;
switch($test_layout){
	case(12):
		$row=1;
	break;
	case(6):
		$row=2;
	break;
	case(4):
		$row=3;
	break;
}
 
foreach($test_data as $single_data)
{
	$mb_photo = $single_data['mb_photo'];
	$mb_name = $single_data['mb_name'];
	$mb_deg = $single_data['mb_deg'];
	$mb_website = $single_data['mb_website'];
	$mb_desc = $single_data['mb_desc'];
	$mb_id = $single_data['mb_id'];
	$crop_size = wp_get_attachment_image_src($mb_id,'wpsm_testi_small');

	if($mb_id==0){
		$img_url = $mb_photo;
	}
	else{
		$img_url = $crop_size[0];
	}
 
 ?>
	
			<div class="wpsm_col-md-<?php echo esc_attr($test_layout); ?> wpsm_testimonial_2">
				
					<div class="wpsm_testi_review">
						<div class="wpsm_testi_pic">
							<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_html($mb_name); ?>">
						</div>
						<h4 class="wpsm_testi_title">
							<?php echo esc_html($mb_name); ?>
							<?php if($mb_deg!=""){ ?><small><?php echo esc_html($mb_deg); ?></small><?php } ?>
						</h4>
						<?php if($mb_website!=""){ ?>
							<a class="wpsm_testi_links" href="<?php echo esc_url($mb_website); ?>" target="_blank"><?php echo esc_html($test_mb_web_link_label); ?></a>
						<?php } ?>
					</div>
					<?php if($mb_desc!=""){ ?>
						<p class="wpsm_testi_description">
							<?php echo wp_kses_post($mb_desc); ?>
						</p>
					<?php } ?>
			</div>
			<?php
			if($i%$row==0){
				?>
				</div>
				<div class="wpsm_row">
				<?php 
			}	
	
	 $i++;
       } ?>
 </div>	   
   