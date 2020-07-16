<?php get_header();  ?>
<?php get_template_part('single_menu'); ?>

<!-- TEN PLIK WYŚWIETLA OSOBNY POST-->
        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>



<section id="post" class="events-wrapper"><!-- Included the last events -->
           <h1 class="h1-events" style="border-bottom: 1px solid #151515; margin-bottom: 30px; padding-bottom: 30px;"><?php the_title();?></h1>

           <p class="comments-count">
  <i class="fas fa-comments"></i>
  <?php comments_number( 'Be the first to comment :)', 'One Response', '% responses' ); ?>
</p>


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
                <a href="<?php the_permalink();?>#post" class="btn-default">Read More</a>
            </article>


        </div>
    </article>


  </section><!--EVENTS    -->

</section><!--     --- EVENTS WRAPPER --- END     -->




    <?php  endwhile;
        else :
          echo '<p>Sorry, no content found.</p>';
    endif; ?>

<?php get_footer(); ?>
