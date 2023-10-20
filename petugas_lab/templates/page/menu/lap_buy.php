<div class="container-fluid p-0">
    <!-- Title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Laporan Pembelian Alat</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-12">
            <!-- card -->
            <div class="card">

                <!-- card-header -->
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: black;">Rencana Anggaran Biaya Pembelian Alat</h5>
                </div>

                <!-- container validation -->

                <div class="container mb-4">
                    <?php
                        if(isset($_SESSION['val']) && $_SESSION['val'])
                        {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }

                        function rupiah($angka)
                        {
                            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                            return $hasil_rupiah;
                        }
                    ?>
                </div>

                <div class="container  mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengajuan Anggaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../proses/tambah_anggaran.php" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="container">
                                            <label class="mb-3">Nama Alat</label>
                                            <input type="text" name="nama_alat" class="form-control mb-2">

                                            <label class="mb-3">Foto Alat</label>
                                            <input type="file" name="foto_alat" class="form-control mb-2">

                                            <label class="mb-3">Tanggal Pengajuan</label>
                                            <input type="text" name="tanggal_pengajuan" class="form-control date-picker mb-2">

                                            <label class="mb-3">Tanggal Pembelian</label>
                                            <input type="text" name="tanggal_pembelian" class="form-control date-picker mb-2">

                                            <label class="mb-3">Volume</label>
                                            <input type="text" name="volume" id="volume"
                                                class="form-control mb-2">

                                            <label class="mb-3">Satuan</label>
                                            <input type="text" name="satuan" class="form-control mb-2">

                                            <label class="mb-3">Harga Satuan</label>
                                            <input type="text" name="harga_satuan" id="harga_satuan"
                                                class="form-control mb-2">

                                            <label class="mb-3">Jumlah</label>
                                            <input type="text" name="jumlah" id="total" class="form-control mb-2"
                                                readonly>

                                            <input type="hidden" name="status_pengajuan" value="Menunggu">
                                            <input type="hidden" name="status_alat" value="Menunggu">

                                            <div class="modal-footer">
                                                <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <form action="../proses/cetak.php" method="post" autocomplete="off">
                        <div class="container">
                            <div class="col-sm-4 col-md-4">
                                <label for="" class="mb-2">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control date-picker mb-2">
                            </div>
                            <button type="submit" class="btn btn-info">Cetak</button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-hover nowrap" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alat</th>
                                    <th>Foto Alat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Status Pengajuan</th>
                                    <th>Status Alat</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php
                                $no = 1;
                                $db_data = mysqli_query($koneksi, "SELECT * FROM rencana_anggaran");

                                while($data = mysqli_fetch_assoc($db_data)) :
                                
                            ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama_alat'] ?></td>
                                            <td><img src="../assets/img/buy/<?= $data['foto_alat'] ?>" width="50"></td>
                                            <td><?= date('d-m-Y', strtotime($data['tanggal_pengajuan']))?></td>
                                            <td><?= date('d-m-Y', strtotime($data['tanggal_pembelian']))?></td>
                                            <td><?= $data['volume'] ?></td>
                                            <td><?= $data['satuan'] ?></td>
                                            <td><?= rupiah($data['harga_satuan'])?></td>
                                            <td><?= rupiah($data['jumlah']) ?></td>
                                            <td><?php
                                                  if(empty($data['status_pengajuan']))
                                                  {

                                                  }
                                                  elseif($data['status_pengajuan'] == "Menunggu")
                                                  {
                                                      ?>
                                                        <p class="badge badge bg-warning text-dark">Menuggu</p>
                                                      <?php
                                                  }
                                                  elseif($data['status_pengajuan'] == "Terima")
                                                  {
                                                      ?>
                                                        <p class="badge bg-success">Terima</p>
                                                      <?php
                                                  }
                                                  elseif($data['status_pengajuan'] == "Tolak")
                                                  {
                                                      ?>
                                                        <p class="badge bg-danger">Tolak</p>
                                                      <?php
                                                  }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if(empty($data['status_alat'])){

                                                    }
                                                    elseif($data['status_alat'] == "Menunggu")
                                                    {
                                                        ?>
                                                            <p class="badge bg-warning text-dark">Menunggu</p>
                                                        <?php
                                                    }
                                                    elseif($data['status_alat'] == "Dalam Pembelian")
                                                    {
                                                        ?>
                                                            <p class="badge bg-info">Dalam Pembelian</p>
                                                        <?php
                                                    }
                                                    elseif($data['status_alat'] == "Batal")
                                                    {
                                                        ?>
                                                            <p class="badge bg-danger">Batal</p>
                                                        <?php
                                                    }
                                                    elseif($data['status_alat'] == "Berhasil")
                                                    {
                                                        ?>
                                                            <p class="badgen bg-success">Berhasil</p>
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                            
                                            <td><a href="#update<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-info"><em class="fas fa-pen"></em></a>
                                            <?php require 'btn_rab/update.php'; ?>
                                            </td>
                                            <td><a href="#" data-bs-target="#del<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-danger"><em class="fas fa-trash-alt"></em></a>
                                            <?php require 'btn_rab/delete.php'; ?>
                                            </td>
                                        </tr>

                                        <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>