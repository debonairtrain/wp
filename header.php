<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Debonair Training" />
    <meta name="description" content="<?php bloginfo('description')?>" />
    <meta name="keywords" content="Tags: responsive, corporate, business, edutech, online learning, e-learning, moodle" />

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri() . "/assets/img/logo.png" ?>" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . "/assets/img/logo.png"; ?>" />

    <!-- Open Graph -->
    <meta property="og:description" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:url" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="" />

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= bloginfo('stylesheet_url')?>" />
    

    <?php 
        wp_head();
    ?>
</head>
<body <?= body_class(); ?> >
    <!-- header -->
    <header class="h-20 w-full flex items-center justify-center position relative header">
        <!-- Header Inner -->
       <section class="h-full w-11/12 md:w-10/12 flex flex-col items-center justify-center space-y-5">
            <!-- Header Nav -->
            <nav class="h-auto w-full flex items-center justify-between">
                <!-- Logo -->
                <div class="h-auto w-auto flex items-center justify-start space-x-10">
                    <h1 class="font-medium text-lg">
                        <?php
                            if(has_custom_logo()) {
                                if (function_exists('the_custom_logo')) {
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                    
                                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" style="max-width: 75px;" />';
                                }
                            }
                            else {
                                echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
                            }
                        ?>
                    </h1>

                    <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'primary',
                                'depth' => 0,
                                'container' => '',
                                'theme_location' => 'primary',
                                'items_wrap' => '<ul id="menu" class="h-full text-gray w-full flex items-center justify-end space-x-10 hideOnMobile desktopMenu" style="font-size:20px!important;">%3$s</ul>',
                                'walker' => new Debonair_Walker_Nav_Menu()
                            )
                        )                        
                    ?>

                </div>

                <!-- Menu -->
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'secondary',
                        'depth' => 0,
                        'container' => 'false',
                        'theme_location' => 'secondary',
                        'items_wrap' => '<ul id="" class="menu-button">%3$s</ul>',
                        'walker' => new Debonair_Walker_Nav_Menu()
                    )
                )
                ?>

                <!-- Drawer -->
                <div id="hamburger" class="h-10 w-8 flex flex-col items-start justify-center space-y-1 hideOnDesktop">
                    <span class="h-[2px] w-11/12 bg-[#336699] rounded-full"></span>
                    <span class="h-[2px] w-11/12 bg-[#336699] rounded-full"></span>
                    <span class="h-[2px] w-11/12 bg-[#336699] rounded-full"></span>
                </div>

                <!-- Mobile Menu -->
                <?php
                    wp_nav_menu(
                        array(
                            'menu' => 'mobile',
                            'depth' => 0,
                            'container' => '',
                            'theme_location' => 'mobile',
                            'items_wrap' => '<ul id="drawer" style="margin-bottom:-100px!important;" class="h-screen w-full bg-white rounded-md flex flex-col items-start justify-center space-y-5 px-5 position fixed top-0 right-0 z-100 shadow-lg transition duration-700 hideOnDesktop"> <div class="h-10 w-10 position absolute top-3 right-2 font-medium" id="closeDrawer"><i class="la la-times-circle text-2xl"></i></div>%3$s</ul>',
                            'walker' => new Debonair_Walker_Mobile_Nav_Menu()
                        )
                    )                        
                ?>

            </nav>
       </section>
    </header>