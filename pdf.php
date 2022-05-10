<?php
require 'koneksi.php';
$pesanan = mysqli_query($koneksi, "SELECT * FROM visitor_masuk WHERE id_vm = '".$_GET['id_vm']."' ");
$d = mysqli_fetch_object($pesanan); 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<style type="text/css">
@media print{
    *{display:none;}
    .print{display:block;}
    @import url('https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap');body{font-family: 'Maven Pro', sans-serif;background-color: #f12369}hr{color: #0000004f;margin-top: 5px;margin-bottom: 5px}.add td{color: #c5c4c4;text-transform: uppercase;font-size: 12px}.content{font-size: 14px}
}
</style>
</head>
<body>

<div class="container mt-5 mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex flex-row p-2"> <img src="assets/img/logo.jpg" width="48">
                    <div class="d-flex flex-column"> <span class="font-weight-bold">Tax Invoice</span> <small>Invoice ID : <?php echo $d->id_vm ?></small> </div>
                </div>
                <hr>
                <div class="table-responsive p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>To</td>
                                <td>From</td>
                            </tr>
                            <tr class="content">
                                <td class="font-weight-bold">User <br><?php echo $d->nama_user ?> <br>Indonesia</td>
                                <td class="font-weight-bold">IYO<br> Damareindra <br> Indonesia</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>Hotel</td>
                                <td>Days</td>
                                <td>Date</td>
                                <td class="text-center">Total</td>
                            </tr>
                            <tr class="content">
                                <td><?php echo $d->hotel ?></td>
                                <td><?php echo $d->jumlah ?></td>
                                <td><?php echo $d->tgl_masuk ?></td>
                                <td class="text-center">Rp.<?php echo $d->totalharga ?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="address p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="d-flex flex-column text-danger">
                                <td>NOTES</td>
                                <br>
                                <td> Jika 24 Jam setelah booking dan tidak menyerahkan bills kepada resepsionis booking dianggap batal!</td>
                            
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="javascript:window.print()">Click to print</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>