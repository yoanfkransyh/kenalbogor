<?php
session_start();
include('data/tempatWisata.php');
include('layout/header.php');
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
</head>

<body>
    <!-- Content -->
    <div class="container d-flex label-2 ">
        <div class="row justify-content-center align-self-center text-center">
            <div class="col-12">
                <h4 class="label-text">
                    Daftar Tempat Wisata
                </h4>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row mt-4">
            <?php foreach ($wisata_array as $row) { ?>
                <div class="col-md-4 mt-2">
                    <div class="content">
                        <a href="tempatWisataDetailPage.php?id=<?php echo $row['id'] ?>">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="assets/Tempat Wisata/<?php echo $row['gambar1'] ?>" alt="Gambar <?php echo $row['nama_tempat'] ?>">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title"><?php echo $row['nama_tempat'] ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <a href="formTambahTempat.php" class="btn btn-primary fixed-button">
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