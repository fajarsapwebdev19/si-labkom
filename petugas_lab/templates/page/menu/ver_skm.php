<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Verifikasi Peminjaman</h3>
        </div>
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

    <div class="row">
        <div class="col-sm-12 col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Verifikasi Selesai Menggunakan Komputer</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover nowrap" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Komputer</th>
                                    <th>Tanggal & Waktu Penggunaan</th>
                                    <th>Status</th>
                                    <th>Username</th>
                                    <th>Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $d = mysqli_query($koneksi, "SELECT * FROM selesai_penggunaan_komputer WHERE status='Menunggu'");
                                    while($data = mysqli_fetch_assoc($d)) :
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_pengguna'] ?></td>
                                    <td><?= $data['komputer'] ?></td>
                                    <td><?= $data['tanggal_penggunaan'] ?> <?= $data['waktu_penggunaan'] ?></td>
                                    <td><?= $data['status'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><a href="#" class="btn btn-success" data-bs-target="#konfir<?= $data['id'] ?>" data-bs-toggle="modal"><em class="fas fa-check"></em></a></td>
                                    <?php require 'btn/kon_kom.php';  ?>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div> <!-- .table-responsive -->
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div> <!-- .col-sm-12 .col-md-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid .p-0 -->