<?php get_header() ?>

<?php 
$wp_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 5,
])
?>

<div class="container page-articles">
    <div class="articles">
<?php while(have_posts()): ?>
    <?php the_post()?>
    <article>
        <a href="<?php the_permalink() ?>"><h2>
            
                <?php the_title() ?>
         
        </h2>
        <?php the_excerpt() ?>
       </a></article>

<?php endwhile; ?>
</div>
</div>
<?php get_footer() ?>