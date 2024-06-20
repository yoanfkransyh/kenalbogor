<?php
session_start();
include('layout/header.php');
if (isset($_SESSION['logged_in']) && ($_SESSION['status']) == 'Pengguna') {
    header('location: landingPage.php');
    exit;
} else if (!isset($_SESSION['logged_in'])) {
    header('location: landingPage.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tempat Wisata | Kenal Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Content -->
    <div class="container container-input py-5 mt-5 mb-5">
        <h2 class="mb-4 text-center">Tambah Tempat Bersejarah</h2>
        <form action="action/tambahTempatBersejarah.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="namaTempat" class="form-label">Nama Tempat</label>
                <input type="text" class="form-control" id="namaTempat" name="namaTempat" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar1" class="form-label">Gambar 1</label>
                <input type="file" class="form-control" id="gambar1" name="gambar1" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="gambar2" class="form-label">Gambar 2</label>
                <input type="file" class="form-control" id="gambar2" name="gambar2" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="gambar3" class="form-label">Gambar 3</label>
                <input type="file" class="form-control" id="gambar3" name="gambar3" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="maps" class="form-label">Link Google Maps</label>
                <input type="url" class="form-control" id="maps" name="maps" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Tempat</button>
        </form>
    </div>
    <!-- Content End -->
</body>

</html>