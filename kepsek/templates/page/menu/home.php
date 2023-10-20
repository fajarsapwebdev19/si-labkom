<div class="container-fluid p-0">

    <!-- Title -->

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Dashboard</h3>
        </div>
    </div>

    <!-- End Title -->

    <!-- Jumlah User -->

    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Admin</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                            $q = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Admin'");
                            echo mysqli_num_rows($q);
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Kepala Sekolah</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                            $p = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Kepsek'");
                            echo mysqli_num_rows($p);                        
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Petugas Lab</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                            $pl = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Petugas Lab'");
                            echo mysqli_num_rows($pl);
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Siswa</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                            $s = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Siswa'");
                            echo mysqli_num_rows($s);
                        ?>
                    </h1>
                </div>
            </div>
        </div>

        <!-- End Jumlah User -->
        
        <!-- Rekap Alat -->

        <div class="col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: black;">Rekap Alat</h5>
                </div>
                <div class="card-body pt-2 pb-3">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Jumlah Alat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $db = mysqli_query($koneksi, "SELECT * FROM alat_praktik UNION SELECT * FROM komponen_komputer");
                                while($data = mysqli_fetch_object($db)):
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nama_alat; ?></td>
                                    <td><?= $data->jumlah; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- End Rekap Alat -->
    </div>
</div>