<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Catatan</h3>
        </div>
    </div>
    <!-- end title -->

    <div class="row">
        <div class="col-sm-12 col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0 text-black">Catatan Menggunakan PC</h5>
                </div>
                <div class="card-body">
                    <!-- tab -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="menggunakan-tab" data-bs-toggle="tab" data-bs-target="#menggunakan" type="button" role="tab" aria-controls="menggunakan" aria-selected="true">Penggunaan Komputer</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="selesai-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="selesai" aria-selected="false">Selesai Penggunaan</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="menggunakan" role="tabpanel" aria-labelledby="menggunakan-tab">
                            <!-- table catatan penggunaan komputer -->
                            <div class="table-responsive">
                                <table class="table table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Komputer</th>
                                            <th class="text-center">Tanggal & Waktu Penggunaan</th>
                                            <th class="text-center">Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $database = mysqli_query($koneksi, "SELECT * FROM penggunaan_komputer WHERE status='Terima' AND konfirmasi_selesai='Sudah'");
                                            foreach($database as $data) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data['nama_pengguna'] ?></td>
                                            <td><?= $data['komputer'] ?></td>
                                            <td class="text-center"><?= $data['tanggal_penggunan'] ?> <?= $data['waktu_penggunan'] ?></td>
                                            <td class="text-center"><?= $data['username'] ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table catatan penggunaan komputer -->
                        </div>
                        <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                            <!-- table catatan selesai penggunaan komputer -->
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="example2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Komputer</th>
                                            <th>Tanggal & Waktu Penggunaan</th>
                                            <th>Kondisi akhir</th>
                                            <th>Kondisi Akhir</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $db = mysqli_query($koneksi, "SELECT * FROM selesai_penggunaan_komputer WHERE status='Terima'");
                                            while($data = mysqli_fetch_object($db)) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data->nama_pengguna; ?></td>
                                                <td><?= $data->komputer; ?></td>
                                                <td class="text-center"><?= $data->tanggal_penggunaan; ?> <?= $data->waktu_penggunaan; ?> </td>
                                                <td class="text-center">
                                                    <?php 
                                                        if(empty($data->kondisi_awal))
                                                        {

                                                        }
                                                        elseif($data->kondisi_awal == "Baik")
                                                        {
                                                            ?> <p class="badge bg-success">Baik</p> <?php
                                                        }
                                                        elseif($data->kondisi_awal == "Rusak")
                                                        {
                                                            ?> <p class="badge bg-danger">Rusak</p> <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php 
                                                        if(empty($data->kondisi_akhir))
                                                        {

                                                        }
                                                        elseif($data->kondisi_akhir == "Baik")
                                                        {
                                                            ?> <p class="badge bg-success">Baik</p> <?php
                                                        }
                                                        elseif($data->kondisi_akhir == "Rusak")
                                                        {
                                                            ?> <p class="badge bg-danger">Rusak</p> <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center"><?= $data->username; ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>  
                            <!-- end table catatan selesai penggunaan komputer -->
                        </div>
                    </div>
                    <!-- end tab -->
                </div>
            </div>
        </div>
    </div> <!-- .row -->
</div> <!-- .container-fluid .p-0 -->