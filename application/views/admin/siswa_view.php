        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (empty($data_siswa)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Data Permintaan tidak ditemukan
                                </div>
                            <?php endif; ?>

                            <?= form_open_multipart('admin/uploaddata') ?>
                            <div class="form-row">
                                <div class="col-4">
                                    <input type="file" class="form-control-file" id="uploadexcel" name="importexcel" accept=".xls,.xlsx">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                            <?= form_close() ?>

                            <div class="row mt-4">
                                <div class="row ml-2">
                                    <form action="" method="post">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari Data Sekolah" name="keyword">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md ml-4 d-inline">
                                    <a href="<?= base_url('admin/print') ?>" class="btn btn-info float-right px-4 py-2"><i class="fas fa-print"></i>Print</a>
                                    <div class="btn-group dropright d-inline">
                                        <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-file-export"></i>Export File
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="<?= base_url('admin/pdf') ?>">Import to Pdf File</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/excel') ?>">Import to Xls File</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-sm">

                                <?= $this->session->flashdata('message') ?>
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Sekolah</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Asal Sekolah</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_siswa as $s) : ?>
                                        <tr>
                                            <th scope="row"><?= ++$start; ?></th>
                                            <td class="mx-0"><?= $s['nama_siswa']; ?></td>
                                            <td><?= $s['tanggal_lahir']; ?></td>
                                            <td><?= $s['jenis_kelamin']; ?></td>
                                            <td><?= $s['alamat']; ?></td>
                                            <td><?= $s['jurusan']; ?></td>
                                            <td><?= $s['asal_sekolah'] ?></td>
                                            <td>
                                                <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_siswa/<?= $s['id'] ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
                                                <a class="btn btn-primary" href="<?= base_url() ?>admin/edit_siswa/<?= $s['id'] ?>"><i class="far fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->