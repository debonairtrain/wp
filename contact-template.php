<?php
/*
 * Template Name: Contact Template
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
              <?php dynamic_sidebar('contact-us-page-description'); ?>

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
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-full w-full md:w-10/12 flex flex-col md:flex-row items-center justify-center md:shadow-2xl">
            <!-- Left -->
            <div class="h-auto md:h-[50rem] py-10 md:py-0 w-full md:w-1/2 bg-[#336699] p-5 md:p-10
                flex flex-col items-center justify-center space-y-10">
                <div class="h-auto w-full flex flex-col items-start justify-start">
                    <h2
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="50"
                            class="text-white font-medium text-2xl">Get in touch</h2>
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="100"
                            class="w-full md:w-7/12 text-md font-light text-white leading-relaxed my-2">
                        We would love to hear from you. Our  friendly team is always here to chat.
                    </p>
                </div>

                <!-- Contact Info -->
                <section class="h-auto w-full flex flex-col items-start justify-start">
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="50"
                            class="my-5 flex items-start justify-start space-x-5">
                        <i class="la la-envelope text-3xl text-white"></i>
                        <div class="flex flex-col items-start justify-start">
                            <h2 class="font-norma text-white text-2xl mb-1">Chat to us</h2>
                            <p class="w-full text-sm font-light text-white leading-relaxed">
                                Our friendly team is here to help
                            </p>
                            <a href="mailto:info@debonairtraining.com"
                               class="text-white font-medium text-sm mt-4">info@debonairtraining.com</a>
                        </div>
                    </div>

                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="100"
                            class="my-5 flex items-start justify-start space-x-5">
                        <i class="la la-map-marker text-3xl text-white"></i>
                        <div class="flex flex-col items-start justify-start">
                            <h2 class="font-norma text-white text-2xl mb-1">Office</h2>
                            <p class="w-full text-sm font-medium text-white leading-relaxed">
                                <strong><em>Office:</em></strong> London, UK & Lagos, Nigeria
                            </p>
                            <div
                                    class="w-8/12 text-white font-medium text-sm mt-4">
                                <strong><em>Nigerian Address:</em></strong> 126A Sylvia Crescent, OFF IKORODU ROAD, Anthony Village, Lagos, Nigeria</div>
                        </div>
                    </div>
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="150"
                            class="my-5 flex items-start justify-start space-x-5">
                        <i class="la la-phone text-3xl text-white"></i>
                        <div class="flex flex-col items-start justify-start">
                            <h2 class="font-norma text-white text-2xl mb-1">Phone</h2>
                            <p class="w-full text-sm font-light text-white leading-relaxed">
                                Mon-Fri from 8am -  5pm
                            </p>
                            <a href="tel:+12003478494092"
                               class="text-white font-medium text-sm mt-4"> +234 80 9982 6732</a>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Right -->
            <div class="h-auto md:h-[50rem] py-10 w-full md:w-1/2 bg-[#f9f9f9] p-5 md:p-10 flex items-center justify-center">
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
                    <?php echo apply_shortcodes( '[contact-form-7 id="12034" title="Debonair Training"]' ); ?>
                    <!-- Fields -->

                </label>
            </div>
        </div>
    </section>
    <div class="col-lg-12 col-md-12 col-sm-12 rounded-md">
		<center><iframe id="map" width="85%" height="400px" src="https://maps.google.com/maps?q=126%20Sylvia%20Crescent,%20Anthony,%20Lagos%20State.%20Nigeria&t=k&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></center

		</div>
    <br>
</main>
<?php
get_footer();
?>
