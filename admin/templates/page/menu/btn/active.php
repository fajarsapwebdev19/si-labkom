<div class="modal fade" id="active<?= $a['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Aktifkan Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Mengaktifkan Akun Tersebut ?</p>
                <form action="../proses/act_adm.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    <div class="modal-footer">
                        <button type="submit" name="active" class="btn btn-success">Ya</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>