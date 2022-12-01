<section id="sectionOne" class="h-auto md:h-[32rem] w-full flex items-center justify-center mt-10">
    <!-- Inner -->
    <div class="h-full w-11/12 md:w-10/12 flex flex-col md:flex-row items-center justify-center">
        <!-- Left -->
        <div class="h-full w-full md:w-[60%] flex flex-col items-start justify-center">
            <h2
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="w-full md:w-11/12 text-3xl md:text-7xl font-bold leading-tight md:leading-tight text-black" id="abbasd">

                <?php dynamic_sidebar('abbas-page'); ?>
            </h2>
            <p
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="200"
                    class="w-full md:w-9/12 my-8 text-lg font-normal text-gray-500 leading-normal">
                    <?php dynamic_sidebar('header-button'); ?>

            </p>
            <div class="w-full flex flex-col md:flex-row items-center justify-center md:justify-start
            md:space-x-5 space-y-3 md:space-y-0">
                <?php echo apply_shortcodes( '[maxbutton id="1"]' ); ?>
                <?php echo apply_shortcodes( '[maxbutton id="2"]' ); ?>


            </div>
        </div>
        <!-- Right -->
        <div id="training" class="h-auto md:h-full w-full md:w-[40%] flex flex-row items-center justify-end">
        
            <?php dynamic_sidebar('header-image'); ?>
        </div>
    </div>
</section>
