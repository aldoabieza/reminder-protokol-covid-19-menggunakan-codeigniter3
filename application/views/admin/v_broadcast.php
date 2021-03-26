<script src="<?= base_url('assets/'); ?>ckeditor/ckeditor.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 col-lg-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <?= form_open('admin/sendEmail/' . $pengguna['id_user']) ?>

                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" placeholder="Nama Siswa" id="nama" name="nama" value="<?= $pengguna['name'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Email Pengguna" id="email" name="email" value="<?= $pengguna['email'] ?>" readonly>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" placeholder="Subject Email" id="subject" name="subject">
                        <?= form_error('subject', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="isi">Deskripsi Email</label>
                        <textarea name="isi" id="editor"></textarea>
                        <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Email</button>
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