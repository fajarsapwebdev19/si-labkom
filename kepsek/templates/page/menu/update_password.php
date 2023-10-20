<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Update Password</h3>
        </div>
    </div>
    <!-- end title -->

    <!-- pesan -->
    <?php
        if(isset($_SESSION['val']) && $_SESSION['val'] !='')
        {
            echo $_SESSION['val'];
            unset($_SESSION['val']);
        }
    ?>
    <!-- pesan -->

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <form action="../proses/update_password.php" method="post" autocomplete="off">
                <input type="hidden" name="username" value="<?= $kepsek['username'] ?>">
                <label class="mt-2">Password Lama</label>
                <input type="password" name="password" class="form-control mt-3">
                <label class="mt-2">Password Baru</label>
                <input type="password" name="password_baru" class="form-control mt-3">
                <label class="mt-2">Konfirmasi Password</label>
                <input type="password" name="konfirmasi_password" class="form-control mt-3">
                <div class="mt-2"></div>
                <button type="submit" class="btn btn-success" name="update">Update Password</button>
            </form>
        </div>
    </div>
</div>