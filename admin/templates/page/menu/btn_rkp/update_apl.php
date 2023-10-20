<div class="modal fade" id="update<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Data Komponen Komputer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../proses/update_alat.php" method="post" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-2 col-md-2 col-form-label">Nama Alat</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_alat" class="form-control" value="<?= $data['nama_alat'] ?>">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-2 col-md-2 col-form-label">Jenis Alat</label>
                        <div class="col-sm-10">
                            <input type="text" name="jenis_alat" class="form-control" value="<?= $data['jenis_alat'] ?>">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-2 col-md-2 col-form-label">Foto Alat</label>
                        <div class="col-sm-10">
                            <input type="file" name="foto_alat" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-2 col-md-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" name="jumlah_alat" class="form-control" value="<?= $data['jumlah'] ?>">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>