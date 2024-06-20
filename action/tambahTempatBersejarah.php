<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../connection/connection.php');

    $user = $_SESSION['id'];
    $namaTempat = $_POST['namaTempat'];
    $deskripsi = $_POST['deskripsi'];
    $maps = $_POST['maps'];

    $gambar1 = $_FILES['gambar1']['name'];
    $gambar2 = $_FILES['gambar2']['name'];
    $gambar3 = $_FILES['gambar3']['name'];

    $target_dir = "../assets/Tempat Wisata/";
    $target_file1 = $target_dir . basename($gambar1);
    $target_file2 = $target_dir . basename($gambar2);
    $target_file3 = $target_dir . basename($gambar3);

    move_uploaded_file($_FILES['gambar1']['tmp_name'], $target_file1);
    move_uploaded_file($_FILES['gambar2']['tmp_name'], $target_file2);
    move_uploaded_file($_FILES['gambar3']['tmp_name'], $target_file3);

    $sql = "INSERT INTO tempat_bersejarah (nama_tempat, deskripsi, gambar1, gambar2, gambar3, maps) VALUES ('$namaTempat', '$deskripsi', '$gambar1', '$gambar2', '$gambar3', '$maps')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../tempatSejarahPage.php?success=Tempat Wisata Berhasil Ditambahkan!");
        exit();
    } else {
        header("Location: ../tempatSejarahPage.php?failed=Tempat Wisata Gagal Ditambahkan!");
        exit();
    }
    $conn->close();
}
?>