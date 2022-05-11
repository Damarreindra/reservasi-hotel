<?php
error_reporting(0);
session_start();
require 'functions.php';
$pesanan = query("SELECT * FROM visitor_masuk WHERE nama_user = '".$_SESSION['nama']."'");


if( isset($_GET["cari"])){
  $datahotel = cari($_GET["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="assets/img/logomini.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Dashboard User
        </a>
        <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-danger btn-lg" href="pesanan.php">Pesanan saya</a>
        <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
        </div>
        </div>
    </nav>
    <div class="container">
    <div class="jumbotron bg-white text-danger">
        <h1 class="display-4">Hello, <b><?= $_SESSION['nama'] ?></b></h1>
        
        
    </div>
    </div>
    
    <!-- Awal Card -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                 <div class="card">
                     <div class="card-header text-white bg-secondary">
                      Pesanan
                     </div>
                      
                     <div class="card-body">
                         <table class="table">
                          <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Hotel</th>
                            <th scope="col">Tanggal Book</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                         </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1 ?>
                          <?php foreach($pesanan as $row):?>
                         <tr>
                         <td><?=$i?></td>
                         <td><?= $row ["hotel"]; ?></td>
                         <td><?= $row ["tgl_masuk"]; ?></td>
                         <td>Rp.<?= $row ["totalharga"]; ?></td>
                         <td scope="row">
                                    <a href="pdf.php?id_vm=<?php echo $row['id_vm'];?>"><button type="button" style="height:30px;width:50px" class="d-grid gap-2 btn btn-warning btn-sm">Print</button></a>
                                    <a href="hapus_pesanan.php?op=hapus&id=<?= $row["id_vm"]; ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" style="height:30px;width:50px" class="text-center d-grid gap-2 btn btn-danger btn-sm ">Delete</button></a>   
                                </td>
                        </tr>
                    
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
          </div>
        </div>
    <!-- Akhir card -->
</body>

</html>