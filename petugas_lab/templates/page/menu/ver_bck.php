<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Verifikasi Peminjaman</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-black">Verifikasi Pengajuan Selesai Menggunakan Alat</h5>
                </div>

                <!-- pesan -->
                <div class="container mt-4">
                <?php
                    if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                    {
                        echo $_SESSION['val'];
                        unset($_SESSION['val']);
                    }
                ?>
                </div>
                <!-- end pesan -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="example">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Alat Yang Dipinjam</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $d = mysqli_query($koneksi, "SELECT * FROM selesai_peminjaman_alat WHERE status='Menunggu'");
                                    foreach($d as $data) :
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $data['nama_peminjam'] ?></td>
                                        <td><?= $data['alat_yang_dipinjam'] ?></td>
                                        <td><?= $data['jumlah_alat'] ?></td>
                                        <td class="text-center"><?= $data['tanggal_peminjaman'] ?> <?= $data['waktu_peminjaman'] ?></td>
                                        <td class="text-center"><?= $data['username'] ?></td>
                                        <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#konfirmasi_admin<?= $data['id'] ?>" class="btn btn-success"><em class="fas fa-check"></em></a></td>
                                        <?php require 'btn/acc_peminjaman.php'; ?>
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