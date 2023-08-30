<?php 
  // Starts the session
  session_start(); 
if(!isset($_SESSION['UserData']['user_name'])){
  header("location:login.php");
  exit;
  }
  ?>
  Congratulation!<br />
  You have logged into password protected page.<br />
  <a href="logout.php">Click here</a> to Logout
        