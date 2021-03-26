<script src="<?= base_url('assets/'); ?>ckeditor/ckeditor.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 col-lg-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <?= form_open_multipart('admin/tambah_berita') ?>
                    <div class="form-group">
                        <label for="author">Author Berita</label>
                        <input type="text" class="form-control" placeholder="author Berita" id="author" name="author" value="<?= $user['name'] ?>" readonly>
                        <?= form_error('author', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" class="form-control" placeholder="Judul Berita" id="judul" name="judul">
                        <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Upload Gambar</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Deskripsi Artikel</label>
                        <textarea name="isi" id="editor"></textarea>
                        <?= form_error('isi', '<small class="text-danger">', '</small>') ?>
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

<script>
    CKEDITOR.replace('isi');
</script>