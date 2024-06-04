<?php
require "functions/conn.php";

$sql = "SELECT * FROM tb_barang";
$result = mysqli_query($conn, $sql);
$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);


// print_r($datas);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bootstrap Table</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="assets/DataTables/datatables.css">
<link rel="stylesheet" href="assets/style.css">
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/DataTables/datatables.js"></script>

</head>

<body>
    <div class="container py-5">
        <h2>Rekapan Data Inventaris</h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Nama</th>
                    <th colspan="3" class="text-center">List 1</th>
                    <th colspan="3" class="text-center">List 2</th>
                    <th colspan="3" class="text-center">List 3</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Foto</th>
                </tr>
                <tr>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Baik</th>
                    <th class="text-center">Buruk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Baik</th>
                    <th class="text-center">Buruk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Baik</th>
                    <th class="text-center">Buruk</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        foreach($datas as $data){
        ?>
                <tr>
                    <td><?= $data['nm_barang']?></td>
                    <td><?= $data['list1']?></td>
                    <td><?= $data['baik1']?></td>
                    <td><?= $data['buruk1']?></td>

                    <td><?= $data['list2']?></td>
                    <td><?= $data['baik2']?></td>
                    <td><?= $data['buruk2']?></td>

                    <td><?= $data['list3']?></td>
                    <td><?= $data['baik3']?></td>
                    <td><?= $data['buruk3']?></td>

                    <td><img src="uploads/img/<?= $data['foto']?>" alt="" style="width: 50px; height: 40px"></td>

                </tr>
                <?php }  ?>

            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        window.print();
    </script>
</body>

</html>