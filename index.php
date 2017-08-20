<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : index.php
  Description : redirect visitor to visit website and record visitor.
*/
include("inc/database.inc.php");

if (!isset($_GET["key"])){ //check callKey
  echo "Call Key is missing.";
}else{
  $callKey = $_GET["key"]; // get callKEY from GET methood
  $currentDATETIME = date("Y-m-d H:i:s"); //define MySQL format datetime

  //query URL information by callKey from URL
  $list_URL = $dbConn -> prepare('SELECT * From URL where callKey = :callKey; ');
  $list_URL -> bindParam(':callKey', $callKey);
  $list_URL -> execute();
  $result_list_URL = $list_URL -> fetchAll();

  //find and define IP information
  if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
  	$IP = $_SERVER["HTTP_CF_CONNECTING_IP"];
  	}else{
  	$IP = $_SERVER["REMOTE_ADDR"];
  };

  if($result_list_URL){
    //display query inforamtion
    foreach ($result_list_URL as $key => $value) {

      try {
        $idKey = $value["id"]; // define URL id
        //insert visit record
        $statement = $dbConn->prepare('INSERT INTO `clickRate` (`date`, `urlID`, `IP`) VALUES (:datetimes, :urlID, :IP);');
        $statement -> bindParam(':datetimes', $currentDATETIME);
        $statement -> bindParam(':urlID', $idKey);
        $statement -> bindParam(':IP', $IP);
        $statement -> execute();
        //redirect visitor to taget url
        header('Location: '.$value["URL"]);

      } catch (PDOException $e) {
        //  Display error
        echo 'SQL Request Failed';
        exit;
      } //end try catch

    } //end foreach
  }else{
    echo "Call Key not found!";
  };
};
?>
