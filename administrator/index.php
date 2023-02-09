<!-- ini untuk login masyarakat -->
<?php
    if (isset($_SESSION['id'])) {
        if ($_SESSION['level'] == 'masyarakat') {
            header('Location:./masyarakat/menulis-pengaduan.php');
        }elseif (($_SESSION['level'] == 'admin') OR ($_SESSION['level'] == 'petugas')) {
            header('Location:./verifikasi/nonvalid.php');
        }else{
            header('Location:./logout.php');
        }
    }
if (isset($_POST['login'])) {
/* deklarasikan session start */
SESSION_START();

/* melakukan query dari username dan password yang didapatkan do form (html) ke dalam mysql */

/* melakukan koneksi ke database */
include '../lib/database.php';

/* mendapatkan data dari form dengan method post */
$username = $_POST['username'];
$password = $_POST['password'];

/* melakukan query */
$query = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password';";

$execQuery = mysqli_query($koneksi, $query);

/* melakukan aksi untuk mendapatkan data yang keluar dari hasil query */
$getData = mysqli_fetch_all($execQuery, MYSQLI_ASSOC);

/* melakukan aksi mendapatkan jumlah dari data yang keluar setelah eksekusi query */
$numRows = mysqli_num_rows($execQuery);

if ($numRows == 1) {
    /* data user dan password yang berhasil login dilakukan penyimpanan di variable Session */
    foreach ($getData as $data) {
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['level'] = $data['level'];
    }
    /* header ini digunakan untuk melempar ke halaman yang dimaksud di "Location" */
    header('location:verifikasi/nonvalid.php');
} else {
    echo '<script> alert("data anda salah")</script>';
}
}

?>

<DOCTYPE html>
<html>
<head>
    <title>Login Administrator</title>

    <link rel="stylesheet" type="text/css" href="../assets/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar">

    </nav>
    <div class="container">
        <div class="row justify-content-center align-center">
            <div class="card col-lg-6">
                <div class="card-header">
                    <center>Login ADMIN & PETUGAS</center>
                </div>
                <div clas="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" placeholder="Username" class="form-control"required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="login" value="Login" class="form-control btn btn-success">
                        </div>
                        <a href="./registrasi.php">Daftar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../assets/js/dist/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../assets/js/dist/bootstrap.min.js"></script>
</html>