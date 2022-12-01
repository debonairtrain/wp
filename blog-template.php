<?php
/*
 * Template Name: Blog Template
 *
 */
?>
<?php
get_header();
?>
    <main class="h-auto w-full overflow-hidden">
    <!-- Hero -->
    <section id="sectionOne" class="h-auto md:h-auto w-full flex items-center justify-center mt-10">
        <!-- Inner -->
        <div
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="100"
                class="h-full w-12/12 md:w-12/12 flex flex-col md:flex-row items-center justify-center rounded-md overflow-hidden">
            <?php dynamic_sidebar('blog-page-image'); ?>
        </div>
    </section>
        <article
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="100"
                class="h-auto w-12/12 flex flex-col items-center justify-center space-y-4" style="padding-left:40px;padding-right:40px;">
            <!-- Thumbnail -->
            <div class="h-auto w-full flex items-center justify-center">
                <?php echo the_post_thumbnail(''); ?>
            </div>

            <small class="text-xs text-gray-400"><?php echo strtoupper(the_author()); ?> , <?php echo the_date(); ?> </small>
            <small class="text-xs text-gray-400"><?php echo the_tags(); ?></small>
            <!-- <small class="text-xs text-gray-400"><?php echo comments_number(); ?></small> -->
            <h2 class="text-2xl md:text-7xl w-full text-center text-gray-800 leading-tight transition duration-300 hover:border-2 hover:border-gray-800 font-bold">
                <?php echo the_title(); ?>
            </h2>
            <p class="text-2xl md:text-5xl text-gray-500 leading-loose">
                <?php echo the_content(); ?>
            </p>
            <!-- Comments -->
          
        </article>
    </main>
<?php
get_footer();
?>
