<?php
include('../connection/connection.php');
$id = $_GET['id'];
$query = "DELETE FROM tempat_wisata WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header("Location: ../tempatWisataPage.php?success=Tempat Wisata Berhasil Dihapus!");
    exit();
} else {
    header("Location: ../tempatWisataPage.php?failed=Tempat Wisata Gagal Dihapus!");
    exit();
}

$stmt->close();
$conn->close();
?>
