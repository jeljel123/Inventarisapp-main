<?php


$conn = mysqli_connect("localhost","root","","inventaris-main");




function viewData($query, $loopable = false){
    global $conn;    
    $result = mysqli_query($conn, $query);
    if($loopable == true){
        return mysqli_fetch_assoc($result);
    }
    return $result;
}

function addHistory($nama, $barang, $tempat, $perubahan, $aksi){
    global $conn;
    $query = "INSERT INTO `tb_history` (`id_histori`, `nama`, `barang`, `tempat`, `perubahan`, `aksi`) VALUES (NULL, '$nama', '$barang', '$tempat', '$perubahan', '$aksi')";
    if(mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
    }
}

function upload($location)
{
    print_r($_FILES);
    // return false;
    $namaFile = $_FILES['file']['name'];
    // $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];
    // cek jika tidak ada file diupload

    // cek yang boleh diupload
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    // lolos pengecekan
    //generate
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;
    move_uploaded_file($tmpName, $location . $namaFileBaru);
    return $namaFileBaru;
}

function deleteAsset($filename, $type) {
    $directory = '../uploads/img/';
    // Specify the directory where the images are stored
    switch($type){
        case 'img':
            $directory = '../uploads/img/';
            break;
        case 'surat':
            $directory = '../uploads/files/';
            break;

    }

    // Check if the file exists
    if (file_exists($directory . $filename)) {
        // Attempt to delete the file
        if (unlink($directory . $filename)) {
            echo "File '$filename' has been deleted successfully.";
        } else {
            echo "Error deleting file '$filename'.";
        }
    } else {
        echo "File '$filename' does not exist.";
    }
}



?>