<?php get_header();  ?>
<?php get_template_part('single_menu'); ?>

<!-- TEN PLIK WYŚWIETLA OSOBNY POST-->
        <?php if (have_posts()) : 
            while (have_posts()) : the_post(); ?>
            
            
            
<section id="post" class="events-wrapper"><!-- Included the last events -->
           <h1 class="h1-events" style="border-bottom: 1px solid #151515; margin-bottom: 30px; padding-bottom: 30px;"><?php the_title();?></h1>

   <section class="events">
<!--          ARTICLE ONE          -->


    <article class="event">   
      <div class="event-general-info"> <!-- Included information about date and location -->
           
            <div class="thumbnail-container"><?php the_post_thumbnail(); ?></div>
            <h2 class="event-date"><?php echo get_the_date( 'm.d' ); ?></h2>
            <h3 class="event-location"><i class="fas fa-map-marker-alt"></i> <?php show_categories(); ?></h3>
            
            
      </div>
        
        

        <div class="event-info"> <!-- Included event title & article -->
            <div class="event-title">
               
               
               
            </div>
            
            
            <article class="content-text">
                <?php the_content();?>
                <?php edit_post_link( '&raquo; Edit Post', '<p>','</p>'); ?>
                <div class="post-details">
               <p>By 
               <a id="post-author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author();?></a>
               
               <?php the_time('F jS, Y g:i a') ?>
               </p>
               </div>
            </article>
            

        </div>
    </article>

<?php get_template_part('part_comments'); ?>
  

  </section><!--EVENTS    -->

</section><!--     --- EVENTS WRAPPER --- END     -->  

   
   
   
    <?php  endwhile;
        else :
          echo '<p>Sorry, no content found.</p>';
    endif; ?>

<?php get_footer(); ?>