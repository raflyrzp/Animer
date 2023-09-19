<?php get_header(); ?>


<div class="container">
<section class="content">
        <h1><?= single_cat_title(); ?></h1>            
        <div class="anime-list">
        <?php while($wp_query->have_posts()): ?>
            <?php 
                $wp_query->the_post();
            ?>

                <div class="anime-card">
                    <a href="<?php the_permalink() ?>">
                        <div class="thumbnail">
                            <?php 
                                $thumbnail_url= get_field('thumbnail')['url']; 
                                echo '<img src="' . $thumbnail_url . '" />';
                            ?>
                        </div>

                        <div class="anime-info">
                            <h2>
                                <?php the_title() ?>
                            </h2>
                            <?php 
                                $release = get_field('release_date');
                            ?>
                            <p><?= $release; ?></p>
                        </div>   
                    </a>
                </div>
                <?php endwhile; ?>   
            </div>
    </section>

<?php get_footer(); ?>