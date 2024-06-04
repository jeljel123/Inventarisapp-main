<?php include "functions/conn.php"?>


<?php
session_start();
if(!isset($_SESSION['status'])){
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Dimensi</title>
</head>

<body>
   

    <section class="contents">
        <?php
            require_once "layouts/sidebar.php"
        ?>
        <div>
        <?php
        require_once "layouts/navbar.php";

        if(isset($_GET['page'])){
            $page = $_GET['page'];

            switch($page){
                case 'home':
                    include "pages/home.php";
                break;
                case 'barang':
                    include "pages/barang.php";
                break;
                case 'pinjam':
                    include "pages/pinjam.php";
                break;
                case 'dipinjam':
                    include "pages/dipinjam.php";
                break;
                case 'anggota':
                    include "pages/anggota.php";
                break;
                case 'rekap':
                    include "pages/rekap.php";
                break;
            }

        }else{
            include "pages/barang.php";
        }
        ?>
        </div>
    </section>



</body>
<script>
    let table = new DataTable('#myTable', {
        // options
        lengthChange: false,
        pageLength: 6,
        responsive: true,


    });
    </script>

</html>