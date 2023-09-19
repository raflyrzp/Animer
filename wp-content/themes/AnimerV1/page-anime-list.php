<?php get_header() ?>


<?php 
$paged = get_query_var('paged') ?? 1;
$wp_query = new WP_Query([
    'post_type' => 'anime',
    'posts_per_page' => 10,
    'paged' => $paged
]);

?>

<div class="container all-anime">
    <aside>
        <form>
      <h2>Choose Genre</h2>
    <?php
    $genres = get_terms(array(
      'taxonomy' => 'genre',
      'hide_empty' => false,
    ));

    foreach ($genres as $genre) {
      ?>
      <label>
        <input type="radio" name="genre" value="<?php echo $genre->slug; ?>">
        <?php echo $genre->name; ?>
      </label><br>
      <?php
    }
    ?>

    <h2>Choose Season</h2>
     <?php
    // Ambil daftar season dari taxonomy season
    $seasons = get_terms(array(
      'taxonomy' => 'season',
      'hide_empty' => false,
    ));

    // Loop untuk menampilkan input radio untuk setiap season
    foreach ($seasons as $season) {
      ?>
      <label>
        <input type="checkbox" name="season" value="<?php echo $season->slug; ?>">
        <?php echo $season->name; ?>
      </label><br>
      <?php
    }
    ?>
    <button type="submit">Choose</button>
  </form>
    </aside>
    <section class="content">
        <h1>ANIME LIST</h1>            
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
                                $view_count = get_field('count');
                            ?>
                            <p><?= $view_count; ?> view</p>
                            <p>Release on <?= $release; ?></p>
                        </div>   
                    </a>
                </div>
                <?php endwhile; ?>   
            </div>
    </section>

</div>

<?php get_footer() ?>