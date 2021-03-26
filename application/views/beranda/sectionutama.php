<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top animate__animated animate__fadeIn animate__delay-1s" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?= base_url('beranda') ?>"><img class="mr-2" src="<?= base_url('assets/img/') ?>sirempel.jpg" width="30" height="30" alt="">SIPROKES</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('beranda') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('beranda/tampilartikel') ?>">Pengumuman</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('beranda/tampilmodul') ?>">Modul</a></li>
                <li class="nav-item"><a class="nav-link btn btn-dark text-white" href="<?= base_url('auth') ?>">LOGIN</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-2 animate__animated animate__fadeInLeft animate__delay-1s">
                <div class="masthead-heading lead">SIPROKES</div>
                <div class="masthead-subheading lead">Membangun solusi untuk membantu pemerintah Indonesia dalam mengingatkan protokol kesehatan</div>
            </div>
            <div class="col-lg-6 animate__animated animate__fadeInRight animate__delay-1s">
                <div class="ml-4" id="mapsing" style="width: 600px; height: 400px;"></div>
            </div>
        </div>
    </div>
</header>
<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase animate__animated animate__fadeIn animate__delay-5s">About</h2>
        </div>
        <div class="row">
            <div class="col-md-6 animate__animated animate__fadeInLeft animate__delay-4s">
                <h2 class="h1">Tentang Kami</h2>
                <p class="h4 lead" style="line-height: 170%;">Kami adalah mahasiswa Mercubuana membantu pihak pemerintah dalam memecahkan solusi dalam penekanan angka positif dan melawan virus Covid-19 pada lingkungan Sekolah Pelayaran untuk menerapkan protokol kesehatan.</p>
            </div>
            <div class="col-md-6 animate__animated animate__fadeInRight animate__delay-4s">
                <img src="<?= base_url('assets/img/') ?>fight.png" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section bg-light" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase animate__animated animate__fadeIn animate__delay-5s">Services</h2>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 animate__animated animate__fadeInRight animate__delay-5s">
                <img src="<?= base_url('assets/img/') ?>remind.png" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-6 pl-5 pt-5 animate__animated animate__fadeInLeft animate__delay-5s">
                <h2 class="p3">Reminder Protokol Kesehatan</h2>
                <p class="h4 lead" style="line-height: 170%;">Mengingatkan Siswa untuk mematuhi protokol kesehatan agar angka positif Covid-19 berkurang di Indonesia</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 animate__animated animate__fadeInLeft animate__delay-5s">
                <h2 class="p3" style="padding-top: 150px;">Monitoring Siswa</h2>
                <p class="h4 lead" style="line-height: 170%;">Memantau siswa dalam menerapkan protokol kesehatan sesuai arahan Menteri Kesehatan.</p>
            </div>
            <div class="col-md-6 animate__animated animate__fadeInRight animate__delay-5s">
                <img src="<?= base_url('assets/img/') ?>monitor.png" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="kontak">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h5 class="text-white">Hubungi kami</h5>
        </div>
        <div class="row text-center mt-5 text-white">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-phone fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Telepon</h4>
                <p class="h5 lead">+628 - 7850701231</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Email</h4>
                <p class="h5 lead">Lorem.ipsum@gmail.com</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-clock fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Jam Operasi</h4>
                <p class="h5 lead">Jam 5.00 - 17.00</p>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg">Copyright © Your Website 2020</div>
        </div>
    </div>
</footer>

<script>
    var mymap = L.map('mapsing').setView([-6.175609, 106.951540], 5);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    }).addTo(mymap);

    <?php foreach ($lokasi as $lk) : ?>
        L.marker([<?= $lk['lat'] ?>, <?= $lk['lng'] ?>]).addTo(mymap)
            .bindPopup("<br><b>Nama Sekolah : </b> <?= $lk['nama_lokasi'] ?><br><b>Alamat Sekolah : </b> <?= $lk['alamat_lokasi'] ?> </b>");
    <?php endforeach; ?>
</script>