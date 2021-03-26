<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card">
        <h5 class="card-header"><?= $title; ?></h5>
        <div class="card-body">
            <a href="<?= base_url('admin/tambah_berita') ?>" class="btn btn-primary mb-3">Tambah Berita</a>
            <table class="table table-bordered table-hover" id="myTable">
                <?= $this->session->flashdata('message') ?>
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Berita</th>
                        <th scope="col">Tanggal Berita</th>
                        <th scope="col">Gambar Berita</th>
                        <th scope="col">Author</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1; ?>
                    <?php foreach ($tbl_berita as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $b->judul_berita ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td><?= $b->gambar_berita ?></td>
                            <td><?= $b->name ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?= base_url() ?>admin/edit_berita/<?= $b->id_berita ?>"><i class="far fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" href="<?= base_url() ?>admin/delete_berita/<?= $b->id_berita ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
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