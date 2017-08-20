<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminAddAdminDo.php
  Description : complete add admin process.
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
    if (isset($_POST["Username"])){
      try{
        $Username = $_POST["Username"];
        $Password = md5($_POST["Password"]);

        $add_Admin = $dbConn -> prepare('INSERT INTO `admin` (`userName`, `userPassword`) VALUES (:Username, :Password); ');
        $add_Admin -> bindParam(':Username', $Username);
        $add_Admin -> bindParam(':Password', $Password);
        $add_Admin -> execute();

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
