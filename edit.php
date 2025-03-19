<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pembayaran_spp WHERE id = $id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $walas = $_POST['walas'];
    $tahun = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];
    $tanggal_bayar = $_POST['tanggal_bayar'];

    $query = "UPDATE pembayaran_spp SET 
              nama_siswa='$nama', kelas='$kelas', walas='$walas', tahun='$tahun', jumlah='$jumlah', tanggal_bayar='$tanggal_bayar' 
              WHERE id=$id";
    mysqli_query($conn, $query);

    header("Location: data.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembayaran</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-info">
    <div class="container mt-5">
        <h1 class="text-center text-light fw-bold fs-2">Edit Pembayaran SPP</h1>
        <form method="POST">
            <div class="mb-3">
                <label>Nama Siswa</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama_siswa'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" value="<?= $data['kelas'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Walas</label>
                <input type="text" name="walas" class="form-control" value="<?= $data['walas'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" value="<?= $data['tahun'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" step="0.01" name="jumlah" class="form-control" value="<?= $data['jumlah'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" class="form-control" value="<?= $data['tanggal_bayar'] ?>" required>
            </div>
            <button type="submit" class="btn btn-light btn-outline-primary">Update</button>
            <a href="data.php" class="btn btn-light">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
