<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminAddURLDo.php
  Description : complete add url process.
*/
include("../inc/database.inc.php");
session_start();
if (isset($_SESSION["userName"])){
  ?>
  <html>
  <head>
    <title>Add URL process - Administrator Panel </title>
  </head>

  <body>
    <?php  echo "Hello! ".$_SESSION["userName"]. "<br>";
    if (isset($_POST["Name"])){
      try{
        $Name = $_POST["Name"];
        $URL = $_POST["URL"];
        $callKey = $_POST["callKey"];

        $add_URL = $dbConn -> prepare('INSERT INTO `URL` (`Name`, `URL`, `callKey`) VALUES (:Name, :URL, :callKey); ');
        $add_URL -> bindParam(':Name', $Name);
        $add_URL -> bindParam(':URL', $URL);
        $add_URL -> bindParam(':callKey', $callKey);
        $add_URL -> execute();

        echo "Add record complete!";
      }catch (PDOException $e) {
        //  Display error
        echo 'SQL Request Failed';
        exit;
      };
    }else{
      echo "no data input!";
    };
    ?>
  </body>
  </html>
  <?PHP
  include("muen.php");
}else{
  echo "ACCESS DEINED!";
};
?>
