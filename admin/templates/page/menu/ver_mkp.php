<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Verifikasi Penggunaan Komputer</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pengunaan Komputer</h5>
                </div>

                <div class="container">
                    <?php
                        if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                        {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }
                    ?>
                </div>

                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Menunggu</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Terima</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Tolak</button>
                        </div>
                    </nav>
                    <div class="tab-content mt-4" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="table-responsive">
                                <table class="table table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Pengguna</th>
                                            <th class="text-center">Komputer</th>
                                            <th class="text-center">Tanggal & Waktu Penggunaan</th>
                                            <th>Username</th>
                                            <th class="text-center">Konfirmasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $k = mysqli_query($koneksi, "SELECT * FROM penggunaan_komputer WHERE status='Menunggu'");

                                            foreach($k as $data) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data['nama_pengguna'] ?></td>
                                                <td class="text-center"><?= $data['komputer'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_penggunan'] ?> <?= $data['waktu_penggunan'] ?></td>
                                                <td><?= $data['username'] ?></td>
                                                <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#kon_app<?= $data['id'] ?>" class="btn btn-success"><em class="fas fa-check"></em></a>
                                                </td>
                                                <?php require 'btn/kon_app.php' ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="table-responsive">
                                <table class="table table-hover" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Pengguna</th>
                                            <th class="text-center">Komputer</th>
                                            <th class="text-center">Tanggal & Waktu Penggunaan</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $k = mysqli_query($koneksi, "SELECT * FROM penggunaan_komputer WHERE status='Terima'");

                                            foreach($k as $data) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data['nama_pengguna'] ?></td>
                                                <td class="text-center"><?= $data['komputer'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_penggunan'] ?> <?= $data['waktu_penggunan'] ?></td>
                                                <td><?= $data['username'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="table-responsive">
                                <table class="table table-hover" id="example3">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Pengguna</th>
                                            <th class="text-center">Komputer</th>
                                            <th class="text-center">Tanggal & Waktu Penggunaan</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $k = mysqli_query($koneksi, "SELECT * FROM penggunaan_komputer WHERE status='Tolak'");

                                            foreach($k as $data) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data['nama_pengguna'] ?></td>
                                                <td class="text-center"><?= $data['komputer'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_penggunan'] ?> <?= $data['waktu_penggunan'] ?></td>
                                                <td><?= $data['username'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>