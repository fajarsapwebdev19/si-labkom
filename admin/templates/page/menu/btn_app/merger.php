<div class="modal fade" id="mergered" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Merger Data ?</p>
                <form action="../proses/mergered_data.php" method="post">
                    <input type="hidden" name="registrasi_status" value="Tolak">
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="merge">Ya</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>