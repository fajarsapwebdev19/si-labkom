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
                        <?= $siswa['nama'] ?>
                    </a>


                    <div class="sidebar-user-subtitle"><?= $siswa['level'] ?></div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                <?= $siswa['level'] ?>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../petugas_lab/">
                    <i class="fas fa-home align-middle"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-handshake"></i> <span class="align-middle">Penggunaan</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=pgn_kom">Komputer</a></li>
                    <li class="sidebar-item active"><a class="sidebar-link" href="?page=pgn_apl">Alat Praktik Lab</a></li>
                </ul>
            </li>
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="?page=rwt_pgn">
                    <i class="align-middle fas fa-history"></i> <span class="align-middle">Riwayat Penggunaan
                        Alat</span>
                </a>
            </li>
        </ul>
    </div>
</nav>