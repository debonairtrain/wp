<?php
/*
 * Template Name: Solutions Template
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
              <?php dynamic_sidebar('solution-page-description'); ?>

                <div class="w-full flex flex-col md:flex-row items-center justify-center md:justify-start
                    md:space-x-5 space-y-3 md:space-y-0">
                <?php echo apply_shortcodes( '[maxbutton id="1"]' ); ?>
                <?php echo apply_shortcodes( '[maxbutton id="3"]' ); ?>
              </div>
            </div>
            <!-- Right -->
            <div class="h-96 md:h-full w-full md:w-[40%] flex flex-row items-center justify-center md:justify-end">
                <div
                        data-aos="zoom-out"
                        data-aos-duration="1000"
                        data-aos-delay="500"
                        alt="Mockup" style="height: auto; position: absolute;"
                        class="md:right-[100px] w-[200px] md:w-[400px]" />
                  <?php dynamic_sidebar('solution-page-image'); ?>
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
                    What can we guarantee you for choosing us
                </h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-11/12 md:w-5/12 text-md text-gray-500 text-center">
                    World Class Quality Standards
                </p>
            </div>

            <section class="h-auto w-10/12 grid grid-colds-1 md:grid-cols-3 gap-5">
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="h-auto w-full flex flex-col items-center justify-center p-4 py-10 space-y-3 bg-[#41DB63]/10">
                    <div class="h-24 w-24 rounded-full bg-[#0B99F6] my-3 flex items-center justify-center">
                        <i class="la la-clock text-white text-4xl"></i>
                    </div>
                    <h3 class="w-full font-medium text-xl text-black text-center">Leverage Technology</h3>
                    <p class="w-full text-gray-600 text-md leading-7 text-center">
                        Cutting edge technology skillset
                        Quality Assurance / IBM certified
                    </p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="h-auto w-full flex flex-col items-center justify-center p-4 py-10 space-y-3 bg-[#E2EE5B]/10">
                    <div class="h-24 w-24 rounded-full bg-[#04BD83] my-3 flex items-center justify-center">
                        <i class="la la-shield text-white text-4xl"></i>
                    </div>
                    <h3 class="w-full font-medium text-xl text-black text-center">Boosted Performance</h3>
                    <p class="w-full text-gray-600 text-md leading-7 text-center">
                        Excellent testing, support and after sale service.
                    </p>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="250"
                        class="h-auto w-full flex flex-col items-center justify-center p-4 py-10 space-y-3 bg-[#ED7643]/10">
                    <div class="h-24 w-24 rounded-full bg-[#FEC829] my-3 flex items-center justify-center">
                        <i class="la la-laptop text-white text-4xl"></i>
                    </div>
                    <h3 class="w-full font-medium text-xl text-black text-center">R & D</h3>
                    <p class="w-full text-gray-600 text-md leading-7 text-center">
                        Research & Development Network
                    </p>
                </div>

            </section>
        </div>
    </section>

    <!-- Section Two -->
    <section class="h-auto w-full flex items-center justify-center py-20 my-20 md:my-36">
        <!-- inner -->
        <div class="h-full w-11/12 w-full md:w-10/12 flex flex-col items-start justify-start space-y-20">
            <!-- Header -->
            <div class="h-auto w-full flex flex-col md:flex-row items-center justify-between space-y-10 md:space-y-0">
                <!-- Left -->
                <div class="h-auto w-full md:w-2/2 flex flex-col items-start justify-start space-y-5">
                    <h2
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="50"
                            class="w-full md:w-8/12 font-medium text-3xl md:text-4xl text-left leading-10">Recent Projects</h2>
                    <p
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            data-aos-delay="100"
                            class="w-11/12 md:w-11/12 text-md md:text-lg text-gray-400 text-left flex items-center justify-start">
                          <?php dynamic_sidebar('solution-page-recent-project'); ?>
                        
                    </p>
                </div>
            </div>
            <section class="h-auto w-full grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="h-auto md:h-72 w-full flex flex-col md:flex-row items-center justify-center bg-white rounded-md shadow-2xl overflow-hidden">
                    <!-- Left -->
                    <div class="h-full w-fulll md:w-1/2 bg-gray-50 flex items-center justify-center">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/solutions/2.jpg'; ?>" alt=""class="img-fluid" />
                    </div>
                    <!-- Right -->
                    <div class="h-full w-fulll md:w-1/2 flex flex-col items-start justify-center p-8 d:px-5 space-y-3">
                        <h3 class="w-11/12 font-medium text-xl text-black">
                            Full Stack Software Development
                        </h3>
                        <p class="w-11/12 md:w-full text-gray-600 text-sm leading-7">
                            PHP, MySQL, Laravel, JavaScript, Node.js, React.js, jQuery, jQuery UI/Mobile,
                            CSS,  GoogleAPI’s Twitter Bootstrap JSON, AJAX, SAAS, CRM, SCM, BI, ERP,.
                            H5P, OOP,  ASP, Single Page Applications
                        </p>
                    </div>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="h-auto md:h-72 w-full flex flex-col md:flex-row items-center justify-center bg-white rounded-md shadow-2xl overflow-hidden">
                    <!-- Left -->
                    <div class="h-full w-full md:w-1/2 bg-gray-50 flex items-center justify-center">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/solutions/3.jpg'; ?>" alt=""class="img-fluid" />
                    </div>
                    <!-- Right -->
                    <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-center p-8 md:px-5 space-y-3">
                        <h3 class="w-11/12 font-medium text-xl text-black">
                            Independent Consultation
                        </h3>
                        <p class="w-11/12 md:w-full text-gray-600 text-sm leading-7">
                            Blended learning, Pedagogy, LMS, CMS, UX/UI
                            AGILE/SCRUM, ADDIE, RAD, SSADM  with SCORM 1.2/2004,
                            Tin Can API, Elearning, Training, Digital Divide.
                        </p>
                    </div>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="h-auto md:h-72 w-full flex flex-col md:flex-row items-center justify-center bg-white rounded-md shadow-2xl overflow-hidden">
                    <!-- Left -->
                    <div class="h-full w-full md:w-1/2 bg-gray-50 flex items-center justify-center">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/solutions/1.jpg'; ?>" alt=""class="img-fluid" />
                    </div>
                    <!-- Right -->
                    <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-center p-8 md:px-5 space-y-3">
                        <h3 class="w-11/12 font-medium text-xl text-black">
                            Learning Management System
                        </h3>
                        <p class="w-11/12 md:w-full text-gray-600 text-sm leading-7">
                            Moodle 4.x, Moodle 3.x, Cornerstone, Blackboard, Google
                            Classroom, Zoom, Microsoft Teams Adobe Captivate Prime etc.
                        </p>
                    </div>
                </div>
                <!-- Block -->
                <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="150"
                        class="h-auto md:h-72 w-full flex flex-col md:flex-row items-center justify-center bg-white rounded-md shadow-2xl overflow-hidden">
                    <!-- Left -->
                    <div class="h-full w-full md:w-1/2 bg-gray-50 flex items-center justify-center">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/solutions/4.jpg'; ?>" alt=""class="img-fluid" />
                    </div>
                    <!-- Right -->
                    <div class="h-full w-full md:w-1/2 flex flex-col items-start justify-center p-8 md:px-5 space-y-3">
                        <h3 class="w-11/12 font-medium text-xl text-black">
                            Training School Complex
                        </h3>
                        <p class="w-11/12 md:w-full text-gray-600 text-sm leading-7">
                            14 room Purpose built training School with equipped conference hall, Lecture Theater and
                            restaurant. Fully qualified and trained tutors. Onsite & Online.
                        </p>
                    </div>
                </div>
            </section>
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
