<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Profile</h3>
        </div>
    </div>
    <!-- end title -->

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="text-center">
                <img src="../assets/admin/img/avatars/user.jpg" width="125" height="125" class="rounded-circle img-thumbnail" alt="">
            </div>

                <div class="mt-4"></div>

                <div class="table-responsive-sm">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $petugas['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><?= $petugas['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><?= $petugas['username'] ?></td>
                                </tr>
                                <tr>
                                    <th>Status Akun</th>
                                    <td><?= $petugas['sts_akun'] ?></td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
        </div>
    </div>
</div>