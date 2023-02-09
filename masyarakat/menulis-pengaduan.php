<?php
    include '../lib/database.php';
    SESSION_START();

    if ($_SESSION['level'] != 'masyarakat') {
        header('Location:../logout.php');
    }

    $id_user = $_SESSION['id'];
    $queryShowData = "SELECT * FROM pengaduan WHERE nik = '$id_user'";
    $execQueryShowData = mysqli_query($koneksi, $queryShowData);
    $getAllData = mysqli_fetch_all($execQueryShowData, MYSQLI_ASSOC);

if (isset($_POST['adukan'])) {
    $laporan = $_POST['laporan'];

    /* Method untuk memindah file dari temp ke server */
    $locationTemp = $_FILES['foto']['tmp_name'];
    $destinationFile = '../assets/img/';
    $serverName = 'http://localhost/pengaduan_masyarakat/assets/img/';

    $fileName = str_replace(' ', '', $_FILES['foto']['name']);
    $locationUpload = $destinationFile.$fileName;
    move_uploaded_file($locationTemp, $locationUpload);

    $query = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) 
            VALUE (now(), '$id_user', '$laporan', '$serverName$fileName', NULL); ";
    $execQuery = mysqli_query($koneksi, $query);
    if ($execQuery) {
        header('Location:./menulis-pengaduan.php');
    }else{
        echo '<script>alert ("Data aduan ada yang salah penulisan)</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aduan</title>
    <link rel="stylesheet" type="text/css" href="../assets/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="./menulis-pengaduan.php" class="">Menulis Aduan !</a>
                </li>
            </ul>
            <div class="row">
                <?php
                echo $_SESSION['nama']. '<a href="../logout.php" class="">Logout</a> '
                ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center align-middle">
            <form method="POST" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <div class="md-3">
                        <label for="">Foto Penunjang</label>
                        <input type="file" name="foto" class="form-control" require>
                    </div>
                    <br>
                    <div class="md-3">
                        <label for="">Deskripsi Aduan</label>
                        <textarea name="laporan" class="form-control" require></textarea>
                    </div>
                    <br>
                    <div class="md-3">
                        <input type="submit" name="adukan" value="Adukan" class="form-control btn btn-danger">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Aduan</th>
                        <th>Foto</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=0;
                        foreach ($getAllData as $data) {
                            $no +=1;
                            if($data ['status'] == NULL) {
                                $status = 'Belum Valid';
                            }elseif ($data['status'] == '0') {
                                $status = 'Valid';
                            }
                            else {
                                $status = $data['status'];                    }
                            echo "
                            <tr>
                                <td>$no</td>
                                <td>$data[tgl_pengaduan]</td>
                                <td>
                                    <img src=$data[foto] class='img img-thumbnail' width = 100px>
                                </td>
                                <td>$data[isi_laporan]</td>
                                <td>$status</td>
                            </tr>
                            ";
                        }

                    ?>
                </tbody>
            </table>
        </div>
    </div>



    
</body>
<script type="text/javascript" src="../assets/js/dist/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../assets/js/dist/bootstrap.min.js"></script>
</html>
