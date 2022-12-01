<?php 
    get_header();
?>

    <!-- content -->
    <main class="h-auto w-full overflow-hidden">

        <?php 
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    // get_template_part('template-parts/content', 'archive');
                    the_excerpt();
                }
            }
        ?>

    </main>
    
<?php 
    get_footer();
?>