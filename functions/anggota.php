<?php

require "conn.php";


var_dump($_POST);
print_r($_POST);

if(isset($_POST)){
    $nama = $_POST['nama'];
    $dms = $_POST['dms'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $date = date('Y-m-d');
    $URL = '../index.php?page=anggota';

    if(isset($_POST['tambah'])){
  

        if($nama != '' || $jumlah != '' || $_POST['file']){
            $foto = upload('../uploads/img/');


            $sql = "INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `dms`, `alamat`, `hp`, `foto`) VALUES (NULL, '$nama', '$dms', '$alamat', '$hp', '$foto')";

            try{
            if(mysqli_query($conn, $sql)){
                header("Location: $URL&status=ok");
            }else{
                header("Location: $URL&status=bad");
            }
            }catch(Exception $e){
            header("Location: $URL&status=err");
            }

        }else{
            header("Location: $URL&status=kosong");
        }
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];

        // Check if nama or jumlah is not empty
        if(!empty($nama) || !empty($jumlah)){
            // Check if file is uploaded
            if(!empty($_FILES['file']['name'])){
                $foto = upload('../uploads/img/'); // Assuming upload() function handles file upload
                $sql = "UPDATE `tb_anggota` SET `nama` = '$nama', `dms` = '$dms', `alamat` = '$alamat', `hp` = '$hp', `foto` = '$foto' WHERE `tb_anggota`.`id_anggota` = $id";
            } else {
                $sql = "UPDATE `tb_anggota` SET `nama` = '$nama', `dms` = '$dms', `alamat` = '$alamat', `hp` = '$hp' WHERE `tb_anggota`.`id_anggota` = $id";
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
            }

        } else {
            header("Location: $URL&status=kosong");
            exit; // Stop script execution after redirect
        }
    }



    
    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
    
        // Prepare and execute the SQL query to delete the record
        $sql = "DELETE FROM `tb_anggota` WHERE `id_anggota` = $id";
        if(mysqli_query($conn, $sql)){
            header("Location: $URL&status=deleted");
            exit; // Stop script execution after redirect
        } else {
            header("Location: $URL&status=error");
            exit; // Stop script execution after redirect
        }
    }
    
   
}