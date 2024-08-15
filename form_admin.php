<!-- Admin -->
<section id="contact">
  <style>
        button[type="submit"],
    button[type="reset"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s ease;
    }
    button[type="submit"]:hover,
    button[type="reset"]:hover {
        background-color: #45a049;
    }
  </style>
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h2>Input Data Paket Perjalanan Wisata </h2><br>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="rekap-admin.php" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="id_paket" class="form-label"><b>ID Paket:</b></label>
                    <input type="text" class="form-control" id="id_paket" name="id_paket" required />
                  </div>
                  <div class="mb-3">
                    <label for="nama_paket" class="form-label"><b>Nama Paket:</b></label>
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" required />
                  </div>
                  <div class="mb-3">
                      <label for="harga_paket" class="form-label"><b>Harga Paket:</b></label>
                      <input type="number" class="form-control" id="harga_paket" name="harga_paket" required/>
                  </div>
                  <div class="mb-3">
                      <label for="destinasi" class="form-label"><b>Destinasi:</b></label>
                      <input type="text" class="form-control" id="destinasi" name="destinasi" required/>
                  </div>
                  <div class="mb-3">
                      <label for="lama_perjalanan" class="form-label"><b>Lama Perjalanan:</b></label>
                      <input type="number" class="form-control" id="lama_perjalanan" name="lama_perjalanan" required/>
                  </div>
                  <div class="mb-3">
                      <label for="tgl_berangkat" class="form-label"><b>Tanggal Berangkat:</b></label>
                      <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" required/>
                  </div>
                  <div class="mb-3">
                    <label for="gambar" class="form-label" style="display: flex; align-items: center;"><b>Upload Foto Paket:</b>&nbsp;&nbsp;<i class="fas fa-cloud-upload-alt" style="color: #4CAF50;"></i></label>
                    <input type="hidden" class="form-control" name="MAX_FILE_SIZE" value="5000000"/>
                    <input type="hidden" class="form-control" name="photos" value="fotomu" />
                    <input name="foto" class="form-control" type="file"/><br><br>
                  </div>
                  <div class="form-group">
                    <button type="submit">Submit Data</button>
                    <button type="reset">Hapus Data</button>
                  </div>
                  </form>
            </div>
        </div>
    </div>
   </section>
   <!-- Admin end -->
   <!-- Footer -->
   <footer>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e0f4ff" fill-opacity="1" d="M0,224L48,240C96,256,192,288,288,282.7C384,277,480,235,576,213.3C672,192,768,192,864,197.3C960,203,1056,213,1152,213.3C1248,213,1344,203,1392,197.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <div class="container" sticky-xxl-bottom>
        <div class="row text-center mt-7">
          <div class="col-lg-12">
            <p>Copyright © 2024 <a href="home.php">Vagabondia</a> Travel Co., Ltd. All rights reserved. 
            
            Element source: <a title="CSS Templates" rel="sponsored" href="https://getbootstrap.com/" target="_blank">Boostrap</a> Distribution: <a title="CSS Templatesss" rel="sponsored" href="https://twitter.com/seventspace/" target="_blank">Seventspace7</a></p>
                <br>
        </div>
        </div>
      </div>
   </footer>
   <!-- Footer end -->
