    <!-- footer -->
    <footer id="footer" class="h-auto w-full flex items-center justify-center mt-0 mb-5" style="color:white!important;">
        <!-- Wrapper -->
        <div class="h-full w-11/12 md:w-10/12 rounded-md flex flex-col items-center justify-center space-y-5 bg-[#336699]
        overflow-hidden py-10" style="color:white!important;">
            <!-- Inner -->
            <div class="w-full mx-auto flex flex-col items-center justify-center" style="color:white!important;">
                <a
                href="index.html"
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="100" style="color:white!important;">
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
                class="w-11/12 md:w-5/12  text-center font-normal my-3 mt-5 text-md" style="color:white!important;">
                   <?php dynamic_sidebar('footer-widget-description'); ?>
                </div>

                <!-- Debonair Footer Social Links -->

                <div
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="200"
                class="my-8 flex flex-col md:flex-row items-center justify-center space-x-0 space-y-4 md:space-y-0" style="margin-top:-5px;">
                    <a class="md:border-r md:border-[#ffffff]/20 h-5 w-full md:w-32 text-[#ffffff]/70
                    flex items-center justify-center text-md md:text-sm font-normal" href="#" target="_parent" rel="">
                        Home
                    </a>
                    <a class="md:border-r md:border-[#ffffff]/20 h-5 w-full md:w-32 text-[#ffffff]/70
                    flex items-center justify-center text-md md:text-sm font-normal" href="<?php echo get_permalink( get_page_by_path( 'privacy' ) ); ?>" target="_parent" rel="">
                        Privacy Policy
                    </a>
                    <a class="md:border-r md:border-[#ffffff]/20 h-5 w-full md:w-32 text-[#ffffff]/70
                    flex items-center justify-center text-md md:text-sm font-normal" href="<?php echo get_permalink( get_page_by_path( 'software-download' ) ); ?>" target="_parent" rel="">
                        Software Download
                    </a>
                    <a class="h-5 w-full md:w-32 text-[#ffffff]/70
                    flex items-center justify-center text-md md:text-sm font-normal md:pr-8" href="<?php echo get_permalink( get_page_by_path( 'contact-us' ) ); ?>" target="_parent" rel="">
                        Contact Us
                    </a>
                </div>
                  <?php dynamic_sidebar('footer-widget-social'); ?>

            </div>

            <!-- Debonair Footer Copyright Widget -->
            <div
            data-aos="fade-up"
            data-aos-offset="10"
            data-aos-duration="1000"
            data-aos-delay="300"
            class="w-11/12 md:w-full text-sm text-center" style="color:white!important; text-align:center!important; margin-top:-5px;">
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
