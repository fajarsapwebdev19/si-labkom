<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Penggunaan Alat Praktik Lab</h3>
        </div>
    </div>
    <!-- title -->

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Peminjaman Alat Praktik</h5>
                </div> <!-- .card-header -->
                <div class="card-body">

                    <!-- button -->
                    <div class="container mb-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add"><em class="fas fa-plus"></em> Tambah Peminjaman</button>
                    </div> <!-- .container .mb-4 -->
                    <!-- end button -->

                    <!-- notifikasi -->
                    <div class="container mb-4">
                        <?php
                            if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                            {
                                echo $_SESSION['val'];
                                unset($_SESSION['val']);
                            }
                        ?>
                    </div> <!-- .container .mb-4 -->
                    <!-- end notifikasi -->

                    <div class="container">
                        <!-- modal tambah pengajuan -->
                        <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pengajuan Peminjaman Alat Praktik</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../proses/ajukan_peminjaman.php" method="post" autocomplete="off">
                                            <div class="form-group">
                                                <label class="mt-2">Nama Peminjam</label>
                                                <input type="text" name="nama_peminjam" class="form-control mt-3" value="<?= $siswa['nama'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="mt-2">Alat</label>
                                                <select name="alat_yang_dipinjam" class="form-control mt-3">
                                                    <option value="">-- Pilih --</option>
                                                
                                                <?php 
                                                    $q = mysqli_query($koneksi, "SELECT * FROM alat_praktik UNION SELECT * FROM komponen_komputer");
                                                    
                                                    foreach($q as $sub):
                                                ?>
                                                    <option><?= $sub['nama_alat'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mt-2">Jumlah</label>
                                                <input type="text" name="jumlah_alat" class="form-control mt-3">
                                            </div>
                                            <div class="form-group">
                                                <label class="mt-2">Tanggal Peminjaman</label>
                                                <input type="text" name="tanggal_peminjaman" class="form-control mt-3 tgl">
                                            </div>
                                            <div class="form-group">
                                                <label class="mt-2">Waktu Peminjaman</label>
                                                <input type="time" name="waktu_peminjaman" class="form-control mt-3">
                                            </div>
                                            <input type="hidden" name="status" value="Menunggu">
                                            <input type="hidden" name="konfirmasi_selesai" value="Belum">
                                            <input type="hidden" name="username" value="<?= $siswa['username'] ?>">
                                            <div class="modal-footer">
                                                <button type="submit" name="pengajuan" class="btn btn-success">Ajukan Peminjaman</button>
                                                <button data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal tambah pengajuan -->

                        <!-- tab -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="peminjaman-tab" data-bs-toggle="tab" data-bs-target="#peminjaman" type="button" role="tab" aria-controls="peminjaman" aria-selected="true">Peminjaman</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="selesai-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="selesai" aria-selected="false">Konfirmasi Selesai</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Status Pengajuan Selesai</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-4" id="myTabContent">
                            <!-- pengajuan peminjaman alat praktik -->
                            <div class="tab-pane fade show active" id="peminjaman" role="tabpanel" aria-labelledby="peminjaman-tab">
                                    <!-- table -->
                                    <div class="table-responsive">
                                        <table class="table table-hover nowrap" id="example">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>Alat Yang Di Pinjam</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1;
                                                    $username = $siswa['username'];
                                                    $a = mysqli_query($koneksi, "SELECT * FROM peminjaman_alat_praktik WHERE username='$username' AND status='Menunggu'");
                                                    foreach($a as $data) :
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $data['nama_peminjam'] ?></td>
                                                    <td><?= $data['alat_yang_dipinjam'] ?></td>
                                                    <td class="text-center"><?= $data['jumlah_alat'] ?></td>
                                                    <td class="text-center"><?= $data['tanggal_peminjaman'] ?> <?= $data['waktu_peminjaman'] ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if(empty($data['status']))
                                                            {
                                                            
                                                            }
                                                            elseif($data['status'] == "Menunggu")
                                                            {
                                                                ?> <p class="badge bg-warning text-dark">Menunggu</p> <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id'] ?>" class="btn btn-info"><em class="fas fa-pen"></em></a></td>
                                                    <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#delete<?= $data['id'] ?>" class="btn btn-danger"><em class="fas fa-trash"></em></a></td>
                                                    <?php require 'btn/peminjaman_alat.php'; ?>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table -->
                            </div>
                            <!-- end pengajuan peminjaman alat praktik -->

                            <!-- konfirmasi selesai -->
                            <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                                <!-- table konfirmasi selesai -->
                                <div class="table-responsive">
                                    <table class="table table-hover nowrap" id="example2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Peminjam</th>
                                                <th>Alat Yang Dipinjam</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                                <th class="text-center">Konfirmasi Selesai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1; 
                                                $s = mysqli_query($koneksi, "SELECT * FROM peminjaman_alat_praktik WHERE username='$username' AND konfirmasi_selesai='Belum' AND status='Terima'");
                                                foreach($s as $data) :
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data['nama_peminjam'] ?></td>
                                                <td><?= $data['alat_yang_dipinjam'] ?></td>
                                                <td class="text-center"><?= $data['jumlah_alat'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_peminjaman'] ?> <?= $data['waktu_peminjaman'] ?></td>
                                                <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#kon_selesai<?= $data['id'] ?>" class="btn btn-success"><em class="fas fa-check"></em></a></td>
                                                <?php require 'btn/peminjaman_alat.php'; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table konfirmasi selesai -->
                            </div>
                            <!-- end konfirmasi selesai -->

                            <!-- status pengajuan -->
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="example3">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Peminjam</th>
                                                <th class="text-center">Alat Yang Dipinjam</th>
                                                <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $p = mysqli_query($koneksi, "SELECT * FROM selesai_peminjaman_alat WHERE status_admin='Terima' AND username='$username'");
                                                foreach($p as $data) :
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $data['nama_peminjam'] ?></td>
                                                    <td class="text-center"><?= $data['alat_yang_dipinjam'] ?></td>
                                                    <td class="text-center"><?= $data['tanggal_peminjaman'] ?> <?= $data['waktu_peminjaman'] ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if(empty($data['status']))
                                                            {}
                                                            elseif($data['status'] == "Menunggu"){
                                                                ?> <p class="badge bg-warning text-dark">Menunggu</p> <?php
                                                            }elseif($data['status'] == "Tolak"){
                                                                ?> <p class="badge bg-danger">Tolak</p> <?php
                                                            }elseif($data['status'] == "Terima"){
                                                                ?> <p class="badge bg-success">Terima</p> <?php
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end status pengajuan -->
                        </div>
                        <!-- end tab -->
                    </div> <!-- .container -->
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div> <!-- .col-sm-12 .col-md-12 -->
    </div> <!-- .row -->
</div>