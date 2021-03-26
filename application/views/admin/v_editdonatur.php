       <!-- Begin Page Content -->
       <div class="container-fluid">
           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
           <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Tujuan Donasi</a>
           <table class="table table-bordered table-hover" id="myTable">
               <?= $this->session->flashdata('message') ?>
               <thead class="thead-dark text-center">
                   <tr>
                       <th scope="col">ID</th>
                       <th scope="col">Tujuan Donasi</th>
                       <th scope="col">Aksi</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $i = 1; ?>
                   <?php foreach ($tbl_kategori_donasi as $d) : ?>
                       <tr>
                           <th scope="row" class="text-center"><?= $i++ ?></th>
                           <td class="mx-0" class="text-center"><?= $d['tujuan_donasi'] ?></td>
                           <td class="text-center">
                               <a class="btn btn-xs btn-primary" href="<?= base_url() ?>admin/detail_donatur/<?= $d['id_kategori_donasi'] ?>"><i class="far fa-edit"></i></a>
                               <a class="btn btn-xs btn-danger" href="<?= base_url() ?>admin/delete_donatur/<?= $d['id_kategori_donasi'] ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
                           </td>
                       </tr>
                   <?php endforeach; ?>
               </tbody>
           </table>
       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

       <div class="container">
           <div class="row">
               <div class="col-lg">
                   <div class="modal fade mx-auto" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title" id="newRoleModalLabel">Tambah Data Tujuan</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <form action="<?= base_url('admin/kelola_donasi'); ?>" method="post">
                                   <div class="modal-body">
                                       <div class="form-group">
                                           <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan Donasi">
                                       </div>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary">Tambah Data</button>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>