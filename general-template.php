<?php
/*
 * Template Name: About Us Template
 *
 */
?>
<?php
get_header();
?>
<!-- content -->
<main class="h-auto w-full overflow-hidden">
    <!-- Hero -->
    <section id="sectionOne" class="h-auto md:h-[32rem] w-full flex items-center justify-center mt-10">
        <!-- Inner -->
        <div class="h-full w-11/12 md:w-10/12 flex flex-col md:flex-row items-center justify-center">
            <!-- Left -->
            <div class="h-full w-full md:w-[60%] flex flex-col items-start justify-center">
              <?php dynamic_sidebar('about-page-description'); ?>

            </div>
            <!-- Right -->
            <div class="h-96 md:h-full w-full md:w-[40%] flex flex-row items-center justify-end">
                <div
                        data-aos="zoom-out"
                        data-aos-duration="1000"
                        data-aos-delay="500"
                        alt="Mockup" style="height: auto; width: 500px; position: relative;" class="md:right-[100px]" />
                  <?php dynamic_sidebar('about-page-image'); ?>
              </div>
            </div>
        </div>
    </section>

    <!-- Section One -->
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-full w-full md:w-10/12 flex flex-col items-center justify-center space-y-20">
            <div class="h-auto w-full flex flex-col items-center justify-center space-y-5">
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="50"
                        class="w-11/12 md:w-4/12 font-medium text-3xl text-center leading-10">
                    Mission</h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-11/12 md:w-6/12 text-md text-gray-500 text-center">
                        <?php dynamic_sidebar('about-page-mission'); ?>

                </p>
            </div>

            <section class="h-auto w-10/12 grid grid-colds-1 md:grid-cols-2 gap-5">
              <?php dynamic_sidebar('about-page-ranking'); ?>
                <!-- Block -->

            </section>
        </div>
    </section>

    <!-- Section Two -->
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">


        <!-- inner -->
        <div class="h-full w-full md:w-10/12 flex flex-col items-center justify-center space-5 md:space-y-20"
        style="margin-bottom:-120px;">
            <div class="h-auto w-full flex flex-col items-center justify-center space-y-5">
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="50"
                        class="w-full md:w-4/12 font-medium text-3xl text-center leading-10">Meet Our Team</h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-11/12 md:w-5/12 text-md text-gray-500 text-center">
                    Our top managment team presently comprise:
                </p>
            </div>


        </div>

    </section>
<?php echo apply_shortcodes( '[TBMS id=12050]' ); ?>

    <!-- Clientele -->
    <section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <?php echo apply_shortcodes( '[URIS id=12035]' ); ?>
    </section>

</main>
<?php
get_footer();
?>
