<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminListURL.php
  Description : list URL.
*/
include("../inc/database.inc.php");

session_start();
if (isset($_SESSION["userName"])){

  $list_URL = $dbConn -> prepare('SELECT * From URL; ');
  $list_URL -> execute();
  $result_list_URL = $list_URL -> fetchAll();

  ?>
  <html>
  <head>
    <title>ListURL - Administrator Panel </title>
  </head>

  <body>
    <?php  echo "Hello! ".$_SESSION["userName"];?>
    <table border="1">
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>URL</th>
      <th>Call Key</th>
      <th>Edit and View clickrate</th>
    </tr>
    <?php
      foreach ($result_list_URL as $key => $value) {
        echo "<tr>";
        echo "<td>". $value["id"] ."</td>";
        echo "<td>". $value["Name"] ."</td>";
        echo "<td>". $value["URL"] ."</td>";
        echo "<td>". $value["callKey"] ."<br> <a href='".$systemLink . $value["callKey"]."'> ".$systemLink . $value["callKey"]." </a></td>";
        echo "<td><a href='adminEditURL.php?id=". $value["id"] ."'> Edit and View clickrate </a></td>";
        echo "</tr>";
      };
     ?>
  </table>

  </body>
  </html>
  <?PHP
  include("muen.php");
}else{
  echo "ACCESS DEINED!";
};
?>
