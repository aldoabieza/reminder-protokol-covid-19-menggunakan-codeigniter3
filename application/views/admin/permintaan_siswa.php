        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?php if (empty($request_wamil)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Permintaan tidak ditemukan
                </div>
            <?php endif; ?>

            <div class="row mt-3">
                <div class="row col-md-4 ml-2">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Data Sekolah" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table">

                <?= $this->session->flashdata('message') ?>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Sekolah</th>
                        <th scope="col">Alamat Sekolah</th>
                        <th scope="col">Jumlah Siswa</th>
                        <th scope="col">Kabupaten</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col"><a href="">File upload</a></th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mhs_user as $mu) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td class="mx-0"><?= $mu['nama_sekolah']; ?></td>
                            <td><?= $mu['alamat_sekolah']; ?></td>
                            <td><?= $mu['jml_siswa']; ?></td>
                            <td><?= $mu['kabupaten']; ?></td>
                            <td><?= $mu['kecamatan']; ?></td>
                            <td><?= $mu['tgl_pengajuan'] ?></td>
                            <td>
                                <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_wamil/<?= $rw['id'] ?>" onclick="return confirm('Anda ingin menghapus ?')">Hapus</a>
                                <a class="btn btn-danger mt-2" href="<?= base_url() ?>admin/edit_wamil/<?= $rw['id'] ?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->