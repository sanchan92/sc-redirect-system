<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : index.php
  Description : redirect visitor to visit website and record visitor.
*/

include("inc/database.inc.php");
if (isset($_GET["action"])){
  if ($_GET["action"] == "reset_url") {
    try {
      $delete = $dbConn -> exec(' DELETE from URL; ');
      echo $delete;
      $reset = $dbConn -> prepare(' ALTER table URL AUTO_INCREMENT = 1; ');
      $reset -> execute();
      echo "Reset complete!";
    } catch (PDOException $e) {
      //  Display error
      echo 'SQL Request Failed';
      exit;
    }
  }elseif ($_GET["action"] == "reset_clickrate") {
    try {
      $delete = $dbConn -> exec(' DELETE from clickRate; ');
      echo $delete;
      $reset = $dbConn -> prepare(' ALTER table clickRate AUTO_INCREMENT = 1; ');
      $reset -> execute();
      echo "Reset complete!";
    } catch (PDOException $e) {
      //  Display error
      echo 'SQL Request Failed';
      exit;
    }
  }elseif ($_GET["action"] == "reset_admin") {
    try {
      $delete = $dbConn -> exec(' DELETE from admin; ');
      echo $delete;
      $reset = $dbConn -> prepare(' ALTER table admin AUTO_INCREMENT = 1; ');

      $reset -> execute();
      echo "Reset complete!";
    } catch (PDOException $e) {
      //  Display error
      echo 'SQL Request Failed';
      exit;
    }
  }elseif ($_GET["action"] == "add_admin") {
    try {
      $encrptedPassword = md5($_POST["userPassword"]);
      $add_admin = $dbConn -> prepare('INSERT INTO `admin` (`userName`, `userPassword`) VALUES (:userName, :userPassword);');
      $add_admin -> bindParam(':userName', $_POST["userName"]);
      $add_admin -> bindParam(':userPassword', $encrptedPassword);
      $add_admin -> execute();
      echo "Add complete!";
    } catch (PDOException $e) {
      echo 'SQL Error';
      exit;
    }

  };
};

 ?>
 <html>
 <head>
   <title>Installer SC redirect system </title>
 </head>

 <body>
   <br>
   <a href="installer.php?action=reset_url"> Reset URL record </a> <br>
   <a href="installer.php?action=reset_clickrate"> Reset Clickrate record </a> <br>
   <a href="installer.php?action=reset_admin"> Reset Administrator record </a> <br>

   <form action="installer.php?action=add_admin" method="post" id="form1">
     Username : <input type="text" name="userName"><br>
     Userpassword : <input type="password" name="userPassword">
     <button type="submit" value="Submit">Submit</button>
   </form>
   <input type="textarea" value="
   Nginx Rewrite configure

   location / {
     rewrite ^/(.*)$ /index.php?key=$1? last;
   }

   location /admincp {
       try_files $uri $uri/ /index.php?$args;
   }" >

 </body>
 </html>
