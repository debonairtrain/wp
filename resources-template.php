<?php
/*
 * Template Name: Resources Template
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
              <?php dynamic_sidebar('resources-page-description'); ?>
                
                <div class="w-full flex flex-col md:flex-row items-center justify-center md:justify-start
                    md:space-x-5 space-y-3 md:space-y-0">
                    <?php echo apply_shortcodes( '[maxbutton id="1"]' ); ?>
                  <?php echo apply_shortcodes( '[maxbutton id="3"]' ); ?>
                </div>
            </div>
            <!-- Right -->
            <div class="h-[35rem] md:h-96 md:h-full w-full md:w-[40%] flex flex-row items-center justify-end">
                <div
                        data-aos="zoom-out"
                        data-aos-duration="1000"
                        data-aos-delay="500"
                        alt="Mockup" style="height: auto; position: absolute;" class="w-[300px] md:w-[500px] md:right-[100px]" >
                        <?php dynamic_sidebar('resources-page-image'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section One -->
    <section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-auto w-11/12 md:w-10/12 flex flex-col items-center justify-center space-y-10">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="h-auto w-full md:w-7/12 text-4xl md:text-5xl text-center font-medium leading-snug m-0">Frequently Asked Questions</h2>

            <p
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="200"
                    class="h-auto w-full md:w-6/12 text-md md:text-lg leading-loose text-gray-400 text-center">
                Some of our most frequently asked questions
            </p>

            <!-- FAQs -->
            <div class="h-auto w-full md:w-5/12 mx-auto flex flex-col items-start justify-start space-y-1">
                <!-- Block -->
                <div class="h-auto w-full rounded-sm accordion overflow-hidden">
                    <!-- Label -->
                    <div class="h-12 w-full flex items-center justify-between px-2 md:px-5 bg-gray-50 cursor-pointer accordion-label">
                        <span class="font-medium text-md">Do we get a free consultation?</span>
                        <i class="la la-plus-circle text-black text-3xl"></i>
                    </div>
                    <!-- Content -->
                    <div class="h-0 w-full bg-gray-100 accordion-content">
                        Yes. The initial comprehensive consultation is free for the first one hour.
                    </div>
                </div>
                <!-- Block -->
                <div class="h-auto w-full rounded-sm accordion overflow-hidden">
                    <!-- Label -->
                    <div class="h-12 w-full flex items-center justify-between px-2 md:px-5 bg-gray-50 cursor-pointer accordion-label">
                        <span class="font-medium text-md">What qualifications are required?</span>
                        <i class="la la-plus-circle text-black text-3xl"></i>
                    </div>
                    <!-- Content -->
                    <div class="h-0 w-full bg-gray-100 accordion-content">
                        None
                    </div>
                </div>
                <!-- Block -->
                <div class="h-auto w-full rounded-sm accordion overflow-hidden">
                    <!-- Label -->
                    <div class="h-12 w-full flex items-center justify-between px-2 md:px-5 bg-gray-50 cursor-pointer accordion-label">
                        <span class="font-medium text-md">What LMS do you develop?</span>
                        <i class="la la-plus-circle text-black text-3xl"></i>
                    </div>
                    <!-- Content -->
                    <div class="h-0 w-full bg-gray-100 accordion-content">
                        We develop Moodle LMS
                    </div>
                </div>
                <!-- Block -->
                <div class="h-auto w-full rounded-sm accordion overflow-hidden">
                    <!-- Label -->
                    <div class="h-12 w-full flex items-center justify-between px-2 md:px-5 bg-gray-50 cursor-pointer accordion-label">
                        <span class="font-medium text-md">What IT support do you offer?</span>
                        <i class="la la-plus-circle text-black text-3xl"></i>
                    </div>
                    <!-- Content -->
                    <div class="h-0 w-full bg-gray-100 accordion-content">
                        We offer numerous IT Services, such as:
                        <ul>
                            <li>Moodle LMS</li>
                            <li>WordPress</li>
                            <li>Laravel Softwares, etc</li>
                        </ul>
                    </div>
                </div>
                <!-- Block -->
                <div class="h-auto w-full rounded-sm accordion overflow-hidden">
                    <!-- Label -->
                    <div class="h-12 w-full flex items-center justify-between px-2 md:px-5 bg-gray-50 cursor-pointer accordion-label">
                        <span class="font-medium text-md">Do you host the software for us?</span>
                        <i class="la la-plus-circle text-black text-3xl"></i>
                    </div>
                    <!-- Content -->
                    <div class="h-0 w-full bg-gray-100 accordion-content">
                        Yes, We host softwares.
                    </div>
                </div>
                <!-- Block -->
                <div class="h-auto w-full rounded-sm accordion overflow-hidden">
                    <!-- Label -->
                    <div class="h-12 w-full flex items-center justify-between px-2 md:px-5 bg-gray-50 cursor-pointer accordion-label">
                        <span class="font-medium text-md">Can we request a demo?</span>
                        <i class="la la-plus-circle text-black text-3xl"></i>
                    </div>
                    <!-- Content -->
                    <div class="h-0 w-full bg-gray-100 accordion-content">
                        Yes, you can request a demo
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Two -->
    <section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-auto w-10/12 flex flex-col items-center justify-center space-y-10">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="w-full md:w-7/12 text-4xl md:text-5xl text-center font-medium leading-snug m-0">
                Video Resources</h2>

            <p
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="200"
                    class="w-full md:w-6/12 text-md md:text-lg leading-loose text-gray-400 text-center">
                The following are a list of video resources from our YouTube Channel
            </p>

            <div class="h-auto w-full grid grid-cols-1 md:grid-cols-3 gap-10">
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="h-60 w-full rounded-md bg-gray-200">
                    <iframe style="width: 100%; height: 100%; border-radius: 10px;"  src="https://www.youtube.com/embed/TtIgfrJuRmc" frameborder="0" allowfullscreen></iframe>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="h-60 w-full rounded-md bg-gray-200">
                    <iframe style="width: 100%; height: 100%; border-radius: 10px;"  src="https://www.youtube.com/embed/egMNY9hv5rY" frameborder="0" allowfullscreen></iframe>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="300"
                        class="h-60 w-full rounded-md bg-gray-200">
                    <iframe style="width: 100%; height: 100%; border-radius: 10px;"  src="https://www.youtube.com/embed/b6oon1cLBO4" frameborder="0" allowfullscreen></iframe>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="400"
                        class="h-60 w-full rounded-md bg-gray-200">
                    <iframe style="width: 100%; height: 100%; border-radius: 10px;"  src="https://www.youtube.com/embed/xWBUOIoHM9c" frameborder="0" allowfullscreen></iframe>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="500"
                        class="h-60 w-full rounded-md bg-gray-200">
                    <iframe style="width: 100%; height: 100%; border-radius: 10px;"  src="https://www.youtube.com/embed/SVriqA4bys0" frameborder="0" allowfullscreen></iframe>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="600"
                        class="h-60 w-full rounded-md bg-gray-200">
                    <iframe style="width: 100%; height: 100%; border-radius: 10px;"  src="https://www.youtube.com/embed/ZpHJOAg4HMU" frameborder="0" allowfullscreen></iframe>
                </div>
                <!----<div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="700"
                        class="h-60 w-full rounded-md bg-gray-200">
                    <iframe style="width: 100%; height: 100%; border-radius: 10px;"  src="https://www.youtube.com/embed/KCsBmvMNo8Y" frameborder="0" allowfullscreen></iframe>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="800"
                        class="h-60 w-full rounded-md bg-gray-200">
                    <iframe style="width: 100%; height: 100%; border-radius: 10px;"  src="https://www.youtube.com/embed/i0YFsM3-D40" frameborder="0" allowfullscreen></iframe>
                </div>---->
            </div>
        </div>
    </section>

    <!-- Section Three -->
    <section class="h-auto w-full my-10 flex flex-col items-center justify-center space-y-7 my-20 md:my-32">
        <!-- Inner -->
        <div class="h-auto md:h-[30rem] w-11/12 md:w-10/12 py-10 md:py-0 flex flex-col items-center justify-center bg-[#336699]
            shadow-2xl shadow-[#336699]/50 rounded-md">
            <?php dynamic_sidebar('solution-page-contact-us'); ?>

          <?php echo apply_shortcodes( '[maxbutton id="8"]' ); ?>
        </div>
    </section>

</main>
<?php
get_footer();
?>
