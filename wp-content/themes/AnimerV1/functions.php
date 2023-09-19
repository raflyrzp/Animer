<?php 

function animer_enqueue_scripts(){
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('script', get_theme_file_uri() . '/assets/js/script.js');

    wp_localize_script('rating-script', 'ratingData', array(
      'postId' => get_the_ID(),
      'currentRating' => get_post_meta(get_the_ID(), 'rating', true),
    ));
}
add_action('wp_enqueue_scripts', 'animer_enqueue_scripts');


// REGISTER MENU
function animer_register_menus(){
    register_nav_menu('navbar-menu', 'Navbar Menu');
    register_nav_menu('social-media', 'Social Media');
    
}
add_action('init', 'animer_register_menus');




// LOGIN ERROR
function animer_login_error(){
    session_start();
    $_SESSION['errors'] = ['Invalid Username or Password'];
    wp_redirect(home_url('/admeen'));
}
add_action('login_errors', 'animer_login_error');



// POST TYPE ANIME
function animer_post_type_register(){
    register_post_type('Anime',[
        'labels' => [
            'name' => 'Anime',
          'singular_name' => 'Anime',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Anime',
            'edit' => 'Edit',
            'edit_item' => 'Edit Anime',
            'new_item' => 'New Anime',
            'view' => 'View',
            'view_item' => 'View Anime',
          'search_items' => 'Search Anime',
            'not_found' => 'No Anime found',
            'not_found_in_trash' => 'No Anime found in Trash',
            'parent_item_colon' => '',
          'menu_name' => 'Anime'
        ],
        'public' => true,
        'rewrite' => [ 'slug' => 'anime', 'with_front' => false ]
    ]);
    flush_rewrite_rules(false);
}

add_action('init', 'animer_post_type_register');


//POST TYPE EPISODE
function animer_episode_post_type_register(){
  register_post_type('Episode',[
    'labels' => [
      'name' => 'Episode',
    'singular_name' => 'Episode',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Episode',
      'edit' => 'Edit',
      'edit_item' => 'Edit Episode',
      'new_item' => 'New Episode',
      'view' => 'View',
      'view_item' => 'View Episode',
  'search_items' => 'Search Episode',
      'not_found' => 'No Episode found',
      'not_found_in_trash' => 'No Episode found in Trash',
      'parent_item_colon' => '',
  'menu_name' => 'Episode'
    ],
    'public' => true,
    'rewrite' => [ 'slug' => 'episode', 'with_front' => false ]
  ]);
  flush_rewrite_rules(false);
}

add_action('init', 'animer_episode_post_type_register');





// TAXONOMY GENRE
function animer_register_taxonomy_genre() {


// bagian penting :

// register_taxonomy('genre', ['anime'], [
//   'label' => 'Genre', 
//   'public' => true, 
//   'hierarchical' => true,
//   'rewrite' => ['slug' => 'genre']
// ]);



  register_taxonomy('genre', ['anime'], [
    'public' => true, 
    'hierarchical'      => true, // kalau. Mau genre nya bisa punya parent (genre didalam genre)
    'labels' => [
      'name' => 'Genre',
      'singular_name' => 'Genre',
      'search_items' => 'Search Genre',
      'all_items' => 'All Genre',
      'parent_item' => 'Parent Genre',
      'parent_item_colon' => 'Parent Genre:',
      'edit_item' => 'Edit Genre',
      'update_item' => 'Update Genre',
      'add_new_item' => 'Add New Genre',
      'new_item_name' => 'New Genre Name',
      'menu_name' => 'Genres',
    ],
    'rewrite' => ['slug' => 'genre', 'with_front' => false]
  ]);
}
add_action( 'init', 'animer_register_taxonomy_genre' );




// TAXONOMY SEASON
function animer_register_taxonomy_season() {
  register_taxonomy('season', ['anime'], [
    'public' => true, 
    'hierarchical' => true,
    'labels' => [
      'name' => 'Season',
      'singular_name' => 'Season',
      'search_items' => 'Search Season',
      'all_items' => 'All Season',
      'parent_item' => 'Parent Season',
      'parent_item_colon' => 'Parent Season:',
      'edit_item' => 'Edit Season',
      'update_item' => 'Update Season',
      'add_new_item' => 'Add New Season',
      'new_item_name' => 'New Season Name',
      'menu_name' => 'Season',
    ],
    'rewrite' => ['slug' => 'season', 'with_front' => false]
  ]);
}
add_action( 'init', 'animer_register_taxonomy_season' );



// POST TYPE GALLERY
function animer_custom_galery(){
  register_post_type('Gallery',[
    'labels' => [
      'name' => 'Gallery',
    'singular_name' => 'Gallery',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Gallery',
      'edit' => 'Edit',
      'edit_item' => 'Edit Gallery',
      'new_item' => 'New Gallery',
      'view' => 'View',
      'view_item' => 'View Gallery',
  'search_items' => 'Search Gallery',
      'not_found' => 'No Gallery found',
      'not_found_in_trash' => 'No Gallery found in Trash',
      'parent_item_colon' => '',
  'menu_name' => 'Gallery'
    ],
    'public' => true,
    'rewrite' => [ 'slug' => 'gallery', 'with_front' => false ]
  ]);
  flush_rewrite_rules(false);
}

add_action('init', 'animer_custom_galery');



//SHORTCODE GALLERY
function animer_gallery_shortcode($atts){
  $id= "";

  $atts = shortcode_atts([
    'id' => get_the_ID(), // Atribut untuk menyimpan GALLERY_ID
  ], $id);


  $wp_query = new WP_Query([
      'post_type' => 'gallery',
      'posts_per_page' => -1,
      'meta_value' => $atts['id'],
      'meta_key' => 'relasi',
      'meta_compare' => '='
  ]);

  $output = "<section class='gallery'>";
  $output .= "<h1>GALLERY</h1>";
  $output .= '<div class="image">';

  while ($wp_query->have_posts()){
      $wp_query->the_post();  
      $image_url= get_field('image')['url'];

      $output .= "<img src='$image_url'>";
    }
  $output .= "</div>";
  $output .= "</section>";
  return $output;
}

function animer_register_shortcode(){
  add_shortcode('anime-gallery', 'animer_gallery_shortcode');
}
add_action('init', 'animer_register_shortcode');




// function custom_episode_permalink($permalink, $post)
// {
//     if ($post->post_type == 'episode') {
//         $anime_slug = '';

//         $anime = get_field('relasi', $post->ID);

//         if ($anime) {
//             $anime_slug = $anime->post_name;
//         }

//         $permalink = home_url("anime/{$anime_slug}/{$post->post_name}");
//     }
//     return $permalink;
// }
// add_filter('post_type_link', 'custom_episode_permalink', 10, 2);






// Fungsi untuk mengupdate rating episode
function update_rating() {
  $post_id = $_POST['post_id'];
  $rating = $_POST['rating'];

  // Simpan rating ke post meta dengan custom field episode_rating
  update_post_meta($post_id, 'anime_rating', $rating);

  // Kembalikan rating yang sudah diupdate sebagai response untuk updateStars di JavaScript
  echo $rating;
  wp_die();
}
add_action('wp_ajax_update_rating', 'update_rating');
add_action('wp_ajax_nopriv_update_rating', 'update_rating'); // Untuk pengguna yang belum login
?>