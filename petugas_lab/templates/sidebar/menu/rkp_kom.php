<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="sidebar-brand-text align-middle text-center">
                <h3 class="fas fa-desktop text-white"> SIBL SMK </h3>
            </span>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="../assets/admin/img/avatars/user.jpg" class="avatar img-fluid rounded me-1"
                        alt="Charles Hall">
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title" href="#">
                        <?= $petugas['nama'] ?>
                    </a>


                    <div class="sidebar-user-subtitle"><?= $petugas['level'] ?></div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                <?= $petugas['level'] ?>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../petugas_lab/">
                    <i class="fas fa-home align-middle"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-book-open"></i> <span class="align-middle">Rekap Data</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                    <li class="sidebar-item active"><a class="sidebar-link" href="?page=rkp_kom">Komponen Komputer</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=rkp_apl">Alat Praktik Lab</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#verif" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-check"></i> <span class="align-middle">Verifikasi Peminjaman</span>
                </a>
                <ul id="verif" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=ver_mkp">Menggunakan PC</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=ver_skm">Selesai Menggunakan PC</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=ver_alt">Peminjaman Alat Praktik</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=ver_bck">Pengembalian Alat Praktik</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#note" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-book"></i> <span class="align-middle">Catatan</span>
                </a>
                <ul id="note" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=note_pkm">Menggunakan PC</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=note_ppr">Peminjaman Alat Praktik</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="?page=detailpc">
                    <i class="align-middle fas fa-desktop"></i> <span class="align-middle">Detail & Info PC</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="?page=lap_buy">
                    <i class="align-middle fas fa-swatchbook"></i> <span class="align-middle">Laporan Pembelian
                        Alat</span>
                </a>
            </li>
        </ul>
    </div>
</nav>