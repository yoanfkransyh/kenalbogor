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

include('./connection/connection.php');
$id = $_GET['id'];

$query = "SELECT * FROM tempat_bersejarah WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();  /* table tempat sejarah yg di panggil id maka keluar datanya disimpan di variabel tempat */
$tempat = $result->fetch_assoc();
$stmt->close();
$conn->close();

if (!$tempat) {
    header('location: adminPage.php?failed=Data Tidak Ada');  
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tempat Bersejarah | Kenal Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Content -->
    <div class="container container-input py-5 mt-5 mb-5">
        <h2 class="mb-4 text-center">Edit Tempat Bersejarah</h2>
        <form action="action/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $tempat['id']; ?>">
            <div class="mb-3">
                <label for="namaTempat" class="form-label">Nama Tempat</label>
                <input type="text" class="form-control" id="namaTempat" name="namaTempat" value="<?php echo $tempat['nama_tempat']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required><?php echo $tempat['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar1" class="form-label">Gambar 1</label>
                <img src="assets/Tempat Bersejarah/<?php echo $tempat['gambar1']; ?>" alt="Gambar 1" class="mb-2" width="100">
                <input type="file" class="form-control" id="gambar1" name="gambar1" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="gambar2" class="form-label">Gambar 2</label>
                <?php if ($tempat['gambar2']) { ?>
                    <img src="assets/Tempat Bersejarah/<?php echo $tempat['gambar2']; ?>" alt="Gambar 2" class="mb-2" width="100">
                <?php } ?>
                <input type="file" class="form-control" id="gambar2" name="gambar2" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="gambar3" class="form-label">Gambar 3</label>
                <?php if ($tempat['gambar3']) { ?>
                    <img src="assets/Tempat Bersejarah/<?php echo $tempat['gambar3']; ?>" alt="Gambar 3" class="mb-2" width="100">
                <?php } ?>
                <input type="file" class="form-control" id="gambar3" name="gambar3" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="maps" class="form-label">Link Google Maps</label>
                <input type="url" class="form-control" id="maps" name="maps" value="<?php echo $tempat['maps']; ?>" required>
            </div>
            <a href="adminPage.php" class="btn btn-secondary">Kembali</a>
            <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- Content End -->
</body>

</html>

<script>
    document.getElementById('deleteButton').addEventListener('click', function() {
        if (confirm('Apakah Anda yakin ingin menghapus tempat ini?')) {
            window.location.href = 'action/delete.php?id=<?php echo $tempat['id']; ?>';
        }
    });
</script>