<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?= base_url('beranda') ?>">SIPROKES</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('beranda') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('beranda/tampilartikel') ?>">Pengumuman</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('beranda/tampilmodul') ?>">Modul</a></li>
                <li class="nav-item"><a class="nav-link btn btn-dark text-white" href="<?= base_url('auth') ?>">LOGIN</a></li>
            </ul>
        </div>
    </div>
</nav>
<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="masthead-heading">Pengumuman</div>
                <div class="masthead-subheading">Temukan pengumuman terupdate dan terpercaya seputar sekolah pelayaran disini</div>
            </div>
        </div>
    </div>
</header>
<section class="page-section" id="about">
    <div class="container">
        <div class="row mb-2">
            <?php foreach ($tbl_berita as $b) : ?>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">Created By : <?= $b->name ?></strong>
                            <h3 class="mb-0">
                                <p class="text-dark"><?= $b->judul_berita ?></p>
                            </h3>
                            <div class="mb-1 text-muted"><?= date('Y-m-d', strtotime($b->tgl_berita)) ?></div>
                            <p class="card-text mb-auto h-25"><?= substr($b->isi_berita, 0, 50) ?></p>
                            <a href="<?= base_url() ?>beranda/detail_artikel/<?= $b->id_berita ?>">Lanjut Baca ...</a>
                        </div>
                        <img style="width: 250px; height:250px;" class="card-img-right flex-auto d-none d-md-block" src="<?= base_url('uploads/') . $b->gambar_berita ?>" alt="Card image cap">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</section>
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg">Copyright © Your Website 2020</div>
        </div>
    </div>
</footer>