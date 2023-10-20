<!-- edit data -->
<div class="modal fade" id="edit<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/edit_peminjaman.php" method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="form-group">
                <label class="mt-2">Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control mt-3" value="<?= $data['nama_peminjam'] ?>" readonly>
            </div>
            <div class="form-group">
                <label class="mt-2">Alat</label>
                <input type="text" name="alat_yang_dipinjam" class="form-control mt-3" value="<?= $data['alat_yang_dipinjam'] ?>" readonly>
            </div>
            <div class="form-group">
                <label class="mt-2">Jumlah</label>
                <input type="text" name="jumlah_alat" class="form-control mt-3" value="<?= $data['jumlah_alat'] ?>">
            </div>
            <div class="form-group">
                <label class="mt-2">Tanggal Peminjaman</label>
                <input type="text" name="tanggal_peminjaman" class="form-control mt-3 tgl" value="<?= $data['tanggal_peminjaman'] ?>">
            </div>
            <div class="form-group">
                <label class="mt-2">Waktu Peminjaman</label>
                <input type="time" name="waktu_peminjaman" class="form-control mt-3" value="<?= $data['waktu_peminjaman'] ?>">
            </div>
            <div class="modal-footer">
                <button type="submit" name="update" class="btn btn-success">Update Peminjaman</button>
                <button data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end edit data -->

<!-- delete data -->
<div class="modal fade" id="delete<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Menghapus ?</p>
        <form action="../proses/delete_peminjaman.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id']?>">
            <div class="modal-footer">
                <button type="submit" name="delete" class="btn btn-success">Ya</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- delete data -->


<!-- konfirmasi selesai -->
<div class="modal fade" id="kon_selesai<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-2" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/konfirmasi_peminjaman.php" method="post">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">
          <div class="form-group">
              <label class="mt-2">Nama Peminjam</label>
              <input type="text" name="nama_peminjam" class="form-control mt-3" value="<?= $data['nama_peminjam'] ?>" disabled>
          </div>
          <div class="form-group">
              <label class="mt-2">Alat</label>
              <input type="text" name="alat_yang_dipinjam" class="form-control mt-3" value="<?= $data['alat_yang_dipinjam'] ?>" disabled>
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
          <input type="hidden" name="konfirmasi_selesai" value="Sudah">
          <div class="modal-footer">
            <button type="submit" name="konfir" class="btn btn-success">Konfirmasi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- konfirmasi selesai -->