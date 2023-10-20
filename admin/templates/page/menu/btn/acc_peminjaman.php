<!-- konfirmasi data peminjaman -->
<div class="modal fade" id="konfir_admin<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Pengajuan Peminjaman Alat Praktik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Menerima Pengajuan Peminjaman Ini ?</p>
      </div>
      <div class="modal-footer">
        <form action="../proses/verif_adm.php" method="post">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">
          <button type="submit" name="terima" class="btn btn-success">Terima</button>
        </form>
        <form action="../proses/verif_adm.php" method="post">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">
          <button type="submit" name="tolak" class="btn btn-danger">Tolak</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end konfirmasi data peminjaman -->


<!-- konfirmasi pengajuan selesai -->
<div class="modal fade" id="konfirmasi_admin<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Verifikasi Pengajuan Selesai Peminjaman Alat Praktik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/acc_admin.php" method="post" autocomplete="off">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">
          <div class="form-group">
            <label class="mt-2">Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control mt-3" value="<?= $data['nama_peminjam'] ?>" disabled>
          </div>
          <div class="form-group">
            <label class="mt-2">Alat</label>
            <input type="text" name="jumlah_alat" class="form-control mt-3" value="<?= $data['alat_yang_dipinjam'] ?>" disabled>
          </div>
          <div class="form-group">
            <label class="mt-2">Jumlah</label>
            <input type="text" name="jumlah_alat" class="form-control mt-3" value="<?= $data['jumlah_alat'] ?>" disabled>
          </div>
          <div class="form-group">
            <label class="mt-2">Tanggal Peminjaman</label>
            <input type="text" name="tanggal_peminjaman" class="form-control mt-3 tgl" value="<?= $data['tanggal_peminjaman'] ?>" disabled>
          </div>
          <div class="form-group">
            <label class="mt-2">Waktu Peminjaman</label>
            <input type="time" name="waktu_peminjaman" class="form-control mt-3" value="<?= $data['waktu_peminjaman'] ?>" disabled>
          </div>
          <div class="form-group">
            <label class="mt-2">Kondisi Awal</label>
            <select name="kondisi_awal" class="form-control">
              <option value="">-- Pilih --</option>
              <option>Baik</option>
              <option>Rusak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="mt-2">Kondisi Akhir</label>
            <select name="kondisi_akhir" class="form-control">
              <option value="">-- Pilih --</option>
              <option>Baik</option>
              <option>Rusak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="mt-2">Status Approv</label>
            <select name="status" class="form-control">
              <option value="">-- Pilih --</option>
              <option>Terima</option>
              <option>Tolak</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" name="acc" class="btn btn-success">Konfirmasi</button>
            <button data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end konfirmasi pengajuan selesai -->