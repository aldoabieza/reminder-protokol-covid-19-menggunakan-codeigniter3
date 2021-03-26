        <!-- Begin Page Content -->
        <div class="container">
            <div class="card">
                <h5 class="card-header"><?= $title; ?></h5>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="myTable">
                        <?= $this->session->flashdata('message') ?>
                        <thead class="text-center thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">P1</th>
                                <th scope="col">P2</th>
                                <th scope="col">P3</th>
                                <th scope="col">P4</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($cekkes as $c) : ?>
                                <tr>
                                    <th scope="row" class="text-center" style="width: 1%;"><?= $i++ ?></th>
                                    <td class="text-center"><?= $c->ask_first ?></td>
                                    <td class="text-center"><?= $c->ask_second ?></td>
                                    <td class="text-center"><?= $c->ask_third ?></td>
                                    <td class="text-center"><?= $c->ask_fourth ?></td>
                                    <td class="text-center"><?= $c->name; ?></td>
                                    <td class="text-center"><?= $c->kelas; ?></td>
                                    <td style="width: 10%;" class="text-center"><?= $c->jurusan; ?></td>
                                    <td style="width: 11%;">
                                        <a class="btn btn-primary" href="<?= base_url() ?>admin/delete_cekkes/<?= $c->id_cekkes ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
                                        <a class="btn btn-xs btn-danger" href="<?= base_url() ?>admin/sendEmailCekkes/<?= $c->id_cekkes ?>"><i class="far fa-envelope"></i></a>
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