       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

           <a href="<?= base_url('admin/tambah_lokasi') ?>" class="btn btn-primary mb-3">Tambah Lokasi</a>
           <table class="table table-bordered table-hover" id="myTable">
               <?= $this->session->flashdata('message') ?>
               <thead class="text-center">
                   <tr>
                       <th scope="col">ID</th>
                       <th scope="col">Nama Lokasi</th>
                       <th scope="col">Alamat Lokasi</th>
                       <th scope="col">Latitude</th>
                       <th scope="col">Longitude</th>
                       <th scope="col">Aksi</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $i = 1; ?>
                   <?php foreach ($lokasi as $lk) : ?>
                       <tr>
                           <th scope="row" class="text-center"><?= $i++ ?></th>
                           <td class="mx-0" class="text-center"><?= $lk['nama_lokasi']; ?></td>
                           <td style="width: 30%;"><?= $lk['alamat_lokasi']; ?></td>
                           <td class="text-center"><?= $lk['lat']; ?></td>
                           <td class="text-center"><?= $lk['lng']; ?></td>
                           <td class="text-center">
                               <a class="btn btn-danger" href="<?= base_url() ?>admin/delete_lokasi/<?= $lk['id_lokasi'] ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
                               <a class="btn btn-success" href="<?= base_url() ?>admin/edit_lokasi/<?= $lk['id_lokasi'] ?>"><i class="far fa-edit"></i></a>
                           </td>
                       </tr>
                   <?php endforeach; ?>
               </tbody>
           </table>
       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->