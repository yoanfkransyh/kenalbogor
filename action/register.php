<?php
include('../connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : ''; 
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "SELECT email FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);                                
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            header("Location: ../registerPage.php?failed=Gagal Membuat Akun");
            $stmt->close();
            exit();                                             /* cek email udah di pake apa blm*/
        } else {
            $stmt->close();
            $sql = "INSERT INTO user (nama, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sss", $nama, $email, $password);
                if ($stmt->execute()) {
                    header("Location: ../registerPage.php?success=Berhasil Membuat Akun");  /* bikin akun */
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();                                 /* error database muncul ini */
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

