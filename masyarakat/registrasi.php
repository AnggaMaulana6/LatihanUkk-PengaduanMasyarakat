<?php
if (isset($_POST['registrasi'])) {
     //include file yang didalamnya ada mysqli_connect ($koneksi)
     include '../lib/database.php';

     //query insert
 
     $nik = $_POST['nik'];
     $nama = $_POST['nama'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $telp = $_POST['telp'];
 
     $query ="INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES ('$nik', '$nama', '$username', '$password', '$telp');";
     $execQuery = mysqli_query($koneksi, $query);
     if($execQuery) {
         header('Location:../index.php');
     } else {
         echo '<script> alert ("data anda ada yang salah")</script>';
     }
}
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Masyarakat</title>
    <link rel="stylesheet" type="text/css" href="../assets/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="../index.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div clas="row justify-content-center align-middle">
            <div class="card col-lg-6">
                <div class="card-header">
                    <center>
                        <h2>Registrasi Masyarakat</h2>
                    </center>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="nik" placeholder="Nomer Induk Kependudukan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="nama" placeholder="Nama Asli Anda" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="telp" placeholder="Nomer Telephon" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="registrasi" value="Registrasi" class="form-control btn btn-primary">
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../assets/js/dist/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../assets/js/dist/bootstrap.min.js"></script>
</html>