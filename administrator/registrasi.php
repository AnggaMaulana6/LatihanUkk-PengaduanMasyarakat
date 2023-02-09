<?php
// if ($_SESSION['level'] != 'admin') {
//     header('Location:./logout.php');
// }

SESSION_START();
if (isset($_POST['registrasi'])) {
     //include file yang didalamnya ada mysqli_connect ($koneksi)
     include '../lib/database.php';

     //query insert
 
     $nama_petugas = $_POST['nama_petugas'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $telp = $_POST['telp'];
     $level = $_POST['level'];
 
     $query ="INSERT INTO petugas ( nama_petugas, username, password, telp, level) VALUE ('$nama_petugas', '$username', '$password', '$telp', '$level');";
     $execQuery = mysqli_query($koneksi, $query);
     if($execQuery) {
         header('Location:./index.php');
     } else {
         echo '<script> alert ("data anda ada yang salah")</script>';
     }
    //  var_dump($query);
}
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Administrator</title>
    <link rel="stylesheet" type="text/css" href="../assets/dist/css/bootstrap.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="./index.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row-justify-content-center align-middle">
            <div class="card col-lg-6">
                <div class="class-header">
                    <center>
                        <h2>Registrasi Admin & Petugas</h2>
                    </center>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="nama_petugas" placeholder="Nama Asli Anda" class="form-control" required>
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
                            <select name="level" class="form-control">
                                <option value="">~ Pilih level ~</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="registrasi" value="Registrasi" class="form-control btn btn-success">
                        </div>
                    </form>          
                </div>
            </div>
        </div>
    </div>
</body>
</html>