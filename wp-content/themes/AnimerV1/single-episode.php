<?php get_header() ?>


<div class="container detail-episode">

    <a href="<?= wp_get_referer() ?: home_url('/'); ?>" class="go-back-button">&#129120; go back</a>

    <?php if($wp_query->have_posts()): ?>
            <?php 
                $wp_query->the_post();
                $episode_number = get_post_meta( get_the_ID(), 'episode_number', true );
                $episode_title = get_the_title();
                $episode_description = get_the_content();
                $episode_video_url = get_post_meta( get_the_ID(), 'video_url', true );
            ?>
    
                <h1><?= $episode_title ?></h1>       
                <article>
                    <p><?= $episode_description ?></p>
                    <?php if ( $episode_video_url ) : ?>
                        <iframe width="560" height="315" src="<?= $episode_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                    <?php endif; ?>
                </article>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>


<?php get_footer() ?>