<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card">
        <h5 class="card-header"><?= $title; ?></h5>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="myTable">
                <?= $this->session->flashdata('message') ?>
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Email Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1; ?>
                    <?php foreach ($pengguna as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $u->name ?></td>
                            <td><?= $u->email ?></td>
                            <td><?= $u->kelas ?></td>
                            <td><?= $u->jurusan ?></td>
                            <td>
                                <a class="btn btn-xs btn-danger" href="<?= base_url() ?>admin/sendEmail/<?= $u->id_user ?>"><i class="far fa-envelope"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->