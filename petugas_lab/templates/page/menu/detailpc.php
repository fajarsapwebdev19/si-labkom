<div class="container-fluid p-0">
    <!-- Title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Detail & Info Pc</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-12">
            <!-- card -->
            <div class="card">

                <!-- card-header -->
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: black;">Info Pc</h5>
                </div>

                <!-- container validation -->

                <div class="container mb-4">
                    <?php
                        if(isset($_SESSION['val']) && $_SESSION['val'])
                        {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }
                    ?>

                    <!-- button -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fas fa-plus"></i> Tambah
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data PC</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../proses/save_detailpc.php" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label class="mb-2">Nama Pc</label>
                                                    <input type="text" name="nama_pc" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label class="mb-2">Mouse</label>
                                                    <input type="text" name="mouse" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label class="mb-2">Foto PC</label>
                                                    <input type="file" name="foto_pc" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Motherboard</label>
                                                    <input type="text" name="motherboard" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Keyboard</label>
                                                    <input type="text" name="keyboard" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Foto Monitor</label>
                                                    <input type="file" name="foto_monitor" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Processor</label>
                                                    <input type="text" name="processor" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Monitor</label>
                                                    <input type="text" name="monitor" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Sistem Operasi</label>
                                                    <input type="text" name="system_operasi" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">RAM</label>
                                                    <input type="text" name="ram" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Status Jaringan</label>
                                                    <select name="status_jaringan" class="form-control">
                                                        <option value="">-- Select --</option>
                                                        <option>Connect</option>
                                                        <option>Disconnect</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Status Pc</label>
                                                    <select name="status_pc" class="form-control">
                                                        <option value="">-- Select --</option>
                                                        <option>Baik</option>
                                                        <option>Rusak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">HDD Model</label>
                                                    <input type="text" name="hdd_model" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Foto Mouse</label>
                                                    <input type="file" name="foto_mouse" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Kapasitas HDD</label>
                                                    <input type="text" name="kapasitas_hdd" class="form-control">
                                                </div>
                                                <div class="col-sm-4 col-md-4 mb-4">
                                                    <label for="" class="mb-2">Foto Keyboard</label>
                                                    <input type="file" name="foto_keyboard" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="save" class="btn btn-success">Save</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card-body -->

                <div class="card-body">
                    <!-- table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-hover nowrap" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama PC</th>
                                    <th>Detail PC</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $server = mysqli_query($koneksi, "SELECT * FROM pc");
                                ?>
                                <?php foreach($server as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_pc'] ?></td>
                                    <td><a href="#detail<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-primary"><i
                                                class="fas fa-info"></i></a></td>
                                    <td><a href="#foto<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-info"><i
                                                class="fas fa-camera"></i></a></td>
                                    <td>
                                        <?php
                                            if(empty($data['status_pc']))
                                            {}
                                            elseif($data['status_pc'] == 'Baik')
                                            {
                                                ?>
                                                    <p class="badge bg-success">Baik</p>
                                                <?php
                                            }
                                            elseif($data['status_pc'] == 'Rusak')
                                            {
                                                ?>
                                                    <p class="badge bg-danger">Rusak</p>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><a href="#update<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-info"><i class="fas fa-pen"></i></a></td>
                                    <td><a href="#delete<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                    <?php require 'btn_pc/detail.php'; ?>
                                    <?php require 'btn_pc/foto.php'; ?>
                                    <?php require 'btn_pc/update_detail.php'; ?>
                                    <?php require 'btn_pc/delete_detail.php'; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>