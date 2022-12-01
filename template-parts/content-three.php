<section id="sectionThree" class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32 position relative">
    <!-- Inner -->
    <div class="h-full w-full md:w-11/12 rounded-md py-10 flex flex-col items-center justify-center
    bg-transparent overflow-hidden">
        <h3
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="50"
                class="font-medium text-md text-center text-[#336699] mb-5">
                <?php dynamic_sidebar('why-choose-us'); ?></h3>
        <h2
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="100"
                class="w-11/12 md:w-7/12 text-2xl md:text-5xl font-bold leading-tight text-center">
                <?php dynamic_sidebar('why-choose-us-description'); ?></h2>
        <div class="h-auto md:h-66 w-11/12 grid grid-cols-1 md:grid-cols-4 gap-10 mt-20">
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="150"
                    class="bg-white rounded-lg flex flex-col items-start justify-center p-3">
                <div class="h-12 w-12 bg-[#1A4586] rounded-sm shadow-lg flex items-center justify-center">
                    <i class="text-3xl text-white la la-users"></i>
                </div>

                <?php dynamic_sidebar('benefit-one'); ?>
            </div>
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="200"
                    class="bg-white rounded-lg flex flex-col items-start justify-center p-3">
                <div class="h-12 w-12 bg-[#0166FF] rounded-sm shadow-lg flex items-center justify-center">
                    <i class="text-3xl text-white la la-chalkboard-teacher"></i>
                </div>
                <?php dynamic_sidebar('benefit-ttwo'); ?>

            </div>
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="250"
                    class="bg-white rounded-lg flex flex-col items-start justify-center p-3">
                <div class="h-12 w-12 bg-[#E5CA94] rounded-sm shadow-lg flex items-center justify-center">
                    <i class="text-3xl text-white la la-code"></i>
                </div>
                <?php dynamic_sidebar('benefit-three'); ?>

            </div>
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="300"
                    class="bg-white rounded-lg flex flex-col items-start justify-center p-3">
                <div class="h-12 w-12 bg-[#53A8C6] rounded-sm shadow-lg flex items-center justify-center">
                    <i class="text-3xl text-white la la-school"></i>
                </div>
                <?php dynamic_sidebar('benefit-four'); ?>
            </div>
        </div>
    </div>

    <!-- Decorator -->
    <div class="h-16 w-32 md:w-72 bg-[#E4E4E4] rounded-full position absolute -top-2 -right-2
    transform -rotate-45 translate-x-[40%] md:translate-x-[30%] -translate-y-2 md:translate-y-10"></div>
    <div class="h-16 w-72 bg-[#E4E4E4] rounded-full position absolute -top-2 md:top-20 -right-2
    transform -rotate-45 translate-x-[80%] md:translate-x-[60%]"></div>
</section>
