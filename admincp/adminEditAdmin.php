<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminEditAdmin.php
  Description : reset or delete admin account.
*/
include("../inc/database.inc.php");
session_start();
if (isset($_SESSION["userName"])){
  ?>
  <html>
  <head>
    <title>Index - Administrator Panel </title>
  </head>

  <body>
    <?php  echo "Hello! ".$_SESSION["userName"]. "<br>";
      if($_GET["action"] == "reset"){
        $encryptedPassword = md5($_POST["userPassword"]);
        $reset_admin = $dbConn -> prepare('UPDATE admin SET userPassword = :Password WHERE id = :id; ');
        $reset_admin -> bindParam(':id', $_POST["id"]);
        $reset_admin -> bindParam(':Password', $encryptedPassword);
        $reset_admin -> execute();

        echo "Record updated!";
      }elseif($_GET["action"] == "delete"){
        try{
        $delete_admin = $dbConn -> prepare('DELETE from admin where id = :id; ');
        $delete_admin -> bindParam(':id', $_GET["id"]);
        $delete_admin -> execute();
        echo "Delete record complete!";
      }catch (PDOException $e) {
        //  Display error
        echo 'SQL Request Failed';
        exit;
      };
      }
    ?>
  </body>
  </html>
  <?PHP
  include("muen.php");
}else{
  echo "ACCESS DEINED!";
};
?>
