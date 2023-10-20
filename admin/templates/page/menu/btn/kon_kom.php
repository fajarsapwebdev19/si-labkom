<div class="modal fade" id="konfir<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Approve Pengajuan Penggunaan Komputer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/konfirmasi_admin.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="form-group">
                <label for="" class="mb-3">
                    Nama Pengguna
                </label>
                <input type="text" name="nama_pengguna" class="form-control mb-2" value="<?= $data['nama_pengguna'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="" class="mb-3">
                    Komputer
                </label>
                <input type="text" name="komputer" class="form-control mb-2" value="<?= $data['komputer'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="" class="mb-3">
                    Tanggal Penggunaan
                </label>
                <input type="text" name="tanggal_penggunaan" class="form-control mb-2" value="<?= $data['tanggal_penggunaan'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="" class="mb-3">
                    Waktu Penggunaan
                </label>
                <input type="text" name="waktu_penggunaan" class="form-control mb-2" value="<?= $data['waktu_penggunaan'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="" class="mb-3">
                    Kondisi Awal
                </label>
                <select name="kondisi_awal" class="form-control mb-2">
                    <option value="">-- Pilih --</option>
                    <option>Baik</option>
                    <option>Rusak</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="mb-3">
                    Kondisi Akhir
                </label>
                <select name="kondisi_akhir" class="form-control mb-2">
                    <option value="">-- Pilih --</option>
                    <option>Baik</option>
                    <option>Rusak</option>
                </select>
            </div>
            <input type="hidden" name="status" value="Terima">
            <div class="modal-footer">
                <button type="submit" name="konfirmasi" class="btn btn-success">Konfirmasi</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>