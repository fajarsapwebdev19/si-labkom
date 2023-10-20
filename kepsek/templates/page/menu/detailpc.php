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
                                    
                                    <?php require 'btn_pc/detail.php'; ?>
                                    <?php require 'btn_pc/foto.php'; ?>

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