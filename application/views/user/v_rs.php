       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
           <table class="table table-bordered table-hover" id="myTable">
               <?= $this->session->flashdata('message') ?>

               <thead class="thead-dark text-center">
                   <tr>
                       <th scope="col">ID</th>
                       <th scope="col">Nama RS</th>
                       <th scope="col">Alamat RS</th>
                       <th scope="col">Wilayah RS</th>
                       <th scope="col">No. Telepon</th>
                       <th scope="col">Provinsi</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $i = 1; ?>
                   <?php foreach ($tbl_rs as $rs) : ?>
                       <tr>
                           <th scope="row" class="text-center"><?= $i++ ?></th>
                           <td class="mx-0" class="text-center"><?= $rs['nama_rs']; ?></td>
                           <td style="width: 30%;"><?= $rs['alamat_rs']; ?></td>
                           <td class="text-center"><?= $rs['wilayah_rs']; ?></td>
                           <td class="text-center"><?= $rs['no_telepon']; ?></td>
                           <td class="text-center"><?= $rs['provinsi_rs']; ?></td>
                       </tr>
                   <?php endforeach; ?>
               </tbody>
           </table>
       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->