<?php
/*
 * Template Name: Examtimer Documentation Template
 *
 */
?>
<?php
get_header();
?>
 <main  class="h-auto w-full overflow-hidden">
    <section id="sectionOne" class="h-auto md:h-auto w-full flex items-center justify-center mt-10">
        <!-- Inner -->
        <div class="h-full w-11/12 md:w-11/12 flex flex-col md:flex-row items-center justify-center">
            <!-- Left -->
            <div class="h-full w-full md:w-[100%]">
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-2xl font-bold leading-snug md:leading-1 text-black">
                    Exam Countdown Timer - User Instructions
                </h2>
                
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="w-full md:w-12/12 my-8 text-lg font-normal text-gray-500 leading-loose">
                    The Exam countdown timer is a Moodle plugin designed in response to multiple 
                        students simultaneously and incessantly refreshing their browsers; in anticipation 
                        of the start button appearing for long form examinations.
                </p>
                <ul>
                <li><strong><em>Plugin Version : &nbsp; 0.0.1</em></strong></li>
                <li><strong><em>Released on : &nbsp; 24 August 2022</em></strong> </li>
                <li><strong><em>Authors : &nbsp; Debonair Training Development Team</em></strong> </li>
                <li><strong><em>Copyleft &copy; 2022 onwards <a href="https://debonairtraining.com">www.debonairtraining.com</a></em></strong> </li>
                </ul>
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-2xl font-bold leading-snug md:leading-1 text-black">
                    Supported Moodle versions
                </h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="w-full md:w-12/12 my-8 text-lg font-normal text-gray-500 leading-loose">
                    Compatible with Moodle 3.10 to 4.0
                </p>
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-2xl font-bold leading-snug md:leading-1 text-black">
                    Supported browsers
                </h2>
                <p
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200"
                        class="w-full md:w-12/12 my-8 text-lg font-normal text-gray-500 leading-loose">
                        IE9+ <br /><br />
                            Recent versions of all modern browsers
                </p>
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-1xl font-bold leading-snug md:leading-1 text-black">
                    Exam Countdown Timer - Installation steps
                </h2>
                <ol 
                    data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-1xl font-normal leading-snug md:leading-1 text-gray-500">
                    <li>1) On your download package, you will find examtimer.zip</li>
                    <li>2) Unzip - examtimer.zip, you will get folder 'examtimer'</li>
                    <li>3) Copy folder 'examtimer' and put into the mod folder of your moodle system</li>
                    <li>4) Next login as Site administrator</li>
                    <li>5) Go to 'Site administration' -> 'Notifications' ,
                        here on 'Plugins check' page you will see the examtimer plugin in listing.</li>
                    <li>6) Click the "Upgrade Moodle database now" button displayed on bottom of the page</li>
                    <li>7) You will get success message once the plugin is installed successfully.</li>
                    <li>8) Click "Continue" button on success page </li>
                </ol>
                <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-1xl font-bold leading-snug md:leading-1 text-black">
                    Steps to set Examtimer activity for any Moodle Course
                </h2>
                <ol 
                    data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-1xl font-normal leading-snug md:leading-1 text-gray-500">
                    <li>1) Login as site administrator</li>
                    <li>2) Create any new Moodle Course or turn Edit on, to edit an existing Course.</li>
                    <li>3) Click on "Add an activity or resource"</li>
                    <li>4) Select "Examtimer" activity from the popup of available activities and resources.</li>
                    <li>5) Enter the "name" and "description" of your timed activity fields respectively</li>
                    <li>6) For the "Exam and Start Date and Time" select the exact date/time the countdown time ends (to the second). Then tick the box to "Enable"</li>
                    <li>7) Upload the files, folders or zipped folders to be revealed upon end of countdown, and select applicable options</li>
                    <li>8) Cheers, you have done it !!!</li>
                    <li><em><strong>Note: </strong><em> If you need any support related to this plugin , kindly send an email to <a href="mailto:info@debonairtraining.com">info@debonairtraining.com</a></li>
                </ol>
                  <h2
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-1xl font-bold leading-snug md:leading-1 text-black">
                    Developer Documentation
                </h2>
                <ol 
                    data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100"
                        class="w-full md:w-12/12 text-2xl md:text-1xl font-normal leading-snug md:leading-1 text-gray-500">
                    <li>1) The Exam countdown timer plugin was developed from the Core Mod/folder activity plugin, Moodle version 3.10</li>
                    <li>2) This plugin has been tested and works successfully with Moodle versions 3.10, 3.11 and 4.0</li>
                    <li>3) There is currently further development to expand the exam countdown timer to include functionality for other Moodle course activities, subject to popular requirements.</li>
                    <li>4) Please log any issues or bugs in our github bug tracker: <a href="https://github.com/gregoryekhator/examtimer/issues" target="_blank">https://github.com/gregoryekhator/examtimer/issues</a></li>
                    
                </ol>
            </div>
        </div>
    </section>
 </main>'
 '
<?php
get_footer();
?>
