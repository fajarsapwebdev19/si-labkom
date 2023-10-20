<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Riwayat Penggunaan</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <!-- card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0 text-black">
                        Riwayat Peminjaman Alat Komputer
                    </h5>
                </div>
                <div class="card-body">
                    <!-- tab -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Penggunaan Komputer</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Peminjaman Alat</button>
                        </li>
                        
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Pengguna</th>
                                            <th class="text-center">Komputer</th>
                                            <th class="text-center">Tanggal & Waktu Penggunaan</th>
                                            <td class="text-center">Kondisi Awal</td>
                                            <td class="text-center">Kondisi Akhir</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $username = $siswa['username'];
                                            $q = mysqli_query($koneksi, "SELECT * FROM selesai_penggunaan_komputer WHERE status='Terima' AND konfirmasi_selesai='Sudah' AND username='$username'");
                                            
                                            foreach($q as $data) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data['nama_pengguna']; ?></td>
                                                <td class="text-center"><?= $data['komputer'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_penggunaan'] ?> <?= $data['waktu_penggunaan'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                        if(empty($data['kondisi_awal']))
                                                        {

                                                        }
                                                        elseif($data['kondisi_awal'] == "Baik")
                                                        {
                                                            ?> <p class="badge bg-success">Baik</p> <?php
                                                        }
                                                        elseif($data['kondisi_awal'] == "Rusak")
                                                        {
                                                            ?> <p class="badge bg-danger">Rusak</p> <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                        if(empty($data['kondisi_akhir']))
                                                        {

                                                        }
                                                        elseif($data['kondisi_akhir'] == "Baik")
                                                        {
                                                            ?> <p class="badge bg-success">Baik</p> <?php
                                                        }
                                                        elseif($data['kondisi_akhir'] == "Rusak")
                                                        {
                                                            ?> <p class="badge bg-danger">Rusak</p> <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table table-hover nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Peminjam</th>
                                    <th class="text-center">Alat Yang Dipinjam</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                    <th class="text-center">Kondisi Awal</th>
                                    <th class="text-center">Kondisi Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $q = mysqli_query($koneksi, "SELECT * FROM selesai_peminjaman_alat WHERE username='$username' AND status='Terima'");
                                    foreach($q as $data):
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $data['nama_peminjam'] ?></td>
                                        <td><?= $data['alat_yang_dipinjam'] ?></td>
                                        <td class="text-center"><?= $data['jumlah_alat'] ?></td>
                                        <td class="text-center"><?= $data['tanggal_peminjaman'] ?> <?= $data['waktu_peminjaman'] ?></td>
                                        <td class="text-center">
                                            <?php
                                                if(empty($data['kondisi_awal']))
                                                {

                                                }
                                                elseif($data['kondisi_awal'] == "Baik")
                                                {
                                                    ?> <p class="badge bg-success">Baik</p> <?php
                                                }
                                                elseif($data['kondisi_awal'] == "Rusak")
                                                {
                                                    ?> <p class="badge bg-danger">Rusak</p> <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                if(empty($data['kondisi_akhir']))
                                                {

                                                }
                                                elseif($data['kondisi_akhir'] == "Baik")
                                                {
                                                    ?> <p class="badge bg-success">Baik</p> <?php
                                                }
                                                elseif($data['kondisi_akhir'] == "Rusak")
                                                {
                                                    ?> <p class="badge bg-danger">Rusak</p> <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end tab -->
                </div>
            </div>
        </div>
    </div>
</div>