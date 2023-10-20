

<!-- modal update -->
<div class="modal fade" id="update<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update">Ubah Pengajuan Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../proses/update_anggaran.php" method="post" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="container">
                        <label class="mb-3">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control mb-2" value="<?= $data['nama_alat'] ?>">

                        <label class="mb-3">Foto Alat</label>
                        <input type="file" name="foto_alat" class="form-control mb-2">

                        <label class="mb-3">Tanggal Pengajuan</label>
                        <input type="text" name="tanggal_pengajuan" class="form-control mb-2 date-picker"
                            value="<?= date('d-m-Y', strtotime($data['tanggal_pengajuan']))?>">

                        <label class="mb-3">Tanggal Pembelian</label>
                        <input type="text" name="tanggal_pembelian" class="form-control mb-2 date-picker"
                            value="<?= date('d-m-Y', strtotime($data['tanggal_pembelian']))?>">

                        <label class="mb-3">Volume</label>
                        <input type="text" name="volume" id="volume"class="form-control mb-2" value="<?= $data['volume'] ?>">

                        <label class="mb-3">Satuan</label>
                        <input type="text" name="satuan" class="form-control mb-2" value="<?= $data['satuan'] ?>">

                        <label class="mb-3">Harga Satuan</label>
                        <input type="text" name="harga_satuan" id="harga_satuan" class="form-control mb-2" value="<?= $data['harga_satuan'] ?>">
                        

                        <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-info">Ubah</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal delete -->

<div class="modal fade" id="delete<?= $data['id']; ?>" role="dialog" aria-labelledby="delete"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete">Konfirmasi Hapus Data </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Hapus Data ? <?= $data['id'] ?></p>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-info">Ubah</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
