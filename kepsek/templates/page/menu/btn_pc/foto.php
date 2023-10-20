<div class="modal fade" id="foto<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-6 mb-4">
                            <b class="mb-2">Foto PC</b>
                            <p>
                                <?php
                                    if(empty($data['foto_pc']))
                                    {
                                        ?> <div class="badge bg-danger">NULL</div> <?php
                                    }
                                    else{
                                        ?> <img src="../assets/img/komponen/<?= $data['foto_pc'] ?>" width="250" alt=""> <?php
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="col-sm-6 col-md-6 mb-4">
                            <b class="mb-2">Foto Monitor</b>
                            <p>
                                <?php
                                    if(empty($data['foto_monitor']))
                                    {
                                        ?> <div class="badge bg-danger">NULL</div> <?php
                                    }
                                    else{
                                        ?> <img src="../assets/img/komponen/<?= $data['foto_monitor'] ?>" width="250" alt=""> <?php
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-6 mb-4">
                            <b class="mb-2">Foto Mouse</b>
                            <p>
                                <?php
                                    if(empty($data['foto_mouse']))
                                    {
                                        ?> <div class="badge bg-danger">NULL</div> <?php
                                    }
                                    else{
                                        ?> <img src="../assets/img/komponen/<?= $data['foto_mouse'] ?>" width="250" alt=""> <?php
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="col-sm-6 col-md-6 mb-4">
                            <b class="mb-2">Foto Keyboard</b>
                            <p>
                                <?php
                                    if(empty($data['foto_keyboard']))
                                    {
                                        ?> <div class="badge bg-danger">NULL</div> <?php
                                    }
                                    else{
                                        ?> <img src="../assets/img/komponen/<?= $data['foto_keyboard'] ?>" width="250" alt=""> <?php
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>