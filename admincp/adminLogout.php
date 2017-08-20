<?php
/*
  Author : SanChan (admin@sanchan.asia)
  File Name : adminLogout.php
  Description : clear all session.
*/
session_start();

session_destroy();

$link = "../login.html";
  header('Location: '. $link);
 ?>
