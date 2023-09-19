<?php get_header() ?>

<?php 
    $value = get_field('count');
    update_post_meta(get_the_ID(), 'count', $value + 1);
?>

<div class="container anime-detail">
<?php while(have_posts()): ?>
    <?php the_post() ?>
    <?php $thumbnail_url= get_field('thumbnail')['url'];  ?>

    <div class="keterangan"  style='background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url("<?= $thumbnail_url; ?>")'>
        <div class="thumbnail">
            <?= '<img src="' . $thumbnail_url . '" />';?>
        </div>

        <div class="keterangan-right">
            <h2><?php the_title() ?></h2>
            
            <?php $view_count = get_field('count'); ?>
            <p><?= $view_count; ?> views</p>

            <?php $release_date = get_field('release_date'); ?>
            <p>Realese on <?= $release_date; ?></p>

            <div class="average-rating">
            <div class="star-rating" data-post-id="<?= get_the_ID(); ?>">
                <?php
                    $rating = get_post_meta(get_the_ID(), 'anime_rating', true);
                    for ($i = 1; $i <= 5; $i++) {
                        $star_class = ($rating >= $i) ? 'star-filled' : 'star-empty';
                        echo '<span class="star ' . $star_class . '">&#9733;</span>';
                    }
                    ?>
            </div>
            <p><?= $rating; ?>/5</p>
        </div>
        </div>
    </div>


    <article class="sinopsis">
        <h1>Sinopsis</h1>
        <p><?php the_content() ?></p>
    </article><hr>

<?php endwhile; ?>
<?php wp_reset_postdata() ?>



<!-- SHOW EPISDOE -->
<?php 
$anime_id = get_the_ID();

$episodes = new WP_Query([
    'post_type' => 'episode',
    'posts_per_page' => -1,
    'meta_key' => 'relasi',
    'meta_value' => $anime_id,
    'meta_compare' => '=',
    'orderby' =>'number episode',
    'order' => 'ASC',
]);
?>

<section class="episode">
    <h1>Episode List</h1>
<?php if($episodes->have_posts()): ?>
    <?php while($episodes->have_posts()): ?>
        <?php $episodes->the_post() ?>
            <div class="single-episode">
                <h3>
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </h3>
            </div>
    <?php endwhile; ?>

<?php else : ?>
    <p>Tidak ada episode yang sesuai pada anime ini</p>
<?php endif; ?>
<?php wp_reset_postdata() ?>
</section>

<!-- END EPISODE -->



<!-- SHOW GALLERY -->
<?php 
$gallery_id = get_the_ID();
?>

<!-- <section class="gallery">
    
    <h1>GALLERY</h1>
    <div class="image"> -->
        <?= 
        do_shortcode('[anime-gallery id="$gallery_id"]');
        ?>
    <!-- </div>
</section> -->


</div>
<?php get_footer() ?>