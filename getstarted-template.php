<?php
/*
 * Template Name: Get Started Template
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
              <?php dynamic_sidebar('get-started-page-image'); ?>

            </div>
            <!-- Right -->
            <div class="h-96 md:h-full w-full md:w-[40%] flex flex-row items-center justify-end">
                <div
                        data-aos="zoom-out"
                        data-aos-duration="1000"
                        data-aos-delay="500"
                        alt="Mockup" style="height: auto; width: 500px; position: relative;" class="md:right-[100px]" >
                        <?php dynamic_sidebar('contact-us-page-image'); ?>
              </div>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="h-auto w-full flex items-center justify-center my-10 md:my-22">
        <!-- inner -->
        <div class="h-full w-full md:w-10/12 flex flex-col md:flex-row items-center justify-center md:shadow-2xl">
            <!-- Right -->
            <div class="h-auto md:h-auto py-10 w-full md:w-2/2 bg-[#f9f9f9] p-5 md:p-10 flex items-center justify-center">
                <label class="h-full w-full flex flex-col items-start justify-start space-y-10">
                    <div class="h-auto w-full flex flex-col items-start justify-start">
                        <h2
                                data-aos="fade-up"
                                data-aos-duration="1000"
                                data-aos-delay="50"
                                class="text-black font-normal text-2xl">Level up your business</h2>
                        <p
                                data-aos="fade-up"
                                data-aos-duration="1000"
                                data-aos-delay="100"
                                class="w-full text-sm font-normal text-black leading-relaxed my-2">
                            You can reach us anytime via
                            <a href="mailto:info@debonairtraining.com" class="text-[#336699]">info@debonairtraining.com</a>
                        </p>
                    </div>
                    <?php echo apply_shortcodes( '[wpforms id="11960"]' ); ?>
                    <!-- Fields -->

                </label>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>
