<div class="modal fade" id="detail<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail PC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">Nama Pc</b>
                            <p><?= $data['nama_pc'] ?></p>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">HDD Model</b>
                            <p><?= $data['hdd_model'] ?> (<?= $data['kapasitas_hdd'] ?>)</p>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">System Operasi</b>
                            <p><?= $data['system_operasi'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">Motherboard</b>
                            <p><?= $data['motherboard'] ?></p>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">Mouse</b>
                            <p><?= $data['mouse'] ?></p>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">Status Jaringan</b>
                            <p> <?php 
                                    if(empty($data['status_jaringan']))
                                    {
                                        ?> <div class="badge bg-danger">NULL</div> <?php
                                    }
                                    elseif($data['status_jaringan'] == "Connect")
                                    {
                                        ?> <div class="badge bg-success">Connect</div> <?php
                                    }
                                    elseif($data['status_jaringan'] == "Disconnect")
                                    {
                                        ?> <div class="badge bg-danger">Disconnect</div> <?php
                                    }

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">Processor</b>
                            <p><?= $data['processor'] ?></p>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">Keyboard</b>
                            <p><?= $data['keyboard'] ?></p>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">Status PC</b>
                            <p><?= $data['status_pc'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">RAM</b>
                            <p><?= $data['ram'] ?></p>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <b class="mb-2">Monitor</b>
                            <p><?= $data['monitor'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>