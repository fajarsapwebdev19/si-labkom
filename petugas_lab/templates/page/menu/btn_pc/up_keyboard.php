<div class="modal fade" id="up_keyboard<?= $data['id'] ?>" data-bs-backdrop="static"
    aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Foto Keyboard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../proses/up_key.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <input type="file" name="foto_keyboard" class="form-control mb-3">
                    <button type="submit" class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>    
    </div>
</div>