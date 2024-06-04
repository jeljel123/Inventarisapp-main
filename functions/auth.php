<?php
require('conn.php');

print_r($_POST);

if(isset($_POST)){
    if(isset($_POST['login'])){
        $name = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars($_POST['password']);
        $sql = "SELECT * FROM `admin` WHERE `username` = '$name'";

        $res = viewData($sql, true);
        print_r($res);

        $db_pass = $res['password'];
        $db_id = $res['id_admin'];
        $db_nama = $res['nama'];



        try{
            if($pass == $db_pass){
                
                session_start();
                $_SESSION['status'] = 'login';
                $_SESSION['id'] = $db_id;
                $_SESSION['nama'] = $db_nama;

                header("Location: ../index.php");
            }else{
                header("Location: ../login.php");
        }   
        }catch(Exception $e){
            header("Location: ../login.php");
        }
    }
}

// function login($data){
// global $conn;

//    

// }


