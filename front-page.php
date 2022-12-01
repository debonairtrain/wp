<?php
    get_header();
?>
    <!-- content -->
    <main class="h-auto w-full overflow-hidden">
        <!-- Hero -->

        <?php get_template_part( 'template-parts/content', 'one' ); ?>

        <!-- Clientele -->

        <?php get_template_part( 'template-parts/content', 'two' ); ?>
        <!-- Section Two -->
        <section id="sectionTwo" class="h-auto md:h-52 w-full flex items-center justify-center my-20 md:my-24">
            <!-- Inner -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="50"
                    class="h-full w-11/12 md:w-10/12 rounded-md flex flex-col md:flex-row items-center justify-center
            md:space-x-5 bg-[#336699] shadow-2xl shadow-[#336699]/50 overflow-hidden">
                <div class="h-36 md:h-16 w-52 bg-transparent flex flex-col items-center justify-center space-y-2 md:space-y-5
               md:border-r md:border-[rgba(255,255,255,0.3)]">
                    <h3
                            id="counter"
                            data-aos-id="counter"
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="100"
                            class="font-bold text-white text-4xl" >Top 100</h3>
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="150"
                            class="text-lg text-white font-norma">QS world ranking</p>
                </div>
                <div class="h-36 md:h-16 w-52 bg-transparent flex flex-col items-center justify-center space-y-2 md:space-y-5
               md:border-r md:border-[rgba(255,255,255,0.3)]">
                    <h3
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="200"
                            class="font-bold text-white text-4xl">97%</h3>
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="250"
                            class="text-lg text-white font-norma">Happy Clients</p>
                </div>
                <div class="h-36 md:h-16 w-52 bg-transparent flex flex-col items-center justify-center space-y-2 md:space-y-5
               md:border-r md:border-[rgba(255,255,255,0.3)]">
                    <h3
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="300"
                            class="font-bold text-white text-4xl">23</h3>
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="350"
                            class="text-lg text-white font-norma">Awards</p>
                </div>
                <div class="h-36 md:h-16 w-52 bg-transparent flex flex-col items-center justify-center space-y-2 md:space-y-5">
                    <h3
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="400"
                            class="font-bold text-white text-4xl">20 yrs</h3>
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="450"
                            class="text-lg text-white font-norma">Experience</p>
                </div>
            </div>
        </section>

        <!-- Section Three -->

          <?php get_template_part( 'template-parts/content', 'three' ); ?>

        <!-- Section Four -->
        <section id="sectionFour" class="h-auto md:h-[35rem] w-full flex flex-col items-center justify-center my-20 md:my-0">
            <!-- Inner -->
            <div class="h-auto md:h-72 w-full rounded-md md:py-10 flex flex-col md:flex-row items-center justify-center md:space-x-5
            space-y-3 md;space-y-0 bg-transparent">
                <div class="h-full w-1/2 flex items-center justify-center position relative">
                    <!-- <div class="h-72 w-56 rounded-md bg-blue-600 position absolute"></div>
                    <div class="h-72 w-56 rounded-md bg-green-600 position absolute right-28 top-10"></div> -->
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="50"
                            class="h-auto md:max-w-[500px] max-w-[300px] mx-auto md:transform md:translate-x-[80px]" />
                            <?php dynamic_sidebar('about-us-image'); ?>
                    </div>
                </div>
                <div class="h-full w-11/12 md:w-1/2 flex flex-col items-start justify-center">
                  <?php dynamic_sidebar('about-us'); ?>

                    <div class="h-full w-11/12 md:w-2/2 flex flex-col items-start justify-center">
                        <?php echo apply_shortcodes( '[maxbutton id="7"]' ); ?>
                    </div>
                </div>
         
        </section>

        <!-- Section Five -->

		<section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-auto w-10/12 flex flex-col items-center justify-center space-y-8">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="w-full md:w-7/12 text-4xl md:text-5xl text-center font-medium leading-snug m-0">
                <?php dynamic_sidebar('testimonial-description'); ?>
            </h2>

            <!-- Slider main container -->
           

                <!-- Additional required wrapper -->
                <div class="swiper-wrapper h-full w-full mx-auto" style="height:auto!important; ">
                    <!-- Slides -->
                      <?php echo apply_shortcodes('[TEST_B id=12047]'); ?>

                </div>

                
          
        </div>
    </section>
        
    </main>
<?php
    get_footer();
?>
