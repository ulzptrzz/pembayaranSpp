<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }
    </style>
</head>
<body class="bg-info d-flex align-items-center vh-100 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="mb-4 fw-bold text-dark">Statistik Pembayaran SPP</h2>
                    <form action="process.php" method="POST">
                        <label for="jumlah" class="form-label fw-bold">Pilih Agregat:</label>
                        <select class="form-select mb-3" name="jumlah" id="jumlah">
                            <option value="sum">Total Pembayaran</option>
                            <option value="avg">Rata-rata Pembayaran</option>
                            <option value="max">Pembayaran Tertinggi</option>
                            <option value="min">Pembayaran Terendah</option>
                        </select>
                        <div class="btn-group" role='group'>
                            <input class="btn btn-primary mt-2" type="submit" value="Tampilkan">
                            <a href="data.php" class="btn btn-light text-primary mt-2">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
