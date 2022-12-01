<!-- Article -->
<article 
data-aos="fade-up"
data-aos-duration="1000"
data-aos-delay="100"
class="h-auto w-full flex flex-col items-start justify-start space-y-4">
    <small class="text-xs text-gray-400"><?php echo the_date(); ?></small>
    <h2 class="text-2xl md:text-3xl w-full text-gray-800 leading-tight transition duration-300 hover:border-2 hover:border-gray-800">
        <a href="<?= esc_html(the_permalink()); ?>" targe="_blank"><?php echo the_title(); ?></a>
    </h2>
    <p class="text-sm md:text-md text-gray-500 leading-loose">
    <?php echo the_excerpt(); ?> 
    </p>
</article>