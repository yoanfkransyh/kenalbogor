<?php
session_start();
include('data/tempatBersejarah.php');
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
    <title>Data Tempat | Kenal Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- Content -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">Daftar Tempat Bersejarah</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Tempat</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tempat_array as $tempat) { ?>
                    <tr>
                        <td><img src="assets/Tempat Bersejarah/<?php echo $tempat['gambar1']; ?>" alt="Gambar <?php echo $tempat['nama_tempat']; ?>"></td>
                        <td><?php echo $tempat['nama_tempat']; ?></td>
                        <td><?php echo $tempat['deskripsi']; ?></td>
                        <td><a href="editTempat.php?id=<?php echo $tempat['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="formTambahTempatBersejarah.php" class="btn btn-primary fixed-button">
        <i class="bi bi-plus"></i>
    </a>
    <!-- Content End -->

    <!-- Notifikasi -->
    <?php if (isset($_GET["success"])) { ?>
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "<?php echo $_GET["success"] ?>",
                icon: "success"
            });
        </script>
    <?php } else if (isset($_GET["success"])) { ?>
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "<?php echo $_GET["failed"] ?>",
                icon: "error"
            });
        </script>
    <?php } ?>
    <!-- Notifikasi End -->

</body>

</html>