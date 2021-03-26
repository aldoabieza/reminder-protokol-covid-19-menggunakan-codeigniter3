<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mb-5">
                <div class="card-header">
                    <h1 class="h3 text-black"><?= $title; ?></h1>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= form_open_multipart('user/laporan_harian') ?>
                            <label>1. Apakah kamu sudah menerapkan protokol kesehatan sesuai reminder yang kami berikan ?</label>
                            <select class="custom-select" id="first" name="first">
                                <option selected>Pilih jawaban</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                                <?= form_error('first', '<small class="text-danger pl-3">', '</small>'); ?>
                            </select>
                            <div class="form-group mt-5">
                                <label>Upload Gambar dibawah ini untuk bukti bahwa kamu sudah mematuhi protokol kesehatan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar" accept=".jpg">
                                    <label class="custom-file-label" for="gambar">Upload Gambar</label>
                                    <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right mt-4">Tambah Data</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->