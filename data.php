<?php
include 'koneksi.php';

// Ambil nilai pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Konfigurasi pagination
$limit = 4; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query untuk mengambil data dengan pencarian dan pagination
$query = "SELECT * FROM pembayaran_spp 
          WHERE nama_siswa LIKE '%$search%' 
          ORDER BY id DESC 
          LIMIT $limit OFFSET $offset";

$result = mysqli_query($conn, $query);

// Hitung total data untuk pagination
$totalQuery = "SELECT COUNT(*) as total FROM pembayaran_spp WHERE nama_siswa LIKE '%$search%'";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalData = $totalRow['total'];
$totalPages = ceil($totalData / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info">
    <div class="container mt-5">
        <h1 class="text-center text-light fw-bold fs-2 mb-3">Data Pembayaran SPP</h1>
        <!-- Form Pencarian -->
        <form method="GET" class="mb-3 d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Siswa" value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-light">Cari</button>
        </form>
        
        <div class="table-responsive p-3 rounded shadow">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-light-subtle">
                    <tr class="text-center">
                        <th class="text-primary">No</th>
                        <th class="text-primary">Nama Siswa</th>
                        <th class="text-primary">Kelas</th>
                        <th class="text-primary">Walas</th>
                        <th class="text-primary">Tahun</th>
                        <th class="text-primary">Jumlah</th>
                        <th class="text-primary">Tanggal Bayar</th>
                        <th class="text-primary">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = $offset + 1;
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
                            <div class='btn-group' role='group'>
                                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                            </div>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center mt-3">
                <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?search=<?= $search ?>&page=<?= $page - 1 ?>">« Prev</a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                        <a class="page-link" href="?search=<?= $search ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <li class="page-item"><a class="page-link" href="?search=<?= $search ?>&page=<?= $page + 1 ?>">Next »</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="d-flex justify-content-start">
            <a href="index.php" class="btn btn-light mx-2 mt-3 mb-3">Kembali</a>
            <a href="perhitungan.php" class="btn btn-light mt-3 mb-3">Lanjut</a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
