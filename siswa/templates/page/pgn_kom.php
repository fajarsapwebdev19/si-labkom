<div class="container-fluid p-0">
    <!-- Title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Penggunaan Komputer</h3>
        </div>
    </div>
    <!-- End Title -->

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                <h5 class="card-title">Penggunaan Komputer</h5>
                </div>
                <div class="card-body">
                    <div class="container mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                            <em class="fas fa-plus"></em> Tambah Penggunaan
                        </button>
                    </div>

                    <div class="container mb-4">
                        <?php
                            if(isset($_SESSION['val']) && $_SESSION['val'] !="")
                            {
                                echo $_SESSION['val'];
                                unset($_SESSION['val']);
                            }
                        ?>
                    </div>

                    <div class="container">
                        <!-- modal tambah data -->

                        <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Penggunaan Komputer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                            $q = mysqli_query($koneksi, "SELECT * FROM pc");
                                        ?>
                                        <form action="../proses/add_pemkom.php" method="post">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Nama Pengguna</label>
                                                <input type="text" name="nama_pengguna" class="form-control mb-2" value="<?= $siswa['nama'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mb-2">Komputer</label>
                                                <select name="komputer" class="form-control mb-2">
                                                    <option value="">-- Pilih --</option>
                                                <?php while($sub = mysqli_fetch_assoc($q)) : ?>
                                                    <option><?= $sub['nama_pc'] ?></option>
                                                <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mb-2">Tanggal Penggunaan</label>
                                                <input type="text" name="tanggal_penggunaan" class="form-control tgl">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mb-2">Waktu Penggunaan</label>
                                                <input type="time" name="waktu_penggunaan" class="form-control">
                                            </div>
                                            <input type="hidden" name="status" value="Menunggu">
                                            <input type="hidden" name="username" value="<?= $siswa['username'] ?>">
                                            <input type="hidden" name="konfirmasi_selesai" value="Belum">
                                            <div class="modal-footer">
                                                <button type="submit" name="ajukan" class="btn btn-primary">Ajukan</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- end modal tambah data -->

                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="penggunaan-tab" data-bs-toggle="tab" data-bs-target="#penggunaan" type="button" role="tab" aria-controls="penggunaan" aria-selected="true">Penggunaan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="konfir-tab" data-bs-toggle="tab" data-bs-target="#konfir" type="button" role="tab" aria-controls="konfir" aria-selected="false">Konfirmasi Selesai</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pengajuan_selesai-tab" data-bs-toggle="tab" data-bs-target="#pengajuan_selesai" type="button" role="tab" aria-controls="pengajuan_selesai" aria-selected="false">Pengajuan Selesai</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- tab halaman penggunaan -->
                            <div class="tab-pane fade show active mb-4 mt-4" id="penggunaan" role="tabpanel" aria-labelledby="penggunaan-tab">
                                <div class="table-responsive">
                                    <table class="table table-responsive nowrap" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Pengguna</th>
                                                <th class="text-center">Komputer</th>
                                                <th class="text-center">Tanggal & Waktu Penggunaan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Update</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- query data -->
                                            <?php
                                                $no = 1;
                                                $username = $siswa['username'];
                                                $sql = "SELECT * FROM penggunaan_komputer WHERE status='Menunggu' AND username='$username' UNION SELECT * FROM penggunaan_komputer WHERE status='Tolak' AND username='$username'";
                                                $q = mysqli_query($koneksi, $sql);

                                                foreach($q as $data) :
                                            ?>
                                            <!-- end query data -->
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data['nama_pengguna'] ?></td>
                                                <td class="text-center"><?= $data['komputer'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_penggunan'] ?> <?= $data['waktu_penggunan'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                        if(empty($data['status']))
                                                        {

                                                        }
                                                        elseif($data['status'] == "Menunggu")
                                                        {
                                                            ?>
                                                                <p class="badge bg-warning text-dark">
                                                                    Menunggu
                                                                </p>
                                                            <?php
                                                        }elseif($data['status'] == "Tolak")
                                                        {
                                                            ?>
                                                                <p class="badge bg-danger">
                                                                   Tolak
                                                                </p>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#update_pengajuan<?= $data['id']?>" class="btn btn-info"><em class="fas fa-pen"></em></a></td>
                                                <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#delete_pengajuan<?= $data['id'] ?>" class="btn btn-danger"><em class="fas fa-trash"></em></a></td>
                                                <?php require 'btn/pengajuan_komputer.php'; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end tab halaman penggunaan -->

                            <!-- tab halaman konfirmasi -->
                            <div class="tab-pane fade mb-4 mt-4" id="konfir" role="tabpanel" aria-labelledby="konfir-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="example2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Pengguna</th>
                                                <th class="text-center">Komputer</th>
                                                <th class="text-center">Tanggal & Waktu Penggunaan</th>
                                                <th class="text-center">Konfirmasi Selesai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- query data -->
                                            <?php
                                                $no = 1;
                                                $sql = "SELECT * FROM penggunaan_komputer WHERE status='Terima' AND username='$username' AND konfirmasi_selesai='Belum'";
                                                $s = mysqli_query($koneksi, $sql);
                                                foreach($s as $data) :
                                            ?>
                                            <!-- end query data -->
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $data['nama_pengguna'] ?></td>
                                                    <td class="text-center"><?= $data['komputer'] ?></td>
                                                    <td class="text-center"><?= $data['tanggal_penggunan'] ?> <?= $data['waktu_penggunan'] ?></td>
                                                    <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#kon_selesai<?= $data['id'] ?>" class="btn btn-success"><em class="fas fa-check"></em></a></td>
                                                    <?php require 'btn/pengajuan_komputer.php'; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- akhir halaman konfirmasi -->

                            <!-- tab halaman pengajuan selesai -->
                            <div class="tab-pane fade mb-4 mt-4" id="pengajuan_selesai" role="tabpanel" aria-labelledby="pengajuan_selesai-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover nowrap" id="example3">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Pengguna</th>
                                                <th class="text-center">Komputer</th>
                                                <th class="text-center">Tanggal & Waktu Penggunaan</th>
                                                <th class="text-center">Status Pengajuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $d = mysqli_query($koneksi, "SELECT * FROM selesai_penggunaan_komputer WHERE username='$username'");
                                                foreach($d as $data):
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $data['nama_pengguna'] ?></td>
                                                    <td class="text-center"><?= $data['komputer'] ?></td>
                                                    <td class="text-center"><?= $data['tanggal_penggunaan'] ?> <?= $data['waktu_penggunaan'] ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if(empty($data['status']))
                                                            {

                                                            }
                                                            elseif($data['status'] == "Terima"){
                                                                ?> <p class="badge bg-success">Terima</p> <?php
                                                            }elseif($data['status'] == "Menunggu"){
                                                                ?> <p class="badge bg-warning text-dark">Menunggu</p> <?php
                                                            }elseif($data['status'] == "Tolak"){
                                                                ?> <p class="badge badge-danger">Tolak</p> <?php
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- tab halaman pengajuan selesai -->
                        </div> <!-- .tab-content -->
                    </div> <!-- .container -->
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div> <!-- .col-sm-12 .col-md-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid .p-0 -->