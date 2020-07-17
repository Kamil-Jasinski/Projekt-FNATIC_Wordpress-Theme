       <!--        HAMBURGER ICON ON        -->    
            <div class="hamburger-bar">
            <div id="hamburger-open" class="disable-select"><i class="fas fa-bars disable-select"></i></div>
            </div>
            
            <?php if ( !is_front_page() ) { ?>
 
            <style>
                /*This styles will onlye appear if page witch is displayed is single page.*/
                
                .hamburger-bar{
                    display: flex;
                    position: relative;
                    width: 100%;
                    padding: 15px;
                    background-color: transparent;
                    align-items: center;
                    justify-content:flex-end;
                    border-bottom: 1px solid #151515;
                    box-shadow: 0px 13px 17px -17px rgba(0,0,0,0.45);
                }
                #hamburger-open {
                    position: static;
                    top: 0px;
                    right: 0px;
                    color: #151515;
                }
                #navContainer {
                    display: block;
                    border-bottom: 1px solid #151515;
                    height: 20px;
                    position: fixed;
                    background-color: rgba(21, 21, 21, 0.03);
                    -webkit-box-shadow: 0px 13px 17px -17px rgba(0,0,0,0.45);
                    -moz-box-shadow: 0px 13px 17px -17px rgba(0,0,0,0.45);
                    box-shadow: 0px 13px 17px -17px rgba(0,0,0,0.45);
                }
                #navContainer a  {
                    color: rgba(255, 216, 41, 0.62);
                }
                #navContainer i {
                    color: #fff;
                }
                .navLinks {
                    overflow: hidden;
                }
                
                @media screen and (min-width: 1280px) {
                #navContainer{
                 position: static;
                }
                #navContainer i,#navContainer a  {
                    color: #151515;
                }
                
                #navContainer i:hover  {
                    color: #fda207;
                }
                    
                }
                
                
            </style>


            <?php } ?>

<!--       NAVIGATION       -->
            <nav id="navContainer">
        
<!--        HAMBURGER ICON OFF        -->  
            <div id="hamburger-close"><i class="fas fa-angle-double-left"></i></div>

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
