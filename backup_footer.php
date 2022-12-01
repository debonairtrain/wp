    <!-- footer -->
    <footer id="footer" class="h-auto w-full flex items-center justify-center mt-0 mb-5">
        <!-- Wrapper -->
        <div class="h-full w-11/12 md:w-10/12 rounded-md flex flex-col items-center justify-center space-y-5 bg-[#f9f9f9]
        overflow-hidden py-10">
            <!-- Inner -->
            <div class="w-full mx-auto flex flex-col items-center justify-center">
                <a
                href="index.html" 
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="100">
                    <?php
                        if(has_custom_logo()) {
                            if (function_exists('the_custom_logo')) {
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                
                                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" style="max-width: 75px;" />';
                            }
                        }
                        else {
                            echo '<a href="' . home_url() . '">' . get_bloginfo('name') . '</a>';
                        }
                    ?>
                </a>
                <!-- Debonair Footer Description Widget -->
                <div 
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="150"
                class="w-11/12 md:w-5/12 text-[#336699]/70 text-center font-normal my-3 mt-5 text-md">
                   <?php dynamic_sidebar('footer-widget-description'); ?>
                </div>
                
                <!-- Debonair Footer Menu Links -->
                <?php
                    wp_nav_menu(
                        array(
                            'menu' => 'footer',
                            'depth' => 0,
                            'container' => '',
                            'theme_location' => 'footer',
                            'items_wrap' => '<ul data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" id="" class="my-8 flex flex-col md:flex-row items-center justify-center space-x-0 space-y-4 md:space-y-0">%3$s</ul>',
                            'walker' => new Debonair_Walker_Footer_Nav_Menu(),
                        )
                    )                        
                ?>

                <!-- Debonair Footer Social Links -->
                <?php dynamic_sidebar('footer-widget-social'); ?>
            </div>

            <!-- Debonair Footer Copyright Widget -->
            <div 
            data-aos="fade-up"
            data-aos-offset="10"
            data-aos-duration="1000"
            data-aos-delay="300"
            class="w-9/12 md:w-full text-sm text-[#336699]/70 text-center">
                <!-- &copy;Copyright 2022 Debonair Training | All Rights Reserved. -->
                <?php dynamic_sidebar('footer-widget-copyright'); ?>
            </div>
        </div>
    </footer>

    <?php 
        wp_footer();
    ?>
</body>
</html>