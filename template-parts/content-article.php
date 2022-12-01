<!-- Post -->
<article 
data-aos="fade-up"
data-aos-duration="1000"
data-aos-delay="100"
class="h-auto w-full flex flex-col items-center justify-center space-y-4">
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
    <div class="text-sm md:text-md text-gray-500 leading-loose">
    <?php echo comments_template(); ?> 
    </div>
</article>