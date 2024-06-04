<?php

require "conn.php";


print_r($_POST);
var_dump($_POST);

if(isset($_POST)){
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $date = date('Y-m-d');
    $list_id = $_POST['list'];
    $URL = '../index.php?page=barang&list='.$list_id;
    $n = 'list'.$list_id;
    $baik = $_POST['baik'];
    $buruk = $_POST['buruk'];
    // $keterangan = $_POST['keterangan'];
//tambah
    if(isset($_POST['tambah'])){
        echo $list_id;
        echo $n;

        if($nama != '' || $jumlah != '' || $_POST['file']){
            $foto = upload('../uploads/img/');

            $sql = "INSERT INTO `tb_barang` (`id_barang`, `nm_barang`,`jenis` , `$n`, `baik$list_id`,`buruk$list_id`, `foto` , `tanggal1`, `tanggal2`, `tanggal3`) VALUES (NULL, '$nama','$jenis', '$jumlah', '$baik', '$buruk' ,'$foto' , '$date', '', '')";
            
            
                if(mysqli_query($conn, $sql)){
                    header("Location: $URL&status=ok");
                }else{
                    header("Location: $URL&status=bad");
                }
                
            

        }else{
            header("Location: $URL&status=kosong");
        }
    }
//edit
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $date = date('Y-m-d'); // Get current date

        $img = viewData("SELECT foto FROM tb_barang WHERE id_barang = $id", true)['foto'];

        print_r($img);

        // Check if nama or jumlah is not empty
        if(!empty($nama) || !empty($jumlah)){
            // Check if file is uploaded
            if(!empty($_FILES['file']['name'])){
                deleteAsset($img, 'img');
                $foto = upload('../uploads/img/'); // Assuming upload() function handles file upload
                $sql = "UPDATE `tb_barang` SET `nm_barang` = '$nama',`jenis` = '$jenis',  `$n` = '$jumlah', `baik$list_id` = '$baik', `buruk$list_id` = '$buruk', `foto` = '$foto' WHERE `id_barang` = $id";
            } else {
                $sql = "UPDATE `tb_barang` SET `nm_barang` = '$nama', `jenis` = '$jenis', `$n` = '$jumlah', `baik$list_id` = '$baik', `buruk$list_id` = '$buruk'  WHERE `id_barang` = $id";
            }
            try{
                if(mysqli_query($conn, $sql)){
                    header("Location: $URL&status=ok");
                    exit; // Stop script execution after redirect
                } else {
                    header("Location: $URL&status=bad");
                    exit; // Stop script execution after redirect
                }

            }catch(Exception $e){
                header("Location: $URL&status=err");
            };
        } else {
            header("Location: $URL&status=kosong");
            exit; // Stop script execution after redirect
        }
    }



    //hapus
    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
        $img = viewData("SELECT foto FROM tb_barang WHERE id_barang = $id", true)['foto'];
    
        // Prepare and execute the SQL query to delete the record
        $sql = "DELETE FROM `tb_barang` WHERE `id_barang` = $id";

        if(mysqli_query($conn, $sql)){
            deleteAsset($img, 'img');
            header("Location: $URL&status=deleted");
            exit; // Stop script execution after redirect
        } else {
            header("Location: $URL&status=error");
            exit; // Stop script execution after redirect
        }
    }
    
    
}