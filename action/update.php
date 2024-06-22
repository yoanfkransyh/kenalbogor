<?php
include('../connection/connection.php');

$id = $_POST['id'];
$namaTempat = $_POST['namaTempat'];
$deskripsi = $_POST['deskripsi'];
$maps = $_POST['maps'];
                                                    /* bagian update misal masukin kata baru */
$gambar1 = $_FILES['gambar1']['name'];
$gambar2 = $_FILES['gambar2']['name'];
$gambar3 = $_FILES['gambar3']['name'];

$target_dir = "../assets/Tempat Bersejarah/";

if ($gambar1) {
    $target_file1 = $target_dir . basename($gambar1);
    move_uploaded_file($_FILES['gambar1']['tmp_name'], $target_file1); /* gambar ada yg diubah */
} else {
    $query = "SELECT gambar1 FROM tempat_bersejarah WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();                                                  /* gambar ga ada yg di ubah diambil yg udh ada */             
    $result = $stmt->get_result();
    $tempat = $result->fetch_assoc();
    $gambar1 = $tempat['gambar1'];
}

if ($gambar2) {
    $target_file2 = $target_dir . basename($gambar2);
    move_uploaded_file($_FILES['gambar2']['tmp_name'], $target_file2);
} else {
    $query = "SELECT gambar2 FROM tempat_bersejarah WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $tempat = $result->fetch_assoc();
    $gambar2 = $tempat['gambar2'];
}

if ($gambar3) {
    $target_file3 = $target_dir . basename($gambar3);
    move_uploaded_file($_FILES['gambar3']['tmp_name'], $target_file3);
} else {
    $query = "SELECT gambar3 FROM tempat_bersejarah WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $tempat = $result->fetch_assoc();
    $gambar3 = $tempat['gambar3'];
}

$query = "UPDATE tempat_bersejarah SET nama_tempat=?, deskripsi=?, gambar1=?, gambar2=?, gambar3=?, maps=? WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ssssssi', $namaTempat, $deskripsi, $gambar1, $gambar2, $gambar3, $maps, $id);

if ($stmt->execute()) {
    header("Location: ../adminPage.php?success=Tempat Wisata Berhasil Diubah!");
    exit();
} else {
    header("Location: ../adminPage.php?failed=Tempat Wisata Gagal Diubah!");
    exit();
}

$stmt->close();
$conn->close();

?>
