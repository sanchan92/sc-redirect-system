<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminLogin.php
  Description : access control.
*/
include("../inc/database.inc.php");
session_start();
$link = "adminIndex.php";
$encrptedPassword = md5($_POST["userPassword"]);
try {
  $adminLogin = $dbConn -> prepare('SELECT * FROM admin where userName = :userName and userPassword = :userPassword ');
  $adminLogin -> bindParam(':userName', $_POST["userName"]);
  $adminLogin -> bindParam(':userPassword', $encrptedPassword );
  $adminLogin -> execute();
  $result_adminLogin = $adminLogin -> fetchAll();
  if($result_adminLogin){
    foreach ($result_adminLogin as $key => $value) {
        $_SESSION['userName'] = $value["userName"];
        header('Location: '. $link);
    };
  }else{
    echo "Username and password mismatch!";
  };
}catch (PDOException $e) {
  //  Display error
  echo 'SQL Request Failed';
  exit;
}

 ?>
