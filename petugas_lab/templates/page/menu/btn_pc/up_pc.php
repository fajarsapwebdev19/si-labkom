<div class="modal fade" id="up_pc<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="0"
    aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Foto Pc</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../proses/up_pc.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <input type="file" name="foto_pc" class="form-control mb-3">
                    <button type="submit" class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>    
    </div>
</div>