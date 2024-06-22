<?php
session_start();
include('layout/header.php');
if (isset($_SESSION['logged_in'])) {
    header('location: landingPage.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kenal Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Content -->
    <div class="container d-flex justify-content-center align-items-center conlog-container">
        <div class="conlog p-4 shadow rounded text-center">
            <img src="assets/Logo2.png" alt="Logo" class="mb-4" width="125px">
            <form action="action/login.php" method="POST">
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
            <div class="register mt-3">
                <p>Belum Mempunyai Akun? <a href="registerPage.php">Daftar</a></p>
            </div>
        </div>
    </div>
    <!-- Content End -->

    <!-- Notifikasi -->
    <?php if (isset($_GET["failed"])) { ?>
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