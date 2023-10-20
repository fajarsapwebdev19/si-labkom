<div class="modal fade" id="update<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Data Pc</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="../proses/update_detailpc.php" method="post" autocomplete="off">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Nama PC</label>
                                <input type="text" name="nama_pc" class="form-control" value="<?= $data['nama_pc'] ?>">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Keyboard</label>
                                <input type="text" name="keyboard" class="form-control" value="<?= $data['keyboard'] ?>">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Model HDD</label>
                                <input type="text" name="model_hdd" class="form-control" value="<?= $data['hdd_model'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Motherboard</label>
                                <input type="text" name="motherboard" class="form-control" value="<?= $data['motherboard'] ?>">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Mouse</label>
                                <input type="text" name="mouse" class="form-control" value="<?= $data['mouse'] ?>">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Kapasitas HDD</label>
                                <input type="text" name="kapasitas_hdd" class="form-control" value="<?= $data['kapasitas_hdd'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">RAM</label>
                                <input type="text" name="ram" class="form-control" value="<?= $data['ram'] ?>">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Status Jaringan</label>
                                <select name="status_jaringan" class="form-control">
                                    <?php
                                        if(empty($data['status_jaringan']))
                                        {
                                            ?>
                                                <option value="" selected>-- Select --</option>
                                                <option>Connect</option>
                                                <option>Disconnect</option>
                                            <?php
                                        }
                                        elseif($data['status_jaringan'] == "Connect")
                                        {
                                            ?>
                                                <option value="">-- Select --</option>
                                                <option selected>Connect</option>
                                                <option>Disconnect</option>
                                            <?php
                                        }elseif($data['status_jaringan'] == "Disconnect")
                                        {
                                            ?>
                                                <option value="">-- Select --</option>
                                                <option>Connect</option>
                                                <option selected>Disconnect</option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">System Operasi</label>
                                <input type="text" name="system_operasi" class="form-control" value="<?= $data['system_operasi'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Processor</label>
                                <input type="text" name="processor" class="form-control" value="<?= $data['processor'] ?>">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Monitor</label>
                                <input type="text" name="monitor" class="form-control" value="<?= $data['monitor'] ?>">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <label class="mb-2">Status PC</label>
                                <select name="status_pc" class="form-control">
                                    <?php
                                        if(empty($data['status_pc']))
                                        {
                                            ?>
                                                <option value="" selected>-- Select --</option>
                                                <option>Baik</option>
                                                <option>Rusak</option>
                                            <?php
                                        }
                                        elseif($data['status_pc'] == "Baik")
                                        {
                                            ?>
                                                <option value="">-- Select --</option>
                                                <option selected>Baik</option>
                                                <option>Rusak</option>
                                            <?php
                                        }elseif($data['status_pc'] == "Rusak")
                                        {
                                            ?>
                                                <option value="">-- Select --</option>
                                                <option>Baik</option>
                                                <option selected>Rusak</option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-info">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>    
    </div>
</div>