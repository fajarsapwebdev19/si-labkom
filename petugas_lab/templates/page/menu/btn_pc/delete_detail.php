<div class="modal fade" id="delete<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Mau Hapus Data ?</p>
                <form action="../proses/delete_detail.php" method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="modal-footer">
                        <button type="submit" name="delete" class="btn btn-success">Ya</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>