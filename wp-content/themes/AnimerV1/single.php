<?php get_header() ?>
<div class="container single-article">


    <?php while(have_posts()): ?>
        <?php the_post() ?>
        <h2><?php the_title() ?></h2>

        <article>
            <p><?php the_content() ?></p>
        </article>

    <?php endwhile; ?>
    <?php wp_reset_postdata() ?>
</div>
<?php get_footer() ?>