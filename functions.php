<?php
    /*
    * Automatically add theme support for Custom Nav Menu Using Walker
    */
    require_once(get_template_directory() . '/inc/class_debonair_custom_nav_walker.php'); // Desktop
    require_once(get_template_directory() . '/inc/class_debonair_custom_mobile_nav_walker.php'); // Mobile
    require_once(get_template_directory() . '/inc/class_debonair_custom_footer_nav_walker.php'); // Footer Destkop/Mobile

    /*
    * Automatically add theme support for Custom Footer Social Links
    */
    require_once(get_template_directory() . '/inc/widgets.php');

    /*
    * Automatically add theme support for title tags
    */

    function debonair_theme_support () {
      // Add Theme Support
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post_format', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background' );
        add_theme_support( 'custom-header' );
        add_theme_support('custom-logo', array(
                  'height' => 100,
                  'width' => 100,
                  'flex-height' => false,
                  'flex-width' => false,
                  'header-text' => array('site-title', 'site-description'),
                  'unlink-homepage-logo' => false,
              ));
              add_theme_support('menus');
        add_theme_support('widgets');
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'starter-content' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'editor-styles' );
        add_theme_support( 'html5', array('style','script', ) );
        add_theme_support('menus');
    }

    add_action('after_setup_theme', 'debonair_theme_support');

    //main configuration file
    function debonair_config()
    {
        //registering our menus
        register_nav_menus(
            array(
                'primary' => "Top nav",
                'secondary' => "Top menu",
                'mobile' => "Mobile Menu",
                'footer' => "Footer Nav"
            )
        );
    }
  add_action('after_setup_theme', 'debonair_config', 0);

    /*
    * Automatically load in all styles
    */

    function debonair_register_styles () {
        $version = wp_get_theme()->get('Version');

        wp_enqueue_style('debonair-tailwind', get_template_directory_uri() . '/style.css', array('normalize-styles'), $version, 'all');
        wp_enqueue_style('abbasStyle-css', get_template_directory_uri() . '/assets/css/abbasStyle.css', array(), $version, 'all');
        wp_enqueue_style('customs-styles', get_template_directory_uri() . '/assets/css/customs.css', array('normalize-styles'), $version, 'all');
        wp_enqueue_style('debonair-index', get_template_directory_uri() . '/assets/css/index.css', array('normalize-styles'), $version, 'all');
        wp_enqueue_style('debonair-customs', get_template_directory_uri() . '/assets/css/debonair.css', array('normalize-styles'), $version, 'all');
        wp_enqueue_style('debonair-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('normalize-styles'), $version, 'all');
        wp_enqueue_style('debonair-accordion', get_template_directory_uri() . '/assets/css/accordion.css', array('normalize-styles'), $version, 'all');
        wp_enqueue_style('debonair-swiper-local', get_template_directory_uri() . '/assets/css/swiper.css', array('debonair-swiper-remote'), $version, 'all');
        wp_enqueue_style('debonair-swiper-remote', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', array('normalize-styles'), '8.0', 'all');
        wp_enqueue_style('debonair-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css', array('normalize-styles'), '1.3.0', 'all');
        wp_enqueue_style('debonair-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array('normalize-styles'), '2.3.1', 'all');
        wp_enqueue_style('debonair-font-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap', array('normalize-styles'), '2.0', 'all');
        wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css", array(), '7.0.0');
        //wp_enqueue_style( 'bootstrap-styles', "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css", array(), '5.2.0', 'all');
    }

    add_action('wp_enqueue_scripts', 'debonair_register_styles');

    /*
    * Automatically load in all scripts
    */
    function debonair_register_scripts () {
        $version = wp_get_theme()->get('Version');

        // Remote
        wp_enqueue_script('debonair-swiper-remote', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array(), $version, true);
        wp_enqueue_script('debonair-aos-remote', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), $version, true);

        // Local
        wp_enqueue_script('debonair-counter-lib-local', get_template_directory_uri() . '/assets/js/lib/countUp/dist/countUp.umd.js', array(), $version, true);

        wp_enqueue_script('debonair-index', get_template_directory_uri() . '/assets/js/index.js', array(), $version, true);
        wp_enqueue_script('debonair-drawer', get_template_directory_uri() . '/assets/js/drawer.js', array(), $version, true);
        wp_enqueue_script('debonair-accordian', get_template_directory_uri() . '/assets/js/accordion.js', array(), $version, true);
        wp_enqueue_script('debonair-swiper', get_template_directory_uri() . '/assets/js/swiper.js', array('debonair-swiper-remote'), $version, true);
        wp_enqueue_script('debonair-aos', get_template_directory_uri() . '/assets/js/aos.js', array('debonair-aos-remote'), $version, true);
    }

    add_action('wp_enqueue_scripts', 'debonair_register_scripts');

    /*
    * Automatically add widgets support
    */
    function debonair_widget_areas () {
        // Footer Copyright
        register_sidebar(
            array(
                'id' => 'footer-widget-copyright',
                'name' => 'Footer Widget Copyright Area',
                'description' => 'Displays and controls footer copyright',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Fotoer Description
        register_sidebar(
            array(
                'id' => 'footer-widget-description',
                'name' => 'Footer Widget Description Area',
                'description' => 'Displays and controls footer description',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'footer-widget-social',
                'name' => 'Footer Widget Social Area',
                'description' => 'Displays and controls footer social links',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'page-sidebar',
                'name' => 'Page Sidebar Widget Area',
                'description' => 'Add widgets for page sidebar here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'front-page',
                'name' => 'Front Page Widgets',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'abbas-page',
                'name' => 'Abbas Page Widgets',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'header-image',
                'name' => 'Header Image Widgets',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'header-button',
                'name' => 'Header Button Widgets',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'why-choose-us',
                'name' => 'Front page why us',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'why-choose-us-description',
                'name' => 'Front page why us description',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'benefit-one',
                'name' => 'Front page benefit one',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'benefit-ttwo',
                'name' => 'Front page benefit two',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'benefit-three',
                'name' => 'Front page benefit three',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'benefit-four',
                'name' => 'Front page benefit four',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'about-us-image',
                'name' => 'Front page about us image',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'about-us',
                'name' => 'Front page about us',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'testimonial-description',
                'name' => 'Front page testimonial description',
                'description' => 'Add widgets for the front page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'about-page-description',
                'name' => 'About page description',
                'description' => 'Add widgets for the about page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'about-page-image',
                'name' => 'About page image',
                'description' => 'Add widgets for the about page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'about-page-mission',
                'name' => 'About page mission',
                'description' => 'Add widgets for the about page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'about-page-ranking',
                'name' => 'About page ranking',
                'description' => 'Add widgets for the about page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'solution-page-description',
                'name' => 'Solution page description',
                'description' => 'Add widgets for the solution page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'solution-page-image',
                'name' => 'Solution page image',
                'description' => 'Add widgets for the solution page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'solution-page-contact-us',
                'name' => 'Solution page contact us',
                'description' => 'Add widgets for the solution page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'solution-page-recent-project',
                'name' => 'Solution page recent project',
                'description' => 'Add widgets for the solution page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'lms-page-description',
                'name' => 'lms page description',
                'description' => 'Add widgets for the lms page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'lms-page-other-description',
                'name' => 'lms page other description',
                'description' => 'Add widgets for the lms page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'lms-page-image',
                'name' => 'lms page image',
                'description' => 'Add widgets for the lms page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'testimonial-page-description',
                'name' => 'Testimonail page description',
                'description' => 'Add widgets for the lms page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'consult-page-description',
                'name' => 'consultation page description',
                'description' => 'Add widgets for the consultation page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'consult-page-image',
                'name' => 'consultation page image',
                'description' => 'Add widgets for the consultation page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'resources-page-description',
                'name' => 'Resources page description',
                'description' => 'Add widgets for the resources page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'resources-page-image',
                'name' => 'Resources page image',
                'description' => 'Add widgets for the resources page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'contact-us-page-description',
                'name' => 'Contact Us page description',
                'description' => 'Add widgets for the contact us page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'contact-us-page-image',
                'name' => 'Contact Us page image',
                'description' => 'Add widgets for the contact us page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'get-started-page-image',
                'name' => 'Get Started page image',
                'description' => 'Add widgets for the get started page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
        // Footer Social Links
        register_sidebar(
            array(
                'id' => 'blog-page-image',
                'name' => 'Blog page image',
                'description' => 'Add widgets for the get blog page here',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
    }

    add_action('widgets_init', 'debonair_widget_areas');
?>
