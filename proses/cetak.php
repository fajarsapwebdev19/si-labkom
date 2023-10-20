<?php
    include '../koneksi/koneksi.php';
    include '../assets/mpdf/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    ob_start(); 
    $nama_dokumen = "RENCANA ANGGARAN PEMBELIAN ALAT LAB KOMPUTER";

    $tanggal = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal']))));

    $q = mysqli_query($koneksi, "SELECT * FROM rencana_anggaran WHERE tanggal_pengajuan='$tanggal'");

    $r = mysqli_fetch_assoc($q);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .text-center{
                text-align: center;
            }

            td{
			    padding: 3px 3px;
		    }
        </style>
        <title><?= $nama_dokumen; ?></title>
    </head>
    <body>
        <center>
            <h3 class="text-center">RENCANA ANGGARAN PEMBELIAN ALAT LAB KOMPUTER</h3>
            <h3 class="text-center">SMK PGRI NEGLASARI</h3>
        </center>
        <table style="border-collapse:collapse;border-spacing:0;" width="100%" align="center" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Tanggal Pembelian</th>
                    <th>Volume</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                        $tanggal = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal']))));

                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM rencana_anggaran WHERE tanggal_pengajuan='$tanggal'");

                        function rupiah($angka)
                        {
                            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                            return $hasil_rupiah;
                        }

                        while($data = mysqli_fetch_assoc($query)) :
                ?>
                    <tr>
                        <td align="center"><?= $no++; ?></td>
                        <td><?= $data['nama_alat'] ?></td>
                        <td align="center"><?= date('d-m-Y',strtotime($data['tanggal_pembelian'])) ?></td>
                        <td align="center"><?= $data['volume'] ?></td>
                        <td align="center"><?= $data['satuan'] ?></td>
                        <td><?= rupiah($data['harga_satuan']) ?></td>
                        <td><?= rupiah($data['jumlah']) ?></td>
                    </tr>
                <?php endwhile; ?>
                <tr>
                        <td colspan="6" align="center">Jumlah</td>
                        <td>
                            <?php
                                $query = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jum FROM rencana_anggaran WHERE tanggal_pengajuan='$tanggal'");

                                $data = mysqli_fetch_assoc($query); 
                                $jumlah = $data['jum'];

                                echo rupiah($jumlah);
                            ?>
                        </td>
                </tr>
            </tbody>
        </table>


        <p align="right">
            Tangerang, <?= date('d-m-Y',strtotime($r['tanggal_pengajuan'])) ?>
            <br>
            Mengetahui,
            <br>
            Kepala <b>SMK PGRI NEGLASARI</b>
            <br>
            <br>
            <br>
            <br>
            <br>
            <b>Drs. Agus Irianto</b>
        </p>
    </body>
    </html>
<?php
 $html = ob_get_contents(); 
 ob_end_clean();
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output();
?>