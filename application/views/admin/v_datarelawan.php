       <!-- Begin Page Content -->
       <div class="container-fluid">
           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
           <table class="table table-bordered table-hover" id="myTable">
               <?= $this->session->flashdata('message') ?>
               <thead class="thead-dark text-center">
                   <tr>
                       <th scope="col">ID</th>
                       <th scope="col">Nama</th>
                       <th scope="col">Kelas</th>
                       <th scope="col">Tujuan Donasi</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $i = 1; ?>
                   <?php foreach ($tbl_relawan as $rl) : ?>
                       <tr>
                           <th scope="row" class="text-center"><?= $i++ ?></th>
                           <td class="mx-0" class="text-center"><?= $rl->name ?></td>
                           <td><?= $rl->kelas ?></td>
                           <td><?= $rl->file_relawan ?></td>
                           <td class="text-center">
                               <a class="btn btn-xs btn-primary" href="<?= base_url() ?>admin/detail_donatur/<?= $rl->id_donatur ?>"><i class="far fa-edit"></i></a>
                               <a class="btn btn-xs btn-danger mt-1" href="<?= base_url() ?>admin/delete_donatur/<?= $rl->id_donatur ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
                           </td>
                       </tr>
                   <?php endforeach; ?>
               </tbody>
           </table>
       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->