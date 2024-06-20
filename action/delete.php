<?php
include('../connection/connection.php');
$id = $_GET['id'];
$query = "DELETE FROM tempat_bersejarah WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header("Location: ../adminPage.php?success=Tempat Wisata Berhasil Dihapus!");
    exit();
} else {
    header("Location: ../adminPage.php?failed=Tempat Wisata Gagal Dihapus!");
    exit();
}

$stmt->close();
$conn->close();
?>
