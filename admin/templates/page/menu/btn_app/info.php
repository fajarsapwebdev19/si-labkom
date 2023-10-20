<div class="modal fade" id="info<?= $a['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    
                        <div class="col-sm-12 mb-4">
                            <label class="mb-2">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $a['nama'] ?>" disabled>
                        </div>
                        <div class="col-sm-12 mb-4">
                            <label class="mb-2">Jenis Kelamin</label>
                            <input type="text" name="jk" class="form-control" value="<?= $a['jenis_kelamin'] ?>" disabled>
                        </div>
                        <div class="col-sm-12 mb-4">
                            <label class="mb-2">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $a['username'] ?>" disabled>
                        </div>
                        <div class="col-sm-12 mb-4">
                            <label class="mb-2">Password</label>
                            <input type="text" name="password" class="form-control" value="<?= $a['password'] ?>" disabled>
                        </div>
                        <div class="col-sm-12 mb-4">
                            <label class="mb-2">Level</label>
                            <input type="text" name="level" class="form-control" value="<?= $a['level'] ?>" disabled>
                        </div>
                        <div class="col-sm-12 mb-4">
                            <label class="mb-2">Status Registrasi</label>
                            <input type="text" name="sts_reg" class="form-control" value="<?= $a['registrasi_status'] ?>" disabled>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>