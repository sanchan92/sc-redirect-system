<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminAddAdmin.php
  Description : add admin.
*/
include("../inc/database.inc.php");
session_start();
if (isset($_SESSION["userName"])){
  ?>
  <html>
  <head>
    <title>Add Administrator - Administrator Panel </title>
  </head>

  <body>
    <?php  echo "Hello! ".$_SESSION["userName"];?>
      <form action="adminAddAdminDo.php" method="post" id="form1">
        <table border="1">
          <tr>
            <td>ID</td>
            <td>Value</td>
          </tr>
          <tr>
            <td>User Name</td>
            <td> <input type="text" name="Username"> </td>
          </tr>
          <tr>
            <td>User Password</td>
            <td> <input type="text" name="Password"> </td>
          </tr>
          <tr>
            <td colspan="2"> <button type="submit" value="Submit">Submit</button></td>
          </tr>
        </table>
      </form>
  </body>
  </html>
  <?PHP
  include("muen.php");
}else{
  echo "ACCESS DEINED!";
};
?>
