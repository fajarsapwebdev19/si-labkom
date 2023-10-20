<div class="modal fade" id="info<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Komponen Komputer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <b>Nama Alat</b>
                    <p><?= $data['nama_alat'] ?></p>
                </div>
                <div class="col-sm-6 mb-3">
                    <b>Jenis Alat</b>
                    <p><?= $data['jenis_alat'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <b>Jumlah Alat</b>
                    <p><?= $data['jumlah'] - $data['jumlah_terpakai'] ?></p>
                </div>
                <div class="col-sm-6 mb-3">
                    <b>Jumlah Terpakai</b>
                    <p><?= $data['jumlah_terpakai'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <b>Foto Alat</b>
                    <p class="mt-4"><img class="mb-3" src="../assets/img/komponen/<?= $data['foto_alat'] ?>" width="250"></p>
                </div>
                <div class="col-sm-6 mb-3">
                    <b>Pengguna Alat</b>
                    <p>
                        <?php
                            
                        ?>
                    </p>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>