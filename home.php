
 <!-- banner start -->
 <section class="container-fluid banner text-center">
    <h4 class="display-6 fw-bold" style="color: #0C2D57;">WELCOME TO</h4>
    <img src="assets/img/logo.png" alt="logo" width="200">
    <h1 class="display-1 fw-bold" style="color: #45CFDD;">VAGABONDIA</h1>
    <h3 class="display-9 fw-bold" style="color: #0C2D57;">Embrace the Unknown</h3>
    <a href="form_input.html" class="btn btn-outline-info">Booking now!</a>
    </section>
   <!-- banner End -->
<!-- Google Fonts Link For Icons -->
<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
   <div class="container">
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
          chevron_left
        </button>
        <ul class="image-list">
          <img class="image-item" src="assets/img/gallery/fuji.jpg" alt="img-1" />
          <img class="image-item" src="assets/img/gallery/hollywood.jpg" alt="img-2" />
          <img class="image-item" src="assets/img/gallery/seoul.jpg" alt="img-3" />
          <img class="image-item" src="assets/img/gallery/lake.jpg" alt="img-4" />
          <img class="image-item" src="assets/img/gallery/tromso.jpg" alt="img-5" />
          
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
          chevron_right
        </button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>