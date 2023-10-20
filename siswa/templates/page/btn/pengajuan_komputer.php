<!-- update data -->
<div class="modal fade" id="update_pengajuan<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Data Penggunaan Komputer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $q = mysqli_query($koneksi, "SELECT * FROM pc");
                ?>
                <form action="../proses/update_pemkom.php" method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label for="" class="mb-2">Nama Pengguna</label>
                        <input type="text" name="nama_pengguna" class="form-control mb-2" value="<?= $siswa['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-2">Komputer</label>
                        <select name="komputer" class="form-control mb-2" disabled>
                            <option value="">-- Pilih --</option>
                            <?php foreach($q as $sub) : ?>
                                <?php
                                    if(empty($data['komputer']))
                                    {
                                        ?>
                                        <?php
                                    }elseif($data['komputer'] == $sub['nama_pc'])
                                    {
                                        ?>
                                            <option selected><?= $sub['nama_pc'] ?></option>
                                        <?php
                                    }
                                ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-2">Tanggal Penggunaan</label>
                        <input type="text" name="tanggal_penggunaan" class="form-control tgl" value="<?= $data['tanggal_penggunan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-2">Waktu Penggunaan</label>
                        <input type="time" name="waktu_penggunaan" class="form-control" value="<?= $data['waktu_penggunan'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-primary">Ubah</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir update data -->

<!-- hapus data -->
<div class="modal fade" id="delete_pengajuan<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Mau Hapus Data Pengajuan Ini ?</p>
        <form action="../proses/delete_pemkom.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="modal-footer">
                <button type="submit" name="oke" class="btn btn-success">Ya</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- akhir hapus data -->

<!-- konfirmasi selesai menggunakan -->
<div class="modal fade" id="kon_selesai<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Selesai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/kon_selesai.php" method="post">
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
                <input type="text" name="tanggal_penggunaan" class="form-control mb-2" value="<?= $data['tanggal_penggunan'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="" class="mb-3">
                    Waktu Penggunaan
                </label>
                <input type="text" name="waktu_penggunaan" class="form-control mb-2" value="<?= $data['waktu_penggunan'] ?>" readonly>
            </div>
            <input type="hidden" name="username" value="<?= $data['username'] ?>">
            <input type="hidden" name="konfirmasi_selesai" value="Sudah">
            <div class="modal-footer">
                <button type="submit" name="oke" class="btn btn-success">Konfirmasi</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- end konfirmasi menggunakan -->