<?php
/*
 * Template Name: Consultation Template
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
              <?php dynamic_sidebar('consult-page-description'); ?>

                <?php echo apply_shortcodes( '[maxbutton id="1"]' ); ?>

            </div>
            <!-- Right -->
            <div class="h-[35rem] md:h-96 md:h-full w-full md:w-[40%] flex flex-row items-center mt-5">
                <div
                        data-aos="zoom-out"
                        data-aos-duration="1000"
                        data-aos-delay="500"
                        alt="Mockup" style="height: 600px; margin-left: -5px; position: relative;" class="">
                        <?php dynamic_sidebar('consult-page-image'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section One -->
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-full w-11/12 md:w-10/12 flex flex-col md:flex-row items-center justify-center space-y-20">
            <!-- Left -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="h-full w-full md:w-1/2 flex items-center justify-center md:p-0">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/consultation-section-one-mockup.png' ?>" class="w-[100%] md:w-[100%]" alt="" />
            </div>
            <!-- Right -->
            <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-start md:p-10 space-y-5">
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-9/12 text-4xl md:text-5xl font-medium leading-snug">Partner with us</h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="5"
                        class="w-11/12 text-lg md:text-xl text-gray-400 leading-loose">
                    We have business partnerships with a host of organisations globally including:
                    <ul class="text-gray-400">
                    <li>IBM</li>
                    <li>Alliance hospital Abuja.</li>
                    <li>Medvical International, Benin City</li>
                </ul>
                </p>
            </div>
        </div>
    </section>

    <!-- Section Two -->
    <section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
        <div class="h-full w-11/12 md:w-10/12 flexflex-col  items-start justify-start">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="w-full md:w-7/12 text-4xl md:text-5xl font-medium leading-snug m-0">
                20 years  Digital / Edtech Experience You Can Trust?</h2>
            <!-- inner -->
            <div class="h-auto w-full flex flex-col md:flex-row items-center justify-center">
                <!-- Left -->
                <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-start space-y-5">
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="150"
                            class="w-full text-md md:text-lg text-gray-400 leading-loose">
                        E-Learning is transforming Education across the world.
                        We help close the digital divide, so no one is left behind.
                    </p>
                    <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="200"
                            class="h-auto w-full flex items-center justify-center">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/image 10.png' ?>" class="w-[100%]" alt="" />
                    </div>
                </div>
                <!-- Right -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="250"
                        class="h-full w-full md:w-1/2 flex items-center justify-center md:p-10">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/image 7.png' ?>" class="w-[100%]" alt="" />
                </div>
            </div>
        </div>
    </section>

    <!-- Section Three -->
    <section class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
        <div class="h-full w-11/12 md:w-10/12 flexflex-col rounded-md items-start justify-start bg-[#336699] p-3 md:p-10 space-y-10">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="w-full md:w-5/12 text-4xl md:text-5xl font-normal text-white leading-snug m-0">
                Full Services Debonair Offers</h2>
            <!-- inner -->
            <div class="h-auto w-full grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="h-auto w-full bg-white rounded-md p-5 flex flex-col items-start justify-start space-y-4 py-16">
                    <div
                            class="h-20 w-20 bg-[#336699] p-4 rounded-full flex items-center justify-center">
                        <i class="la la-search text-4xl text-white"></i>
                    </div>
                    <h2 class="text-2xl font-medium w-full md:w-7/12">Full-Stack Software Development</h2>
                    <p class="w-full md:w-8/12 leading-loose text-gray-400">
                        PHP, MySQL, Laravel, JavaScript, Node.js, React.js, jQuery,
                        jQuery UI/Mobile,  CSS,  GoogleAPI’s Twitter Bootstrap JSON,
                        AJAX, SAAS, CRM, SCM, BI, ERP,. H5P, OOP,  ASP, Single Page Applications</p>
                        <a
                                data-aos="fade-up"
                                data-aos-duration="1000"
                                data-aos-delay="400"s
                                href="https://github.com/gregoryekhator/examtimer" target="_blank" rel="" class="h-12 w-full md:w-56 bg-transparent border border-[#336699]
                            text-lg text-[#336699] rounded-md px-8 transition duration-700 hover:bg-[#336699] hover:text-white
                            flex items-center justify-center font-medium transition duration-700 hover:shadow-none">
                            Github Repository
                        </a>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="h-auto w-full bg-white rounded-md p-5 flex flex-col items-start justify-start space-y-4 py-16">
                    <div class="h-20 w-20 bg-[#336699] p-4 rounded-full flex items-center justify-center">
                        <i class="la la-search text-4xl text-white"></i>
                    </div>
                    <h2 class="text-2xl font-medium w-full md:w-7/12">Independent Consultation</h2>
                    <p class="w-full md:w-8/12 leading-loose text-gray-400">
                        Blended learning, Pedagogy, LMS, CMS, UX/UI
                        AGILE/SCRUM, ADDIE, RAD, SSADM  with SCORM 1.2/2004,
                        Tin Can API, Elearning, Training, Digital Divide.</p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="h-auto w-full bg-white rounded-md p-5 flex flex-col items-start justify-start space-y-4 py-16">
                    <div class="h-20 w-20 bg-[#336699] p-4 rounded-full flex items-center justify-center">
                        <i class="la la-search text-4xl text-white"></i>
                    </div>
                    <h2 class="text-2xl font-medium w-full md:w-7/12">Learning Management System</h2>
                    <p class="w-full md:w-8/12 leading-loose text-gray-400">
                        Moodle 4.x, Moodle 3.x, Cornerstone, Blackboard,
                        Google Classroom, Zoom, Microsoft Teams Adobe Captivate Prime etc..</p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="250"
                        class="h-auto w-full bg-white rounded-md p-5 flex flex-col items-start justify-start space-y-4 py-16">
                    <div class="h-20 w-20 bg-[#336699] p-4 rounded-full flex items-center justify-center">
                        <i class="la la-search text-4xl text-white"></i>
                    </div>
                    <h2 class="text-2xl font-medium w-full md:w-7/12">Training School Complex</h2>
                    <p class="w-full md:w-8/12 leading-loose text-gray-400">
                        14 room Purpose built training School with equipped
                        conference hall, Lecture Theater and restaurant.
                        Fully qualified and trained tutors. Onsite & Online.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Four -->
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-full w-11/12 md:w-10/12 flex flex-col md:flex-row items-center justify-center space-y-20">
            <!-- Left -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="h-full w-full md:w-1/2 flex items-center justify-center">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/consultation-section-four-mockup.png' ?>" class="w-[100%]" alt="" />
            </div>
            <!-- Right -->
            <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-start md:p-10 space-y-5">
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full text-4xl md:text-5xl font-medium leading-snug">
                    How Our Technology Is Closing the Digital Divide</h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="w-full md:w-12/12 text-xl text-gray-400 leading-loose">
                    Once upon a time, a business guru elucidated to me:
                    Generally, there are 4 ways to create wealth: <br>
                     <ol class="text-gray-400">
                       <li> 1) Leverage of your Time (We all have a limited 86,400 seconds in a day, as long we are alive)</li>
                       <li>2) Leveraging of your Money (Investing and letting your money work for you, instead of you working) </li>
                     </ol>
                     <p class="text-gray-400">Read more about LEVERAGING DIGITAL TECHNOLOGY DB08[…]</p>
                </p>
                <a
                        href="<?php echo get_permalink( get_page_by_path( 'contact-us' ) ); ?>"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="flex items-center justify-start font-medium pb-1 border-b border-gray-800 space-x-4">
                    <span>Read more</span>
                    <i class="la la-arrow-right text-2xl text-gray-800"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Section Five -->
    <section class="h-auto w-full flex items-center justify-center my-20 md:my-32">
        <!-- inner -->
        <div class="h-full w-full md:w-10/12 bg-[#336699] p-10 md:p-20 rounded-md flex flex-col
            md:flex-row items-center justify-center space-y-20">
            <!-- Left -->
            <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-center p-0 space-y-5">
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-3xl md:text-4xl font-medium leading-snug text-white">
                    Due to EdTech, the talented earn a comfortable living
                    whether in Lagos, London or Los Angeles, as they produce the same value.</h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="w-full md:w-9/12 text-md md:text-lg text-gray-800 leading-loose text-white">
                    Discover how we can help your business grow
                </p>
                <a
                        href="<?php echo get_permalink( get_page_by_path( 'get-started' ) ); ?>"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="bg-black rounded-full text-white flex items-center justify-center
                    font-medium space-x-4 px-8 py-3">
                    <span>Get Started</span>
                    <i class="la la-arrow-right text-2xl text-white"></i>
                </a>
            </div>
            <!-- Right -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="250"
                    class="h-full w-full md:w-1/2 flex items-center justify-center">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/consultation-section-five-mockup.png' ?>" class="w-[100%]" alt="" />
            </div>
        </div>
    </section>

</main>
<?php
get_footer();
?>
