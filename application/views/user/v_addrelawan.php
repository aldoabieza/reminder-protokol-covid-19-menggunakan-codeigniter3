<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card mb-3 col-lg-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <?= form_open_multipart('user/requestrelawan') ?>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="modul" name="modul" accept=".pdf">
                            <label class="custom-file-label" for="modul">Upload Surat Pernyataan Orang Tua</label>
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