<?php

require "conn.php";

$URL = '../index.php?page=pinjam';

if(isset($_POST)){
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $date = date('Y-m-d');

    




    if(isset($_POST['tambah'])){
        echo 's';
        if($nama != '' || $jumlah != '' || $_POST['file']){
            $surat = upload('../uploads/files/');
            $sql = "INSERT INTO `tb_pinjam` (`id_pinjam`, `nm_pinjam`, `jml_pinjam`, `surat`, `foto`, `tanggal_masuk`, `tanggal_keluar`, `jenis`, `status`) VALUES (NULL, '$nama', '$jumlah', '$surat', '', '$tanggal', '', '$jenis', 'belum')";
           
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
       
        $surat = viewData("SELECT surat FROM tb_pinjam WHERE id_pinjam = $id", true)['surat'];


        // Check if nama or jumlah is not empty
        if(!empty($nama) || !empty($jumlah)){
            // Check if file is uploaded
            if(!empty($_FILES['file']['name'])){
                deleteAsset($surat, 'surat');
                $surat = upload('../uploads/files/');
                $sql = "UPDATE `tb_pinjam` SET `nm_pinjam` = '$nama', `jml_pinjam` = '$jumlah', `surat` = '$surat', `tanggal_masuk` = '$tanggal', `jenis` = '$jenis' WHERE `tb_pinjam`.`id_pinjam` = $id";
            } else {
                $sql = "UPDATE `tb_pinjam` SET `nm_pinjam` = '$nama', `jml_pinjam` = '$jumlah', `tanggal_masuk` = '$tanggal', `jenis` = '$jenis' WHERE `tb_pinjam`.`id_pinjam` = $id";
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
        
        $surat = viewData("SELECT surat FROM tb_pinjam WHERE id_pinjam = $id", true)['surat'];
    
        // Prepare and execute the SQL query to delete the record
        $sql = "DELETE FROM `tb_pinjam` WHERE `id_pinjam` = $id";
        if(mysqli_query($conn, $sql)){
            deleteAsset($surat, 'surat');

            header("Location: $URL&status=deleted");
            exit; // Stop script execution after redirect
        } else {
            header("Location: $URL&status=error");
            exit; // Stop script execution after redirect
        }
    }

    if(isset($_POST['konfirmasi'])){
        $id = $_POST['id'];
    
        // Prepare and execute the SQL query to delete the record
        $sql = "UPDATE `tb_pinjam` SET `status` = 'sudah', `tanggal_keluar` = '$date' WHERE `tb_pinjam`.`id_pinjam` = $id";
        if(mysqli_query($conn, $sql)){
            header("Location: $URL&status=deleted");
            exit; // Stop script execution after redirect
        } else {
            header("Location: $URL&status=error");
            exit; // Stop script execution after redirect
        }
    }
    
    
}