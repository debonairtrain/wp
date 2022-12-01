<?php
/*
 * Template Name: LMS Template
 *
 */
?>
<?php
get_header();
?>
<!-- content -->
<main class="h-auto w-full overflow-hidden">
    <!-- Hero -->
    <section id="sectionOne" class="h-auto md:h-[40rem] w-full flex items-center justify-center mt-10">
        <!-- Inner -->
        <div class="h-full w-11/12 md:w-10/12 flex flex-col md:flex-row items-center justify-center">
            <!-- Left -->
            <div class="h-full w-full md:w-[60%] flex flex-col items-start justify-center">
                <?php dynamic_sidebar('lms-page-description'); ?>
                <?php echo apply_shortcodes( '[maxbutton id="1"]' ); ?>
                <div class="" style="text-align:right!important;">
                  <?php dynamic_sidebar('lms-page-other-description'); ?>

                </div>
            </div>
            <!-- Right -->
            <div class="h-[35rem] md:h-96 md:h-full w-full md:w-[40%] flex flex-row items-center justify-end">
                <div
                        data-aos="zoom-out"
                        data-aos-duration="1000"
                        data-aos-delay="500"
                        alt="Mockup" style="height: auto; position: absolute;" class="w-[300px] md:w-[500px] md:right-[100px]" />
                        <?php dynamic_sidebar('lms-page-image'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section One -->
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-full w-11/12 md:w-10/12 flex flex-col md:flex-row items-center justify-center space-y-20">
            <!-- Right -->
            <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-start space-y-8">
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-9/12 text-4xl md:text-5xl font-medium leading-snug">Why online learning method</h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="w-8/12 text-lg md:text-xl text-gray-400 leading-loose">
                    The internet and worldwide web has revolutioned information access and gives competitive advantage to the keen.
                </p>
                <a
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        href="https://debonairtraining.com/lms/" target="_blank" rel="noreferrer"
                        class="h-12 w-full md:w-56 bg-[#336699] text-lg text-white rounded-md px-2 hover:bg-white hover:text-[#336699]
                    flex items-center justify-center font-medium transition duration-700 hover:shadow-none hover:border border-[#336699]">
                    Get Started
                </a>
            </div>
            <!-- Right -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="h-full w-full md:w-1/2 grid-cols-1 md:grid grid-cols-2 gap-10">
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0">
                    <i class="h-12 w-12 la la-book text-2xl text-white
                        flex items-center justify-center p-2 bg-[#336699] rounded-full"></i>
                    <h2 class="text-xl font-medium">Flexible Time</h2>
                    <p class="w-10/12 md:w-11/12 text-sm text-gray-700 leading-loose">
                        With an LMS it enables ondemand Just in time learning. 24 hours, 7 days a week
                    </p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0">
                    <i class="h-12 w-12 la la-book text-2xl text-white
                        flex items-center justify-center p-2 bg-[#336699] rounded-full"></i>
                    <h2 class="text-xl font-medium">Certificate</h2>
                    <p class="w-10/12 md:w-11/12 text-sm text-gray-700 leading-loose">
                        Our LMS are configured for use with Internal or external certifications which empowers online learners.
                    </p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="300"
                        class="flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0">
                    <i class="h-12 w-12 la la-book text-2xl text-white
                        flex items-center justify-center p-2 bg-[#336699] rounded-full"></i>
                    <h2 class="text-xl font-medium">Self Paced</h2>
                    <p class="w-10/12 md:w-11/12 text-sm text-gray-700 leading-loose">
                        For corporate LMS, employees can pace themselves over time.
                    </p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="400"
                        class="flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0">
                    <i class="h-12 w-12 la la-book text-2xl text-white
                        flex items-center justify-center p-2 bg-[#336699] rounded-full"></i>
                    <h2 class="text-xl font-medium">Access Anywhere</h2>
                    <p class="w-10/12 md:w-11/12 text-sm text-gray-700 leading-loose">
                        24/7 global access with single sign-on authentication.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <!-- Section Three -->
    <section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-auto w-10/12 flex flex-col items-center justify-center space-y-8">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="w-full md:w-7/12 text-4xl md:text-5xl text-center font-medium leading-snug m-0">
                <?php dynamic_sidebar('testimonial-page-description'); ?>
            </h2>

            <!-- Slider main container -->
             <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="300"
                    class="swiper h-full w-full flex items-center justify-center no-padding" >

                <!-- Additional required wrapper -->
                <div class="swiper-wrapper h-full w-full mx-auto">
                    <!-- Slides -->
                      <?php echo apply_shortcodes('[TEST_B id=12049]'); ?>

                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

</main>
<?php
get_footer();
?>
