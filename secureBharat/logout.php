<?php 
	  
      include_once("sessioncondition.php");
      unset($_SESSION['USERID']);
      session_destroy();
      header("Location: index.php");
?>
