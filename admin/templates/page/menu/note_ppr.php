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
                    <h5 class="card-title mb-0 text-black">Catatan Peminjaman Alat Praktik</h5>
                </div>
                <div class="card-body">
                    <!-- tab -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pinjam-tab" data-bs-toggle="tab" data-bs-target="#pinjam" type="button" role="tab" aria-controls="pinjam" aria-selected="true">Peminjaman</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="selesai-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="selesai" aria-selected="false">Selesai Peminjaman</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="pinjam" role="tabpanel" aria-labelledby="pinjam-tab">
                            <!-- table peminjaman alat praktik lab -->
                            <div class="table-responsive">
                                <table class="table table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Alat Yang Dipinjam</th>
                                            <th class="text-center">Jumlah Alat</th>
                                            <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                            <th class="text-center">Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $db = mysqli_query($koneksi, "SELECT * FROM peminjaman_alat_praktik WHERE status='Terima' AND konfirmasi_selesai='Sudah'");
                                            while($data = mysqli_fetch_object($db)):
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data->nama_peminjam; ?></td>
                                                <td><?= $data->alat_yang_dipinjam;?></td>
                                                <td class="text-center"><?= $data->jumlah_alat; ?></td>
                                                <td class="text-center"><?= $data->tanggal_peminjaman?> <?= $data->waktu_peminjaman?></td>
                                                <td class="text-center"><?= $data->username?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table peminjaman alat praktik lab -->
                        </div>
                        <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                            <div class="table-responsive">
                                <table class="table table-hover nowrap" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Alat Yang Dipinjam</th>
                                            <th class="text-center">Jumlah Alat</th>
                                            <th class="text-center">Tanggal & Waktu Peminjaman</th>
                                            <th class="text-center">Kondisi Awal</th>
                                            <th class="text-center">Kondisi Akhir</th>
                                            <th class="text-center">Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $db = mysqli_query($koneksi, "SELECT * FROM selesai_peminjaman_alat WHERE status_admin='Terima' AND status='Terima'");
                                            while($data = mysqli_fetch_object($db)):
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $data->nama_peminjam; ?></td>
                                                <td><?= $data->alat_yang_dipinjam;?></td>
                                                <td class="text-center"><?= $data->jumlah_alat; ?></td>
                                                <td class="text-center"><?= $data->tanggal_peminjaman?> <?= $data->waktu_peminjaman?></td>
                                                <td>
                                                    <?php
                                                        if(empty($data->kondisi_awal))
                                                        {}
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
                                                <td>
                                                    <?php
                                                        if(empty($data->kondisi_akhir))
                                                        {}
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
                                                <td class="text-center"><?= $data->username?></td>
                                            </tr>
                                        <?php endwhile; ?>
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