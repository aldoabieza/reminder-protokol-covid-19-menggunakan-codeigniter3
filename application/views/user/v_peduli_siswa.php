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

                            <?= form_open_multipart('user/pedulisiswa') ?>
                            <label for="nominal">Nominal Donasi <small class="text-danger">*Ketikkan nominal saja contoh : 15000</small></label>
                            <input type="text" class="form-control form-control-user" id="nominal" name="nominal" placeholder="Nominal Donasi">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>

                            <label class="mt-4" for="tujuan">Tujuan Donasi</label>
                            <select class="custom-select" id="tujuan" name="tujuan">
                                <?php foreach ($tbl_kategori_donasi as $k) : ?>
                                    <option value="<?= $k['id_kategori_donasi'] ?>"><?= $k['tujuan_donasi'] ?></option>
                                    <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                <?php endforeach; ?>
                            </select>

                            <div class="form-group mt-4">
                                <label>Tanda Bukti Transfer</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar">Upload Tanda Bukti Transfer</label>
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