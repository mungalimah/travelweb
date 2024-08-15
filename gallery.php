<!-- Gallery -->
<section id="gallery">
<style>
        .glass {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            position: relative;
        }
        .card-img-top {
            transition: transform 0.3s ease;
        }
        .card:hover .card-img-top {
            transform: scale(1.1);
        }
        .detail-btn {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .detail-btn:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
    <div class="container">
        <div class="row text-center mb-3">
            <div class="main-txt" style="text-align: center;">
        <h1><strong>O</strong>ur <strong>G</strong>allery</h1>
        </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card glass">
                    <img src="./assets/img/gallery/fuji.jpg" class="card-img-top" alt="Fuji, Japan">
                    <div class="card-body">
                      <p class="card-text">Fuji, Japan</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card glass">
                    <img src="./assets/img/gallery/bali.jpg" class="card-img-top" alt="Bali, Indonesia">
                    <div class="card-body">
                      <p class="card-text">Bali, Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card glass">
                    <img src="./assets/img/gallery/sydney.jpg" class="card-img-top" alt="Sydney, Australia">
                    <div class="card-body">
                      <p class="card-text">Sydney, Australia</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card glass">
                    <img src="./assets/img/gallery/japan.jpg" class="card-img-top" alt="Festival, Japan">
                    <div class="card-body">
                      <p class="card-text">Festival, Japan</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card glass">
                    <img src="./assets/img/gallery/seoul.jpg" class="card-img-top" alt="Seoul Namsan Tower, South Korea">
                    <div class="card-body">
                      <p class="card-text">Seoul Namsan Tower, South Korea</p>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="form_input.html" class="btn btn-outline-info">Register Form</a>
            </div>
        </div>
    </div>
    </section>
<!-- Gallery end -->

<!-- Footer -->
<footer>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e0f4ff" fill-opacity="1" d="M0,224L48,240C96,256,192,288,288,282.7C384,277,480,235,576,213.3C672,192,768,192,864,197.3C960,203,1056,213,1152,213.3C1248,213,1344,203,1392,197.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <div class="container sticky-xxl-bottom">
        <div class="row text-center mt-7">
          <div class="col-lg-12">
            <p>Copyright © 2024 <a href="#">Vagabondia</a> Travel Co., Ltd. All rights reserved.</p>
            <p>Element source: <a title="CSS Templates" rel="sponsored" href="https://getbootstrap.com/" target="_blank">Bootstrap</a> Distribution: <a title="CSS Templates" rel="sponsored" href="https://twitter.com/seventspace/" target="_blank">Seventspace7</a></p>
          </div>
        </div>
    </div>
</footer>
<!-- Footer end -->
