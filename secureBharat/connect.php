<?php $con=mysqli_connect('localhost','root','',"secure_bharat_final");
	  session_start();
	  $sel="select * from user where user_id='".$_SESSION['session_id']."' ";
	  $exe=mysqli_query($con,$sel);
	  $fetch=mysqli_fetch_array($exe, MYSQLI_BOTH);
?>