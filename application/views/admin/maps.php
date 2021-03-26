        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div id="mapid" style=" height: 500px;"></div>

            <div class="card mt-5 col-lg-10 mx-auto">
                <div class="card-header bg-white">
                    <h1 class="h3 text-center mt-2">Input Lokasi</h1>
                </div>
                <div class="card-body mt-2">
                    <form action="<?= base_url('admin/tambah_lokasi') ?>" method="post">
                        <div class="form-group row col-lg">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="nama">Nama Sekolah</label>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Sekolah">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="formGroupExampleInput">Alamat Sekolah</label>
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Sekolah">
                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="Latitude">Latitude</label>
                                <input type="text" class="form-control form-control-user" id="Latitude" name="Latitude" placeholder="Koordinat Latitude" readonly>
                                <?= form_error('Latitude', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <label for="Longitude">Longitude</label>
                                <input type="text" class="form-control form-control-user" id="Longitude" name="Longitude" placeholder="Koordinat Longitude" readonly>
                                <?= form_error('Longitude', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block mt-5 col-lg-7 mx-auto">
                                Tambah Data
                            </button>
                    </form>
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