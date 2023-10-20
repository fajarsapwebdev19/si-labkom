<div class="container-fluid p-0">
    
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-block d-sm-block">
            <h3>Verifikasi Peminjaman</h3>
        </div>
    </div>
    <!-- end title -->

    <div class="row">
        <div class="col-sm 12 col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-black">Verifikasi Peminjaman Alat Praktik</h5>
                </div>
                <div class="card-body">
                    <!-- pesan -->
                    <?php
                        if(isset($_SESSION['val']) && $_SESSION['val'] !="")
                        {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        } 
                    ?>
                    <!-- end pesan -->

                    <!-- tab -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="menunggu-tab" data-bs-toggle="tab" data-bs-target="#menunggu" type="button" role="tab" aria-controls="menunggu" aria-selected="true">Menunggu</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="terima-tab" data-bs-toggle="tab" data-bs-target="#terima" type="button" role="tab" aria-controls="profile" aria-selected="false">Terima</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tolak-tab" data-bs-toggle="tab" data-bs-target="#tolak" type="button" role="tab" aria-controls="contact" aria-selected="false">Tolak</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="menunggu" role="tabpanel" aria-labelledby="menunggu-tab">
                            <!-- table status menunggu-->
                            <div class="table-responsive">
                                <table class="table table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Alat Yang Di Pinjam</th>
                                            <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Konfirmasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $q = mysqli_query($koneksi, "SELECT * FROM peminjaman_alat_praktik WHERE status='Menunggu'");
                                            foreach($q as $data) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $data['nama_peminjam'] ?></td>
                                            <td><?= $data['alat_yang_dipinjam'] ?></td>
                                            <td class="text-center"><?= $data['tanggal_peminjaman'] ?> <?= $data['waktu_peminjaman'] ?></td>
                                            <td class="text-center"><?= $data['username'] ?></td>
                                            <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#konfir_admin<?= $data['id'] ?>" class="btn btn-success"><em class="fas fa-check"></em></a></td>
                                            <?php require 'btn/acc_peminjaman.php'; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table status menunggu -->
                        </div>
                        <div class="tab-pane fade" id="terima" role="tabpanel" aria-labelledby="terima-tab">
                            <!-- table status terima-->
                            <div class="table-responsive">
                                <table class="table table-hover" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Alat Yang Dipinjam</th>
                                            <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                            <th class="text-center">Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $q = mysqli_query($koneksi, "SELECT * FROM peminjaman_alat_praktik WHERE status='Terima'");
                                            foreach($q as $data):
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data['nama_peminjam'] ?></td>
                                                <td><?= $data['alat_yang_dipinjam'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_peminjaman'] ?> <?= $data['waktu_peminjaman'] ?></td>
                                                <td class="text-center"><?= $data['username'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table status terima-->
                        </div>
                        <div class="tab-pane fade" id="tolak" role="tabpanel" aria-labelledby="tolak-tab">
                            <!-- table status tolak-->
                            <div class="table-responsive">
                                <table class="table table-hover" id="example3">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Alat Yang Dipinjam</th>
                                            <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                            <th class="text-center">Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $q = mysqli_query($koneksi, "SELECT * FROM peminjaman_alat_praktik WHERE status='Tolak'");
                                            foreach($q as $data):
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data['nama_peminjam'] ?></td>
                                                <td><?= $data['alat_yang_dipinjam'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_peminjaman'] ?> <?= $data['waktu_peminjaman'] ?></td>
                                                <td class="text-center"><?= $data['username'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table status tolak-->
                        </div>
                    </div>
                    <!-- end tab -->
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div> <!-- .col-sm-12 .col-md-12 .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid .p-0 -->