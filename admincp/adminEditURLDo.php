<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminEditURLDo.php
  Description : complete edit url process.
*/
include("../inc/database.inc.php");
session_start();
if (isset($_SESSION["userName"])){
  ?>
  <html>
  <head>
    <title>Edit Process - Administrator Panel </title>
  </head>

  <body>
    <?php  echo "Hello! ".$_SESSION["userName"];
    if (isset($_POST["id"])){
      try{
        $id = $_POST["id"];
        $Name = $_POST["Name"];
        $URL = $_POST["URL"];
        $callKey = $_POST["callKey"];

        $update_URL = $dbConn -> prepare('UPDATE URL SET Name = :Name, URL = :URL, callKey = :callKey WHERE id = :id; ');
        $update_URL -> bindParam(':id', $id);
        $update_URL -> bindParam(':Name', $Name);
        $update_URL -> bindParam(':URL', $URL);
        $update_URL -> bindParam(':callKey', $callKey);
        $update_URL -> execute();

        echo "Update record complete!";
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
