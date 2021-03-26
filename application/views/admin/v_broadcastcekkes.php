<script src="<?= base_url('assets/'); ?>ckeditor/ckeditor.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 col-lg-10 mx-auto">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <?= form_open('admin/sendEmailCekkes/' . $cekkes['id_cekkes']) ?>

                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" placeholder="Nama Siswa" id="nama" name="nama" value="<?= $use['name'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Email Pengguna" id="email" name="email" value="<?= $use['email'] ?>" readonly>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="p1">Apakah anda mengalami demam diatas suhu 38 derajat ?</label>
                        <input type="text" class="form-control" placeholder="p1" id="p1" name="p1" value="<?= $cekkes['ask_first'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="p2">Apakah anda sekarang mengalami riwayat penyakit batuk ?</label>
                        <input type="text" class="form-control" placeholder="p2" id="p2" name="p2" value="<?= $cekkes['ask_second'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="p3">Apakah anda merasa sesak di dada atau kesulitan dalam mengambil pernapasan ?</label>
                        <input type="text" class="form-control" placeholder="p3" id="p3" name="p3" value="<?= $cekkes['ask_third'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="p4">Apakah dalam kegiatan setiap hari anda berinteraksi secara langsung dengan seseorang yang terjangkit virus corona ? (seperti : berjabat tangan, mengobrol lama didalam suatu ruangan) dalam 14 hari sebelumnya ?</label>
                        <input type="text" class="form-control" placeholder="p4 Pengguna" id="p4" name="p4" value="<?= $cekkes['ask_fourth'] ?>" readonly>
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