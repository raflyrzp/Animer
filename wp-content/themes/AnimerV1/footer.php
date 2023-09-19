<footer>

    <?php wp_footer() ?>
    <?php wp_nav_menu([
                'theme_location' => 'social-media',
                'container_class' => 'sosmed',
            ]) ?>


    <p>Copyright  &copy; <?= date('Y') ?> - All right reserved</p>
</footer>

<script>
  // Fungsi untuk menampilkan jumlah bintang terisi berdasarkan rating
  function updateStars(starRating) {
    const stars = document.querySelectorAll('.star-rating .star');
    stars.forEach((star, index) => {
      if (index < starRating) {
        star.classList.add('star-filled');
      } else {
        star.classList.remove('star-filled');
      }
    });
  }

  // Fungsi untuk mengirim data rating ke server melalui AJAX
  function updateRating(postID, rating) {
    fetch('/wp-admin/admin-ajax.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'action=update_rating&post_id=' + postID + '&rating=' + rating,
    })
    .then(response => response.text())
    .then(data => {
      // Update jumlah bintang terisi berdasarkan rating baru dari server
      updateStars(parseInt(data));
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

  // Event listener untuk mengatur interaksi star rating
  document.addEventListener('DOMContentLoaded', function() {
    const starRatingElements = document.querySelectorAll('.star-rating');
    starRatingElements.forEach(starRatingElement => {
      starRatingElement.addEventListener('click', function(event) {
        const postID = this.getAttribute('data-post-id');
        const starIndex = Array.from(this.children).indexOf(event.target);
        const rating = starIndex + 1;
        updateRating(postID, rating);
      });
    });
  });


  

// HAMBURGER MENU
const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('nav ul');

menuToggle.addEventListener('click', () => {
  nav.classList.toggle('slide');
});
</script>

</body>
</html>