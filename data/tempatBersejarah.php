<?php
include('./connection/connection.php');

$query = "SELECT * FROM tempat_bersejarah";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$tempat_array = [];
while ($row = $result->fetch_assoc()) {
    $tempat_array[] = $row;
}
$stmt->close();
$conn->close();
?>
