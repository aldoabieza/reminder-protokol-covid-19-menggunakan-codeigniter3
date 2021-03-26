       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
           <table class="table table-bordered table-hover" id="myTable">
               <?= $this->session->flashdata('message') ?>
               <thead class="thead-dark text-center">
                   <tr>
                       <th scope="col">ID</th>
                       <th scope="col">Nama Siswa</th>
                       <th scope="col">Kelas</th>
                       <th scope="col">Jurusan</th>
                       <th scope="col">Pertanyaan</th>
                       <th scope="col">Foto Laporan</th>
                       <th scope="col">Aksi</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $i = 1; ?>
                   <?php foreach ($laporan as $l) : ?>
                       <tr>
                           <th scope="row" class="text-center"><?= $i++ ?></th>
                           <td class="mx-0" class="text-center"><?= $l->name; ?></td>
                           <td style="width: 30%;"><?= $l->kelas; ?></td>
                           <td class="text-center"><?= $l->jurusan; ?></td>
                           <td class="text-center"><?= $l->ask_first; ?></td>
                           <td class="text-center"><?= $l->foto_laporan; ?></td>
                           <td class="text-center">
                               <a class="btn btn-xs btn-primary" href="<?= base_url() ?>admin/detail_laporan/<?= $l->id_laporan ?>"><i class="far fa-edit"></i></a>
                               <a class="btn btn-xs btn-danger" href="<?= base_url() ?>admin/delete_laporan/<?= $l->id_laporan ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
                           </td>
                       </tr>
                   <?php endforeach; ?>
               </tbody>
           </table>
       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->