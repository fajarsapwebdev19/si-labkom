<div class="modal fade" id="kon_app<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Approve Pengajuan Penggunaan Komputer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/app.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <p>Apakah Anda Ingin Approve Pengajuan Ini ?</p>
            <input type="hidden" name="nama_pengguna" value="<?= $data['nama_pengguna'] ?>">
            <input type="hidden" name="komputer" value="<?= $data['komputer'] ?>">
            <input type="hidden" name="tanggal_penggunaan" value="<?= $data['tanggal_penggunan'] ?>">
            <input type="hidden" name="waktu_penggunan" value="<?= $data['waktu_penggunan'] ?>">
            <input type="hidden" name="status" value="Terima">
            <div class="modal-footer">
                <button type="submit" name="app" class="btn btn-success">Terima</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>