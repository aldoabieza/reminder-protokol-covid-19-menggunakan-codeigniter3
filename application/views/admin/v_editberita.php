<script src="<?= base_url('assets/'); ?>ckeditor/ckeditor.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 col-lg-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="author">Author Berita</label>
                            <input type="hidden" name="id" value="<?= $tbl_berita['id_berita'] ?>" readonly>
                            <input type="text" class="form-control" placeholder="author Berita" id="author" name="author" value="<?= $user['name'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul Berita</label>
                            <input type="text" class="form-control" placeholder="Judul Berita" id="judul" name="judul" value="<?= $tbl_berita['judul_berita'] ?>">
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Choose File</label>
                                <input type="hidden" name="before_path" value="<?= $tbl_berita['gambar_berita'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="isi">Deskripsi Artikel</label>
                            <textarea name="isi" id="editor"><?= $tbl_berita['isi_berita'] ?></textarea>
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