<script src="<?= base_url('assets/'); ?>ckeditor/ckeditor.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 col-lg-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $tbl_rs['id_rs'] ?>">
                        <div class="form-group">
                            <label for="nama">Nama Rumah Sakit</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $tbl_rs['nama_rs'] ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Rumah Sakit</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $tbl_rs['alamat_rs'] ?>">
                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="wilayah">Wilayah Rumah Sakit</label>
                            <input type="text" class="form-control" id="wilayah" name="wilayah" value="<?= $tbl_rs['wilayah_rs'] ?>">
                            <?= form_error('wilayah', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="notelp">No. Telepon</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $tbl_rs['no_telepon'] ?>">
                            <?= form_error('notelp', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $tbl_rs['provinsi_rs'] ?>">
                            <?= form_error('provinsi', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>

<script>
    CKEDITOR.replace('isi');
</script>