<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card">
        <h5 class="card-header"><?= $title; ?></h5>
        <div class="card-body">
            <a href="<?= base_url('admin/tambah_modul') ?>" class="btn btn-primary mb-3">Tambah Modul</a>
            <table class="table table-bordered table-hover" id="myTable">
                <?= $this->session->flashdata('message') ?>
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Deskripsi Modul</th>
                        <th scope="col">File Modul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1; ?>
                    <?php foreach ($modul as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $m['deskripsi_modul'] ?></td>
                            <td><?= $m['file_modul'] ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?= base_url() ?>admin/edit_modul/<?= $m['id_modul'] ?>"><i class="far fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" href="<?= base_url() ?>admin/delete_modul/<?= $m['id_modul'] ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
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