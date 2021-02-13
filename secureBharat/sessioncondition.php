<?php
   session_start();
   if(@$_SESSION['USERID']==""){
   header("Location: index.php");
  }
  else{
	  $user_id = $_SESSION['USERID'];
  }
?>