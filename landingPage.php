<?php
session_start();
include('data/tempatBersejarah.php');
include('data/tempatWisata.php');
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
    <div class="container d-flex welcome">
        <div class="row justify-content-center align-self-center text-center">
            <div class="col-12">
                <h1 class="welcome-text">
                    hello, folkss!!! <br>
                    selamat datang di situs Kenal bogor, tempat dimana warisan budaya dan sejarah kota ini hidup kembali.
                    kami hadir untuk menyajikan cerita dan fakta menarik tentang tempat-tempat yang ada di
                    kota bogor
                </h1>
            </div>
        </div>
    </div>

    <div class="container d-flex label">
        <div class="row justify-content-center align-self-center text-center">
            <div class="col-12">
                <h4 class="label-text">
                    sebelumnya mari kita berkenalan dulu dengan kota bogor
                </h4>
                <p>
                    Kota Bogor memiliki sejarah yang panjang dan kaya. Nama "Bogor" diyakini berasal dari kata "Baghar" yang berarti enau atau pohon palem dalam bahasa Sunda Kuno. Sebelumnya, wilayah ini dikenal dengan nama "Pakuan Pajajaran," ibu kota Kerajaan Sunda yang berdiri pada abad ke-14. <br>
                    <br>
                    Pada masa Kerajaan Sunda, Pakuan Pajajaran menjadi pusat pemerintahan dan kebudayaan yang penting. Kerajaan ini mencapai puncak kejayaannya pada masa pemerintahan Prabu Siliwangi (Sri Baduga Maharaja), yang memerintah dari tahun 1482 hingga 1521. Istana Pakuan Pajajaran terletak di tepi sungai Ciliwung, dan sisa-sisa dari kejayaan masa lalu ini masih dapat ditemukan di beberapa situs arkeologi di Bogor. <br>
                    <br>
                    Hari ini, Bogor dikenal sebagai kota yang sejuk dengan banyak destinasi wisata menarik, seperti Kebun Raya Bogor, Istana Bogor, dan berbagai situs budaya dan sejarah lainnya. Bogor juga dikenal dengan julukan "Kota Hujan" karena curah hujannya yang tinggi sepanjang tahun. Kota ini terus berkembang sebagai pusat pendidikan, penelitian, dan pariwisata, dengan tetap mempertahankan warisan sejarah dan budayanya.
                </p>
            </div>
        </div>
    </div>

    <div class="container d-flex label">
        <div class="row justify-content-center align-self-center text-center">
            <div class="col-12">
                <h4 class="label-text">
                    beberapa tempat bersejarah di bogor
                </h4>
            </div>
        </div>
    </div>

    <!-- Carousel Tempat Bersejarah -->
    <div id="carouselTempatBersejarah" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $indicatorCount = 0;
            for ($i = 0; $i < count($tempat_array); $i += 3) {
                echo '<button type="button" data-bs-target="#carouselTempatBersejarah" data-bs-slide-to="' . $indicatorCount . '"';
                if ($indicatorCount == 0) echo ' class="active"';
                echo ' aria-current="true" aria-label="Slide ' . ($indicatorCount + 1) . '"></button>';
                $indicatorCount++;
            }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
            $isActive = true;
            for ($i = 0; $i < count($tempat_array); $i += 3) {
                echo '<div class="carousel-item' . ($isActive ? ' active' : '') . '"><div class="container-lg mb-5"><div class="row">';
                for ($j = $i; $j < $i + 3 && $j < count($tempat_array); $j++) {
            ?>
                    <div class="col-md-4 mt-2">
                        <div class="content">
                            <a href="tempatSejarahDetailPage.php">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="assets/Tempat Bersejarah/<?php echo $tempat_array[$j]['gambar1'] ?>">
                                <div class="content-details fadeIn-bottom">
                                    <h3 class="content-title"><?php echo $tempat_array[$j]['nama_tempat'] ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
            <?php
                }
                echo '</div></div></div>';
                $isActive = false;
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTempatBersejarah" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTempatBersejarah" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel Tempat Bersejarah End -->


    <div class="container d-flex label">
        <div class="row justify-content-center align-self-center text-center">
            <div class="col-12">
                <h4 class="label-text">
                    beberapa tempat wisata di bogor
                </h4>
            </div>
        </div>
    </div>

    <!-- Carousel Tempat Wisata -->
    <div id="carouselTempatWisata" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $indicatorCount = 0;
            for ($i = 0; $i < count($wisata_array); $i += 3) {
                echo '<button type="button" data-bs-target="#carouselTempatWisata" data-bs-slide-to="' . $indicatorCount . '"';
                if ($indicatorCount == 0) echo ' class="active"';
                echo ' aria-current="true" aria-label="Slide ' . ($indicatorCount + 1) . '"></button>';
                $indicatorCount++;
            }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
            $isActive = true;
            for ($i = 0; $i < count($wisata_array); $i += 3) {
                echo '<div class="carousel-item' . ($isActive ? ' active' : '') . '"><div class="container-lg mb-5"><div class="row">';
                for ($j = $i; $j < $i + 3 && $j < count($wisata_array); $j++) {
            ?>
                    <div class="col-md-4 mt-2">
                        <div class="content">
                            <a href="tempatWisataDetailPage.php?id=<?php echo $wisata_array[$j]['id'] ?>">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="assets/Tempat Wisata/<?php echo $wisata_array[$j]['gambar1'] ?>">
                                <div class="content-details fadeIn-bottom">
                                    <h3 class="content-title"><?php echo $wisata_array[$j]['nama_tempat'] ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
            <?php
                }
                echo '</div></div></div>';
                $isActive = false;
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTempatWisata" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTempatWisata" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel Tempat Wisata End -->

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
    <?php } ?>
    <!-- Notifikasi End -->

</body>

</html>