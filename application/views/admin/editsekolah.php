   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div id="mapid" style=" height: 500px;"></div>
       <div class="row">
           <div class="col-lg">
               <div class="card mb-3 col-lg-10 mx-auto mt-5">
                   <h5 class="card-header col-lg text-center"><?= $title; ?></h5>
                   <div class="card-body">
                       <form action="" method="post">
                           <div class="form-row">
                               <div class="col-md-6">
                                   <input type="hidden" name="id" value="<?= $lokasi['id_lokasi'] ?>">
                                   <div class="form-group">
                                       <label for="nama">Nama Lokasi</label>
                                       <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Sekolah" value="<?= $lokasi['nama_lokasi']; ?>">
                                   </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="alamat">Alamat Lokasi</label>
                                       <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lokasi" value="<?= $lokasi['alamat_lokasi']; ?>">
                                   </div>
                               </div>
                           </div>

                           <div class="form-row">

                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="Latitude">Latitude</label>
                                       <input type="text" class="form-control form-control-user" id="Latitude" name="Latitude" placeholder="Latitude" value="<?= $lokasi['lat']; ?>">
                                   </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="Longitude">Longitude</label>
                                       <input type="text" class="form-control form-control-user" id="Longitude" name="Longitude" placeholder="Longitude" value="<?= $lokasi['lng']; ?>">
                                   </div>
                               </div>
                           </div>
                           <button type="submit" class="btn btn-primary mb-3 float-right">Ubah Data</button>
                       </form>
                   </div>

               </div>
           </div>
       </div>
   </div>
   <!-- /.container-fluid -->

   </div>

   <script>
       var mymap = L.map('mapid').setView([-6.175609, 106.951540], 16);
       L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
           attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
               '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
               'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
           id: 'mapbox/streets-v11'
       }).addTo(mymap);

       var marker;

       var updateMarker = function(lat, lng) {
           if (marker) {
               marker.setLatLng([lat, lng]);
           } else {
               marker = L.marker([lat, lng]).addTo(mymap);
               return false;
           }
       };
       var updateMarkerByInputs = function() {
           return updateMarker($('#latInput').val(), $('#lngInput').val());
       }
       $('#Latitude').on('input', updateMarkerByInputs);
       $('#Longitude').on('input', updateMarkerByInputs);

       mymap.on('click', function(e) {
           $('#Latitude').val(e.latlng.lat);
           $('#Longitude').val(e.latlng.lng);
           updateMarker(e.latlng.lat, e.latlng.lng);
       });
   </script>
   <!-- End of Main Content -->