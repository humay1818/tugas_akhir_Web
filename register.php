<?php
session_start();
include "koneksi.php";

// Cek apakah tombol "Daftar" telah diklik
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir dan bersihkan
    $username = ($_POST["username"]);
    $namalengkap = ($_POST["namalengkap"]);
    $email = ($_POST["email"]);
    $level = ($_POST["level"]);
    $password = ($_POST["password"]);
    $ulangipassword = ($_POST["ulangiPassword"]);

    
    if($password != $ulangipassword) {
        // $error_message = "Ulangi! Password Anda tidak sama.";
        echo "<script>alert('Ulangi! Password Anda tidak sama.');</script>";
        // header("location:register.html");
    } 
    // Jika semua validasi terpenuhi, maka lakukan pendaftaran
    else {
        // Simpan data ke database
        $sql = "INSERT INTO register (username, namalengkap, email, level, password) 
                VALUES ('$username', '$namalengkap', '$email', '$level', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Pendaftaran Anda berhasil!');</script>";
            header("location:login.html");
        
        }
    }
}
?>
