<?php get_header() ?>


<?php 
$wp_query = new WP_Query([
    'post_type' => 'anime',
    'posts_per_page' => 10,
    'meta_key' => 'count',
    'orderby' =>'meta_value',
    'order' => 'DESC',
]);
?>

<div class="container">
    
    <section class="hero">  
        <div class="judul"> 
            <div class="isi-judul">
                <h1><?php bloginfo('name') ?></h1>
                <p><?php bloginfo('description') ?></p>
            </div>
        </div>
        <img src="<?= get_theme_file_uri('/assets/images') . "/luffy.jpg" ?>">
    </section>



    <section class="content">
        <h1>Based On View</h1>            
        <div class="anime-list">
        <?php $i = 1 ?>
        <?php while($wp_query->have_posts() && $i <= 4): ?>
            <?php 
                $wp_query->the_post();
                $i++;
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
                                $view_count = get_field('count');
                            ?>
                            <p><?= $view_count; ?> view</p>
                        </div>   
                    </a>
                </div>
                <?php endwhile; ?>   
            </div>
    </section>



    <?php 
    $release_date = new WP_Query([
        'post_type' => 'anime',
        'posts_per_page' => -1,
        'meta_key' => 'release_date',
        'orderby' =>'meta_value',
        'order' => 'DESC',
    ])
    ?>

<section class="content">
        <h1>Recent Anime Updates</h1>            
        <div class="anime-list">
        <?php while($release_date->have_posts()): ?>
            <?php 
                $release_date->the_post();
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

    <a href="#" class="back-to-top-btn" title="Back to Top">&#129121;</a>

</div>
<?php get_footer() ?>