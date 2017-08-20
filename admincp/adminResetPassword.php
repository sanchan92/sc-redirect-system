<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminResetPassword.php
  Description : access control.
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
    <?php  echo "Hello! ".$_SESSION["userName"]. "<br>";?>
    <form action="adminEditAdmin.php?action=reset" method="post" id="form1">
      <table>
        <tr>
          <td>Id</tb>
          <td><input type="text" name="id" value="<?php echo $_GET["id"]; ?>" readonly="true"></td>
        </tr>
        <tr>
          <td>userName</td>
          <td><input type="text" name="userName" value="<?php echo $_GET["userName"]; ?>" readonly="true"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="userPassword" ></td>
        </tr>
      </table>
      <button type="submit" value="Submit">Submit</button>
    </form>
  </body>
  </html>
  <?PHP
  include("muen.php");
}else{
  echo "ACCESS DEINED!";
};
?>
