<?php
// Menghubungkan ke database
$servername = "localhost:3308";
$username = "root"; // Sesuaikan dengan username MySQL Anda
$password = ""; // Sesuaikan dengan password MySQL Anda
$dbname = "formRegistrasi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$ulang_pass = $_POST['ulang_pass'];

// Cek apakah password dan ulangi password sama
if ($password !== $ulang_pass) {
    die("Password dan ulangi password tidak sama!");
}

// Hash password sebelum menyimpan
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan data ke database
$sql = "INSERT INTO registrasi (nama, email, password) VALUES ('$nama', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registrasi berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
