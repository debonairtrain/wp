<?php
 
class Debonair_Footer_Social_Links extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'debonair-footer-social-links',  // Base ID
            'Debonair Footer Social Links'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Debonair_Footer_Social_Links' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '',
        'after_title'   => '',
        'before_widget' => '',
        'after_widget'  => ''
    );
 
    public function widget( $args, $instance ) {
 
        // echo $args['before_widget'];

        echo '<div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250" class="my-8 flex items-center justify-center space-x-5">';
 
        // Facebook
        if ( ! empty( $instance['facebook'] ) ) {
            echo '<a href="' . esc_html__($instance['facebook'], 'debonair') . '"><i class="la la-facebook cursor-pointer h-5 w-12 px-5 text-[#336699]/70 flex items-center justify-center text-2xl font-normal"></i>';
        }

        // Instagram
        if ( ! empty( $instance['instagram'] ) ) {
            echo '<a href="' . esc_html__($instance['instagram'], 'debonair') . '"><i class="la la-instagram cursor-pointer h-5 w-12 px-5 text-[#336699]/70 flex items-center justify-center text-2xl font-normal"></i>';
        }

        // Linkedin
        if ( ! empty( $instance['linkedin'] ) ) {
            echo '<a href="' . esc_html__($instance['linkedin'], 'debonair') . '"><i class="la la-linkedin cursor-pointer h-5 w-12 px-5 text-[#336699]/70 flex items-center justify-center text-2xl font-normal"></i>';
        }
    
        echo '</div>';

        // echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : esc_html__( '', 'debonair' );
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : esc_html__( '', 'debonair' );
        $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : esc_html__( '', 'debonair' );
?>
        <!-- Facebook -->
       <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php echo esc_html__( 'Facebook Url:', 'debonair' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
        </p>

        <!-- Instagram -->
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php echo esc_html__( 'Instagram Url:', 'debonair' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>">
        </p>

        <!-- Linkedin -->
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php echo esc_html__( 'Linkedin Url:', 'debonair' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>">
        </p>
       
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['facebook'] = ( !empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['instagram'] = ( !empty( $new_instance['instagram'] ) ) ? $new_instance['instagram'] : '';
        $instance['linkedin'] = ( !empty( $new_instance['linkedin'] ) ) ? $new_instance['linkedin'] : '';
 
        return $instance;
    }
 
}
$my_widget = new Debonair_Footer_Social_Links();
