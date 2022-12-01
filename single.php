<?php 
    get_header();
?>

    <!-- content -->
    <main class="h-auto w-full overflow-hidden">
       
         <!-- Blog Post Container -->
         <section id="sectionOne" class="h-auto w-full flex flex-col items-center justify-center my-20 md:my-32">
            <!-- Inner -->
            <div class="h-auto w-10/12 flex items-center justify-center">
                <?php 
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content', 'article');
                        }
                    }
                ?>

            </div>
        </section>
    </main>
    
<?php 
    get_footer();
?>