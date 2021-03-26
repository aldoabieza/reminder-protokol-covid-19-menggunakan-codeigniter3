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
                <div class="masthead-heading">Modul Protokol Kesehatan</div>
                <div class="masthead-subheading">Panduan dalam menerapkan protokol kesehatan pada siswa agar terhindar virus Covid-19</div>
            </div>
        </div>
    </div>
</header>
<section class="page-section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="myTable">
                        <?= $this->session->flashdata('message') ?>
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Deskripsi Modul</th>
                                <th scope="col">File Modul</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $i = 1; ?>
                            <?php foreach ($modul as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $m['deskripsi_modul'] ?></td>
                                    <td><?= $m['file_modul'] ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-danger" href="<?= base_url('beranda/download_berkas/') ?><?= $m['id_modul'] ?>"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
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