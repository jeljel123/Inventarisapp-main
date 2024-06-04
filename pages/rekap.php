<?php
// require "functions/conn.php";

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
        <div class="conttainer pt-3">
            <div class="row ">
                <div class="d-flex justify-content-end ">
                    <a href="rekap.php" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                            <path
                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                        </svg>
                        Print</a>

                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>