<div class="container-fluid p-0">
    <!-- Title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Rekap Data</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">

                <!-- card header -->
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: black;">Komponen Komputer</h5>
                </div>

                <!-- container validation alert -->
                

                <!-- card body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover nowrap" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alat</th>
                                    <th>Jenis Alat</th>
                                    <th>Foto Alat</th>
                                    <th>Jumlah</th>
                                    <th>Jumlah Terpakai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $SQL = "SELECT * FROM komponen_komputer";
                                    $q = mysqli_query($koneksi, $SQL);
                                ?>
                                <?php foreach($q as $data) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['nama_alat'] ?></td>
                                        <td><?= $data['jenis_alat'] ?></td>
                                        <td><img src="../assets/img/komponen/<?= $data['foto_alat'] ?>" width="50"></td>
                                        <td><?= $data['jumlah'] - $data['jumlah_terpakai'] ?></td>
                                        <td><?= $data['jumlah_terpakai'] ?></td>
                                        
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