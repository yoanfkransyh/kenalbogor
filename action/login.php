<?php
    include('../connection/connection.php');
    session_start(); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $sql = "SELECT * FROM user WHERE email = ? AND Password = ?";
        $stmt = $conn->prepare($sql); 
        if ($stmt) {
            $stmt->bind_param("ss", $email, $password); 
            $stmt->execute();
            $stmt->store_result();    /* cek email sama password sinkron or tidak */

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($db_id, $db_nama, $db_email, $db_password, $db_status);
                $stmt->fetch(); 
                $_SESSION['id'] = $db_id;
                $_SESSION['nama'] = $db_nama;
                $_SESSION['email'] = $db_email;
                $_SESSION['status'] = $db_status;
                $_SESSION['logged_in'] = true;
                header("Location: ../landingPage.php?success=Berhasil Login"); 
                exit();
            } else {
                header("Location: ../loginPage.php?failed=Email Atau Password salah!");
                exit();
            }
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close(); 
    }
?>
