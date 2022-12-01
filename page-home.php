<?php
get_header();
?>

    <!-- content -->
    <main class="h-auto w-full overflow-hidden">
        <!-- Hero -->
        <section id="sectionOne" class="h-auto md:h-auto w-full flex items-center justify-center mt-10">
            <!-- Inner -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="h-full w-11/12 md:w-10/12 flex flex-col md:flex-row items-center justify-center rounded-md overflow-hidden">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/banners/blog-banner.png' ?>" />
            </div>
        </section>

        <!-- Blog Gallery -->
        <section id="sectionOne" class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
            <!-- Inner -->
            <div class="h-auto w-10/12 grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Articles -->
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content', 'archive');
                    }
                }
                ?>
            </div>

            <!-- Load more -->
            <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="100"
                    class="bg-transparent py-3 px-8 text-gray-800 text-2xl flex items-center justify-center my-32 font-normal border border-gray-200 p-2">
                <!-- Pagination -->
                <?php
                the_posts_pagination();
                ?>
            </div>
        </section>
    </main>

<?php
get_footer();
?>