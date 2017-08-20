<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminListAdmin.php
  Description : List Admin.
*/
include("../inc/database.inc.php");
session_start();
if (isset($_SESSION["userName"])){
  $list_admin = $dbConn -> prepare('SELECT * From admin; ');
  $list_admin -> execute();
  $result_list_admin = $list_admin -> fetchAll();

  ?>
  <html>
  <head>
    <title>Index - Administrator Panel </title>
  </head>

  <body>
    <?php  echo "Hello! ".$_SESSION["userName"]. "<br>";?>
    <table border="1">
      <tr>
        <td>id</td>
        <td>UserName</td>
        <td>UserPassword</td>
        <td>Reset Password</td>
        <td>Delete User</td>
      </tr>
      <?php foreach ($result_list_admin as $key => $value) { ?>
      <tr>
        <td><?php echo $value["id"]; ?></td>
        <td><?php echo $value["userName"]; ?></td>
        <td><?php echo $value["userPassword"]; ?></td>
        <td> <a href="adminResetPassword.php?id=<?php echo $value["id"]; ?>&&userName=<?php echo $value["userName"]; ?>"> Reset Password </a> </td>
        <td> <a href="adminEditAdmin.php?action=delete&&id=<?php echo $value["id"]; ?>"> Delete User </a> </td>
      </tr>
      <?php }; ?>
    </table>

  </body>
  </html>
  <?PHP
  include("muen.php");
}else{
  echo "ACCESS DEINED!";
};
?>
