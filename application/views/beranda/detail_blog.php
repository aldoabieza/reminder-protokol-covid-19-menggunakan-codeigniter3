<img src="<?= base_url('uploads/') . $tbl_berita['gambar_berita'] ?>" class="img-fluid" alt="Responsive image">
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h3>Dirilis tanggal : <?= date('Y-m-d', strtotime($tbl_berita['tgl_berita'])) ?></h3>
            <p class="p3">
                <?= $tbl_berita['isi_berita'] ?>
            </p>
        </div>
    </div>
</div>