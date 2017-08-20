<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminEditURL.php
  Description : Edite and view clickrate.
*/
include("../inc/database.inc.php");
session_start();
if (isset($_SESSION["userName"])){
  //list URL infomation
  $list_URL = $dbConn -> prepare('SELECT * From URL where id = :id; ');
  $list_URL -> bindParam(':id', $_GET["id"]);
  $list_URL -> execute();
  $result_list_URL = $list_URL -> fetchAll();

  //show clickrate and detail
  $clickrate_URL = $dbConn -> prepare('SELECT * From clickRate where urlID = :id; ');
  $clickrate_URL -> bindParam(':id', $_GET["id"]);
  $clickrate_URL -> execute();
  $result_clickrate_URL = $clickrate_URL -> fetchAll();
  $number_of_clickrate_URL = $clickrate_URL -> rowCount();
  ?>
  <html>
  <head>
    <title>Edit - Administrator Panel </title>
  </head>

  <body>
    <?php  echo "Hello! ".$_SESSION["userName"];?>
    <form action="adminEditURLDo.php" method="post" id="form1">
      <?php foreach ($result_list_URL as $key => $value) { ?>
        <table border="1">
          <tr>
            <td>id</td>
            <td>value</td>
          </tr>
          <tr>
            <td>id</td>
            <td> <input type="text" name="id" value="<?php echo $value["id"]; ?>" readonly="true"> </td>
          </tr>
          <tr>
            <td>Name</td>
            <td> <input type="text" name="Name" value="<?php echo $value["Name"]; ?>"> </td>
          </tr>
          <tr>
            <td>URL</td>
            <td> <input type="text" name="URL" value="<?php echo $value["URL"]; ?>"> </td>
          </tr>
          <tr>
            <td>callKey</td>
            <td> <input type="text" name="callKey" value="<?php echo $value["callKey"]; ?>"> </td>
          </tr>
          <tr>
            <td colspan="2"> <button type="submit" value="Submit">Submit</button> </td>
          </tr>
        </table>
      <?php }; ?>
    </form>
    <br>
    <hr>
    <br>
    Clcikrate : <?php echo $number_of_clickrate_URL; ?> <br>
    <?php if ($number_of_clickrate_URL > 0) {?>
      <table border="1">
        <tr>
          <td>ID</td>
          <td>Date</td>
          <td>URL ID</td>
          <td>Vistor IP</td>
        </tr>
        <?php foreach ($result_clickrate_URL as $key => $value) { ?>
        <tr>
          <td><?php echo $value["id"]; ?></td>
          <td><?php echo $value["date"]; ?></td>
          <td><?php echo $value["urlID"]; ?></td>
          <td><?php echo $value["IP"]; ?></td>
        </tr>
        <?php }; ?>
      </table>
      <?php
    }else{
      echo "No clickrate recorded.";
    }; ?>

  </body>
  </html>
  <?PHP
  include("muen.php");
}else{
  echo "ACCESS DEINED!";
};
?>
