        <!-- Begin Page Content -->
        <div class="container">
            <div class="card">
                <h5 class="card-header"><?= $title; ?></h5>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="myTable">
                        <?= $this->session->flashdata('message') ?>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tanggal Konsul</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($konsultasi_siswa as $ks) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $ks->name ?></td>
                                    <td><?= $ks->kelas ?></td>
                                    <td><?= $ks->jurusan ?></td>
                                    <td><?= $ks->jkel ?></td>
                                    <td style="width:30%"><?= $ks->keterangan_konsul; ?></td>
                                    <td><?= $ks->tanggal_konsul; ?></td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= base_url() ?>admin/delete_konsul/<?= $ks->id ?>" onclick="return confirm('Anda ingin menghapus ?')">Hapus</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>admin/sendEmailKonsul/<?= $ks->id ?>">Kirim Email</a>
                                            </div>
                                        </div>
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