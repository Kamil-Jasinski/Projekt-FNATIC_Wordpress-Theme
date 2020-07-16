<!--FOOTER   -->
<section id="footer-nav">
   <div class="footer-logo"><img class="footer-logo-img" src="<?php bloginfo('template_url'); ?>/addons/img/Fnatic_logo.png"></div>
   
    <div class="footer-links-wrapper">
       <div class="fnatic-links">
            <h2 class="h2-footer-links">FNATIC</h2>
        <?php
            wp_nav_menu( array(
            'theme_location' => 'footer_fnatic',
            'container_class'      => '',
            ));
        ?>
       </div><!-- /fnatic-links-->

       <div class="site-links">
            <h2 class="h2-footer-links">SITE LINKS</h2>
        <?php
            wp_nav_menu( array(
            'theme_location' => 'footer_site',
            'container_class'      => '',
            ));
        ?>
       </div><!-- /site-links-->

       <div class="follow-us">
            <h2 class="h2-footer-links">FOLLOW US</h2>
            
               <a class="fb_icon_footer" target="_blank" href="<?php echo get_theme_mod('pf_socials_callout_facebook') ?>">
               <i class="fab fa-facebook-square"></i>
               </a>

               <a class="instagram_icon_footer" target="_blank" href="<?php echo get_theme_mod('pf_socials_callout_instagram') ?>">
                   <i class="fab fa-instagram"></i>
               </a>

               <a class="youtube_icon_footer" target="_blank" href="<?php echo get_theme_mod('pf_socials_callout_youtube') ?>">
                   <i class="fab fa-youtube"></i> 
               </a>   
            
       </div><!-- /follow-us -->
    </div><!-- /footer-links-wrapper-->
</section><!-- /footer-nav-->

<footer class="site-footer">
    <a id="go-up-arrow" href="#top" alt="GO UP"><i  class="fas fa-caret-square-up go-up"></i></a>
    <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
</footer>

</main>

<?php wp_footer(); ?>

</body>
</html>
