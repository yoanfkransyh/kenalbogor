<?php
session_start();
include('connection/connection.php');
include('layout/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenal Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Content -->
    <div class="container tempat-detail">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM tempat_bersejarah WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
        ?>
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/Tempat Bersejarah/<?php echo $row['gambar1']; ?>" class="carousel-image" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/Tempat Bersejarah/<?php echo $row['gambar2']; ?>" class="carousel-image" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/Tempat Bersejarah/<?php echo $row['gambar3']; ?>" class="carousel-image" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <iframe src="<?php echo htmlspecialchars($row['maps']); ?>" width="800" height="400" style="border:solid black 1px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $row['nama_tempat']; ?></h2>
                        <p><?php echo $row['deskripsi']; ?></p>
                    </div>
                </div>
        <?php
            } else {
                echo "ID Lebih dari satu";
            }
        } else {
            echo "Parameter ID tidak ditemukan.";
        }
        ?>
    </div>
    <!-- Content End -->

    <!-- Tombol Kembali -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <a href="tempatSejarahPage.php" class="btn btn-secondary float-md-end mb-3">Kembali</a>
            </div>
        </div>
    </div>

</body>

</html>