<?php
include('./connection/connection.php');

$query = "SELECT * FROM tempat_wisata";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$wisata_array = [];
while ($row = $result->fetch_assoc()) {
    $wisata_array[] = $row;
}
$stmt->close();
$conn->close();
?>
