<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 col-lg-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <?= form_open_multipart('admin/tambah_modul') ?>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Modul</label>
                        <input type="text" class="form-control" placeholder="Deskripsi Modul" id="deskripsi" name="deskripsi">
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="modul" name="modul" accept=".pdf">
                            <label class="custom-file-label" for="modul">Upload File Modul</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <?= form_close() ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>