<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 col-lg-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Modul</label>
                            <input type="hidden" name="id" value="<?= $modul['id_modul'] ?>" readonly>
                            <input type="text" class="form-control" placeholder="Deskripsi Modul" id="deskripsi" name="deskripsi" value="<?= $modul['deskripsi_modul'] ?>">
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="modul" name="modul" accept=".pdf">
                                <label class="custom-file-label" for="modul"><?= $modul['file_modul'] ?></label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>