<!--SECRET COMMENT-->
<section id="events" class="events-wrapper"><!-- Included the last events -->
           <h1 class="h1-events">What's Up ?</h1>

    <section class="events">

        <?php
               $args = array(
               'post_type' => 'post',
               'posts_per_page' => 2
               );
               $_posts = new WP_Query($args);
        ?>

        <?php if ($_posts->have_posts()):?>
        <?php while  ($_posts->have_posts()): $_posts->the_post(); ?>


            <article class="event">

                <div class="event-general-info"> <!-- Included information about date and location -->
                        <h2 class="event-date"><?php echo get_the_date( 'm.d' ); ?></h2>
                        <h3 class="event-location"><i class="fas fa-map-marker-alt"></i> <?php show_categories(); ?></h3>
                </div>

                <div class="event-info"> <!-- Included event title & article -->
                    <div class="event-title"><a href="<?php the_permalink(); ?>#post "><?php the_title();?></a></div>
                    <article class="content-text">
                    <?php the_content();?>
                    <?php edit_post_link( '&raquo; Edit Post', '<p>','</p>'); ?>
                    </article>

                    <a href="<?php the_permalink();?>#post" class="btn-default">Read More</a>
                </div>

            </article> <!-- /event-->


            <?php endwhile;?>
            <?php
                else :
                echo '<p>Sorry, no content found.</p>';

            endif; ?>


    </section><!-- /EVENTS -->

</section><!--     --- EVENTS WRAPPER --- END     -->
