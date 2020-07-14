   <header id='top' class="site-header">
<!--
       <h1><a href="<?php home_url();?>"> <?php bloginfo('name')?></a></h1>
       <h5><?php bloginfo('description') ?></h5>
-->
           <div class="color-overlay"></div>
<!--        HEADER - BG VIDEO        -->    
            <div class="hero-video-container">
                  <div class="color-overlay"></div>
                  <div class="hero-video-container">
                        <video class="show-video" autoplay loop muted preload="metadata">
<!--        HEADER - BG IMAGE        -->         
                <style>
                    header {
                    background: url(<?php echo wp_get_attachment_url(get_theme_mod('image_upload')); ?>) no-repeat center ;
                    background-size: cover;
                    }
                </style>
                           
                            <source src="<?php echo wp_get_attachment_url(get_theme_mod('video_upload')) ?>" type="video/mp4">
                        </video>
                  </div>
            </div>
       
       <!--        HAMBURGER ICON ON        -->    
            <div id="hamburger-open" class="disable-select"><i class="fas fa-bars disable-select"></i></div>
       
       <!--       NAVIGATION       -->
            <nav id="navContainer">
        
<!--        HAMBURGER ICON OFF        -->  
            <div id="hamburger-close"><i class="fas fa-times"></i></div>

            <div class="navLinks">
              
                    
                    <?php
                    wp_nav_menu( array( 
    'theme_location' => 'header',
    'container'      => '',
    'menu_class'     => 'links-container',
) );

?>
<!--       SOCIALS       -->
                <div class="socials">
<!--       SOCIALS - REMINDER       -->
                <p class="socials-reminder">Don't forget to Follow Us on social media!</p>
<!--       SOCIALS - ICONS       -->
                        <div class="socials-container">
                               <a target="_blank" href="<?php echo get_theme_mod('pf_socials_callout_facebook') ?>">
                               <i class="fab fa-facebook-square fb_icon"></i>
                               </a>
                               
                               <a target="_blank" href="<?php echo get_theme_mod('pf_socials_callout_instagram') ?>">
                                   <i class="fab fa-instagram instagram_icon"></i>
                               </a>
                               
                               <a target="_blank" href="<?php echo get_theme_mod('pf_socials_callout_youtube') ?>">
                                   <i class="fab fa-youtube youtube_icon"></i> 
                               </a>   
                        </div><!-- /socials-container -->
                </div><!-- SOCIALS - END -->
            </div><!-- navLinks - END -->
            </nav><!-- NAVIGATION - END -->
       
       <!--        HEADER - SLOGAN        -->       
        <div id="headerText">
            <h1 class="h1-header"><?php echo get_theme_mod('pf_slogan_callout_part1') ?> <img class="h1-logo" src="<?php bloginfo('template_url'); ?>/addons/img/Fnatic_logo.png" alt=""></h1>
            <h2 class="h2-header"><?php echo get_theme_mod('pf_slogan_callout_part2') ?></h2>
        </div>   
            
        

<!--        HEADER - HERO-BTN        -->
           <div class="hero-btn-container"><a href="#events" class="hero-btn">LET'S GO!</a></div>
            
                  
</header><!-- HEADER - END -->