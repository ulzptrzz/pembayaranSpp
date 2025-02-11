<?php
include 'koneksi.php';

// Ambil data dari database
$result = mysqli_query($conn, "SELECT * FROM pembayaran_spp");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran SPP</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-info">
    <div class="container mt-5">
        <h1 class="text-center text-light fw-bold fs-2 mb-4">Data Pembayaran SPP</h1>
        <a href="tambah.php" class="btn btn-light mb-3">Tambah Data</a>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Walas</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Tanggal Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['nama_siswa'] . "</td>";
                    echo "<td>" . $row['kelas'] . "</td>";
                    echo "<td>" . $row['walas'] . "</td>";
                    echo "<td>" . $row['tahun'] . "</td>";
                    echo "<td>Rp " . number_format($row['jumlah'], 2, ',', '.') . "</td>";
                    echo "<td>" . $row['tanggal_bayar'] . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
