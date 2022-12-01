<?php
/*
 * Template Name: Online Training Template
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
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-10/12 text-3xl md:text-7xl font-bold leading-snug md:leading-1 text-black">
                    Debonair Virtual School
                </h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="w-full md:w-9/12 my-8 text-lg font-normal text-gray-500 leading-normal">
                    Debonair Virtual School provides top tier online courses to equip our learners for the modern challenges.
                        We cater for academic, industrial and budding entrepreneurs.                     </p>
                <div class="w-full flex flex-col md:flex-row items-center justify-center md:justify-start
                    md:space-x-5 space-y-3 md:space-y-0">
                    <?php echo apply_shortcodes( '[maxbutton id="1"]' ); ?>
                    <?php echo apply_shortcodes( '[maxbutton id="4"]' ); ?>
                </div>
                <div class="h-auto w-full flex flex-col items-start justify-start mt-10 space-y-3">
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="400"
                            class="w-full flex flex-col md:flex-row items-center justify-center md:justify-start space-y-3 md:space-y-0 md:space-x-3">
                        <div class="bg-white h-12 w-auto rounded-md flex items-center justify-start space-x-2">
                            <i class="la la-star text-white text-2xl bg-black h-12 w-12 rounded-md p-3
                                flex items-center justify-center"></i>
                            <span class="w-6/12 font-normal text-sm text-gray-700">
                                    Over 500 thousand students are already learning from all over the world
                                </span>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Right -->
            <div class="h-[35rem] md:h-96 md:h-full w-full md:w-[40%] flex flex-row items-center justify-end">
                <img
                        data-aos="zoom-out"
                        data-aos-duration="1000"
                        data-aos-delay="500"
                        src="<?php echo get_template_directory_uri().'/assets/img/training-school-mockup.png'; ?>" alt="Mockup" style="height: auto; position: absolute;" class="w-[300px] md:w-[500px] md:right-[100px]" />
            </div>
        </div>
    </section>

    <!-- Section One -->
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-full w-11/12 md:w-10/12 flex flex-col md:flex-row items-center justify-center space-y-20">
            <!-- Left -->
            <div class="h-full w-full md:w-[40%] flex flex-col items-start justify-start space-y-8">
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-9/12 text-4xl md:text-5xl font-medium leading-relaxed">
                    ENROL NOW FOR CLASSES</h2>
<!--                <p-->
<!--                        data-aos="fade-up"-->
<!--                        data-aos-duration="1000"-->
<!--                        data-aos-delay="150"-->
<!--                        class="w-10/12 text-lg md:text-xl text-gray-800 leading-loose">-->
<!--                    Lorem ipsum dolor sit amet,  adipiscing elit, sed do eiusmod tempor.-->
<!--                </p>-->
            </div>
            <!-- Right -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="h-full w-full md:w-[60%] grid-cols-1 md:grid grid-cols-2 gap-0 bg-[#EFFAFD] p-5 md:p-10 rounded-lg">
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0 md:border-r md:border-gray-200 md:pr-8 py-10">
                    <i class="h-12 w-12 la la-book text-2xl text-white
                        flex items-center justify-center p-2 bg-[#336699] rounded-full"></i>
                    <h2 class="text-xl font-medium">20k+ course</h2>
                    <p class="w-full md:w-11/12 text-sm text-gray-700 leading-loose">
                        Customer Services Etiquette
                    </p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0 md:pl-8 py-10">
                    <i class="h-12 w-12 la la-book text-2xl text-white
                        flex items-center justify-center p-2 bg-[#336699] rounded-full"></i>
                    <h2 class="text-xl font-medium">20k+ course</h2>
                    <p class="w-full md:w-11/12 text-sm text-gray-700 leading-loose">
                        Proposal Writing
                    </p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="300"
                        class="flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0 md:border-r md:border-gray-200 md:pr-8 py-10">
                    <i class="h-12 w-12 la la-book text-2xl text-white
                        flex items-center justify-center p-2 bg-[#336699] rounded-full"></i>
                    <h2 class="text-xl font-medium">20k+ course</h2>
                    <p class="w-full md:w-11/12 text-sm text-gray-700 leading-loose">
                        Basic Computer Training
                    </p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="400"
                        class="flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0 md:pl-8 py-10">
                    <i class="h-12 w-12 la la-book text-2xl text-white
                        flex items-center justify-center p-2 bg-[#336699] rounded-full"></i>
                    <h2 class="text-xl font-medium">20k+ course</h2>
                    <p class="w-full md:w-11/12 text-sm text-gray-700 leading-loose">
                        WordPress / PHP Programming Project
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Two -->
    <section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-auto w-10/12 flex flex-col items-center justify-center space-y-16">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="w-full md:w-4/12 text-4xl md:text-5xl text-center font-medium leading-snug m-0">
                Find the best courses for you</h2>

            <div
                    data-aos="fade-udiv"
                    data-aos-duration="1000"
                    data-aos-delay="200"
                    class="w-full flex grid grid-cols-2 gap-5 md:flex md:flex-row md:items-center md:justify-center md:space-x-5">
                <span class="text-[#336699] text-md font-normal">UX/UI Design</span>
                <span class="text-[#336699] text-md font-normal">Development</span>
                <span class="text-[#336699] text-md font-normal">Marketing</span>
                <span class="text-[#336699] text-md font-normal">Business</span>
                <span class="text-[#336699] text-md font-normal">Technology</span>
                <span class="text-[#336699] text-md font-normal">All Category</span>
            </div>

            <!-- Slider main container -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="200"
                    class="swiper md:h-auto w-full flex items-center justify-center no-padding" style="height:auto!important;">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper h-auto w-full mx-auto">
                    <!-- Slides -->
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="200"
                            class="swiper-slide h-auto max-w-[100%] md:max-w-[30%]">
                        <div class="w-full md:w-full bg-white shadow-lg rounded-md py-5 px-3
                            flex flex-col items-start justify-start space-y-5" style="height:auto!important;">
                            <div class="h-36 w-full bg-gray-200 rounded-md flex items-center justify-center">
                                <img src="<?php echo get_template_directory_uri().'/assets/img/11.png'; ?>" style="height: 100%; width: 100%" alt="" />
                            </div>
                            <small class="text-sm text-[#336699]" style=>UI/UX Design</small>
                            <div class="flex items-center justify-betwen">
                                <div class="h-full w-1/2 flex items-center justify-start">
                                    <h3 class="w-full text-sm text-gray-800 font-bold">Know more about design thinking</h3>
                                </div>
                                <div class="h-full w-1/2 flex items-center justify-end">
                                  <?php echo apply_shortcodes( '[maxbutton id="6"]' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="250"
                            class="swiper-slide h-full max-w-[100%] md:max-w-[30%]">
                        <div class="h-72 w-full md:w-full bg-white shadow-lg rounded-md py-5 px-3
                            flex flex-col items-start justify-start space-y-5">
                            <div class="h-36 w-full bg-gray-200 rounded-md flex items-center justify-center">
                                <img src="<?php echo get_template_directory_uri().'/assets/img/12.png'; ?>" style="height: 100%; width: 100%" alt="" />
                            </div>
                            <small class="text-sm text-[#336699]">Technology</small>
                            <div class="flex items-center justify-betwen">
                                <div class="h-full w-1/2 flex items-center justify-start">
                                    <h3 class="w-full text-sm text-gray-800 font-bold">Know more about design thinking</h3>
                                </div>
                                <div class="h-full w-1/2 flex items-center justify-end">
                                  <?php echo apply_shortcodes( '[maxbutton id="6"]' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="300"
                            class="swiper-slide h-full max-w-[100%] md:max-w-[30%]">
                        <div class="h-72 w-full md:w-full bg-white shadow-lg rounded-md py-5 px-3
                            flex flex-col items-start justify-start space-y-5">
                            <div class="h-36 w-full bg-gray-200 rounded-md flex items-center justify-center">
                                <img src="<?php echo get_template_directory_uri().'/assets/img/13.png'; ?>" style="height: 100%; width: 100%" alt="" />
                            </div>
                            <small class="text-sm text-[#336699]">Leadership</small>
                            <div class="flex items-center justify-betwen">
                                <div class="h-full w-1/2 flex items-center justify-start">
                                    <h3 class="w-full text-sm text-gray-800 font-bold">Know more about design thinking</h3>
                                </div>
                                <div class="h-full w-1/2 flex items-center justify-end">
                                  <?php echo apply_shortcodes( '[maxbutton id="6"]' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="350"
                            class="swiper-slide h-full max-w-[100%] md:max-w-[30%]">
                        <div class="h-72 w-full md:w-full bg-white shadow-lg rounded-md py-5 px-3
                            flex flex-col items-start justify-start space-y-5">
                            <div class="h-36 w-full bg-gray-200 rounded-md flex items-center justify-center">
                                <img src="<?php echo get_template_directory_uri().'/assets/img/14.png'; ?>" style="height: 100%; width: 100%" alt="" />
                            </div>
                            <small class="text-sm text-[#336699]">Markerting</small>
                            <div class="flex items-center justify-betwen">
                                <div class="h-full w-1/2 flex items-center justify-start">
                                    <h3 class="w-full text-sm text-gray-800 font-bold">Know more about design thinking</h3>
                                </div>
                                <div class="h-full w-1/2 flex items-center justify-end">
                                  <?php echo apply_shortcodes( '[maxbutton id="6"]' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <!-- <div class="swiper-pagination"></div> -->

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <!-- <div class="swiper-scrollbar"></div> -->
            </div>
        </div>
    </section>

    <!-- Section Three -->
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">
        <!-- Wrapper -->
        <div class="h-full w-11/12 md:w-10/12 flex flex-col items-start justify-start space-y-20">
            <!-- Header -->
            <header class="flex flex-col md:flex-row items-center justify-center space-y-5 md:space-y-0">
                <div class="h-full w-full md:w-1/2 flex items-center justify-start">
                    <h2
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="100"
                            class="text-4xl md:text-5xl w-full md:w-9/12 text-black leading-normal">High quality video, audio, & live class</h2>
                </div>
                <div class="h-full w-full md:w-1/2 flex items-center justify-start">
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="200"
                            class="h-full w-full md:w-10/12 text-md md:text-xl leading-loose text-gray-400">
                        Our MS Teams sessions are vibrant. However depending on the tutor,
                        it could be Zoom, blackboard collaborate or YouTube Live sessions.
                    </p>
                </div>
            </header>
            <!-- inner -->
            <div class="h-full w-full flex flex-col md:flex-row items-center justify-center space-y-20">
                <!-- Left -->
                <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-start space-y-8">
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="100"
                            class="h-auto md:h-72 w-10/12 bg-white rounded-md my-5 flex items-center justify-center">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/training-school-section-three-mockup.png'; ?>" alt="" />
                    </div>
                    <h2
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="150"
                            class="w-full md:w-9/12 text-4xl md:text-3xl font-medium leading-snug">Immersive and Engaging</h2>
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="200"
                            class="w-full md:w-8/12 text-md md:text-xl text-gray-500 leading-loose">
                        Our trained and certified Tutors are dedicated and pay attention to details
                    </p>
                </div>
                <!-- Right -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="h-full w-full md:w-1/2 grid-cols-1 md:grid grid-cols-2 gap-10 bg-white rounded-lg">
                    <!-- Block -->
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="100"
                            class="bg-white shadow-2xl p-5 rounded-md flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0">
                        <i class="h-16 w-16 la la-book text-2xl text-white
                            flex items-center justify-center p-2 bg-[#336699] rounded-md"></i>
                        <h2 class="text-xl font-medium">Record class</h2>
                        <p class="w-10/12 md:w-11/12 text-sm text-gray-700 leading-loose">
                            We prepare you with state of the art induction for deep immersive and engaging learning.
                        </p>
                    </div>
                    <!-- Block -->
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="200"
                            class="bg-white shadow-2xl p-5 rounded-md flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0">
                        <i class="h-16 w-16 la la-book text-2xl text-white
                            flex items-center justify-center p-2 bg-[#336699] rounded-md"></i>
                        <h2 class="text-xl font-medium">High-quality video</h2>
                        <p class="w-10/12 md:w-11/12 text-sm text-gray-700 leading-loose">
                            The most optimal image resolution for responsive devices
                        </p>
                    </div>
                    <!-- Block -->
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="300"
                            class="bg-white shadow-2xl p-5 rounded-md flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0">
                        <i class="h-16 w-16 la la-book text-2xl text-white
                            flex items-center justify-center p-2 bg-[#336699] rounded-md"></i>
                        <h2 class="text-xl font-medium">Live Classes</h2>
                        <p class="w-10/12 md:w-11/12 text-sm text-gray-700 leading-loose">
                            In real-time situated pedagogical learning
                        </p>
                    </div>
                    <!-- Block -->
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="400"
                            class="bg-white shadow-2xl p-5 rounded-md flex flex-col items-start justify-start space-y-4 mb-10 md:mb-0">
                        <i class="h-16 w-16 la la-book text-2xl text-white
                            flex items-center justify-center p-2 bg-[#336699] rounded-md"></i>
                        <h2 class="text-xl font-medium">All Devices</h2>
                        <p class="w-10/12 md:w-11/12 text-sm text-gray-700 leading-loose">
                            Responsiveness is key
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Four -->
    <section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">

        <!-- inner -->
        <div class="h-auto w-10/12 flex flex-col items-center justify-center space-y-8">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="w-full md:w-7/12 text-3xl md:text-4xl md:text-5xl text-center font-medium leading-snug m-0">
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

    <!-- Section Five -->



</main>
<?php
get_footer();
?>
