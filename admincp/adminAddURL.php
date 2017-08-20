<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminAddURL.php
  Description : Add URL record.
*/
include("../inc/database.inc.php");
session_start();
if (isset($_SESSION["userName"])){
  ?>
  <html>
  <head>
    <title>Add URL - Administrator Panel </title>
  </head>

  <body>
    <?php  echo "Hello! ".$_SESSION["userName"]. "<br>";?>
    <form action="adminAddURLDo.php" method="post" id="form1">
      <table border="1">
        <tr>
          <td>ID</td>
          <td>Value</td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input type="text" name="Name"></td>
        </tr>
        <tr>
          <td>URL</td>
          <td><input type="text" name="URL"></td>
        </tr>
        <tr>
          <td>Call Key</td>
          <td><input type="text" name="callKey"></td>
        </tr>
        <tr>
          <td colspan="2"> <button type="submit" value="Submit">Submit</button> </td>
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
