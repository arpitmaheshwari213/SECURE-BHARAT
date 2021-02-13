<?php
include("sessioncondition.php");
include_once("connectionfactory.php");
 
$sel="select * from users where id=".$_SESSION['USERID'];
$exe=mysqli_query($conn,$sel);
$fetch=mysqli_fetch_assoc($exe);
$length=strlen($fetch['password']);

if(isset($_SESSION['USERID'])){
        $user_id = $_SESSION['USERID'];
		//echo $user_id;
		$sql="select * from user_data_treasure where user_id=$user_id";
		$exe=mysqli_query($conn, $sql);
		$fetch_user_details=mysqli_fetch_array($exe,MYSQLI_ASSOC);
		$sql="select * from users where id=$user_id";
		$exe=mysqli_query($conn, $sql);
		$fetch_main_details=mysqli_fetch_array($exe,MYSQLI_ASSOC);
	}
	else{
		header("Location: index.php");
	}
 
 if(@isset($_POST['update'])){
	  
	if(@$fetch['password']==$_POST['old_password']){
	
	 $sel="update users set password='".$_POST['new_password']."' where id=".$_SESSION['USERID'];  
	 mysqli_query($conn,$sel);  
	 echo "<script>alert('Password is updated successfully');</script>";
	}
   else{
	   echo "<script>alert('Wrong Password');</script>";    
   }
  
  }


?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x18">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="css/index.css" rel="stylesheet" type="text/css"/>
  <link href="css/home.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Material design -->
  <link href="css/material/bootstrap-material-design.css" rel="stylesheet">
  <link href="css/material/ripples.min.css" rel="stylesheet">
  <script src="js/material/material.min.js"></script>
  <script src="js/material/ripples.min.js"></script>
  <style>
  h1,h2,h3,h4,h5,h6,p{
    font-family:'Josefin Slab',sans-serif;

  }
  p{
    font-size:18px;
  }
  </style>

  <script>
  $(document).ready(function(){
    $.material.init();
    $("select").dropdown();
  });

  function showDetails(a)
  {
    b=a.id+"Details";
    if(document.getElementById(b).style.display=="none")
    {
      document.getElementById(b).style.display="block";
    }
    else
    document.getElementById(b).style.display="none";
  }
  </script>
</head>
<body>
 <?php include("header.php"); ?>
  <div class="container-fluid">
    <div class="row">
      <div class=" col-sm-offset-3 col-sm-6 col-xs-12 col-md-offset-3 col-md-6" style="margin-top:50px;margin-bottom:50px;">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <p class="panel-title" style="text-align: center; font-size: 36px; line-height: 1.2;">
              <i class="material-icons" style="font-size: 32px;">person</i><br>
              User Profile</p>
            </div>
            <div class="panel-body">

              <h4 style="display:inline-block">
                Name:-</h4> <?php echo $fetch['username']; ?> 
                <br>
                <h4 style="display:inline-block">
                  Email:-</h4><?php echo $fetch['email']; ?>
				  <br>
                  
				  <h4 style="display:inline-block">
                    Password:-</h4> 					
					<?php
					          for($i=0;$i<$length;$i++){
								  echo '*';
								  
							  }
					?>
					
					<br>
                    <button type="button" class="btn btn-raised btn-warning " name="update" data-toggle="modal" data-target="#myModal">Change Password</button>

                    <h2 style="color:white;background-color:#009688;padding:2px;border-radius:2px;text-align:center;box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 9px 0px, rgba(0, 0, 0, 0.2) 0px 3px 10px 0px; ">PROGRESS REPORT</h2>

                    <div class="col-xs-12" style="padding-top:20px;text-align:center;">
                      <h3 style="color:blue;">Treasure Hunt</h3>
                      <h4>Rank:-
					  <?php
					  $sel="select user_id from user_data_treasure order by user_challenge_no DESC";
					  $exe=mysqli_query($conn,$sel);
					  
					  $i=0;
		                    
					  while($fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC)){
						     $i++;
					           if($fetch['user_id']==$_SESSION['USERID']){
								echo $i;
					            break;
							  }
					    
					  }
					  
					  ?>
					  </h4>
					  <h4>Challenge No:-<?php echo $fetch_user_details['user_challenge_no'];?></h4>
                      <h4>Bit Coins:-<?php echo $fetch_user_details['user_bitcoin'];?></h4>
                    </div>

                   
                  <?php 
				    
					$sel="select * from user_quiz_response where user_id=".$_SESSION['USERID']." and level=1" ;  
				    $exe=mysqli_query($conn,$sel);					
				    $n=mysqli_num_rows($exe);  
					
				
				    
				    $sel="select correct_answer_no from user_quiz_beginner_status where user_id=".$_SESSION['USERID'];
				    $exe=mysqli_query($conn,$sel);
				    $correct=mysqli_fetch_array($exe);
				     
				    
					
					$ans=$correct[0]/$n;
				    
				  
				  ?>




				   <div class="col-xs-12" style="padding-top:20px;text-align:center;">
                      <h3 style="color:blue;">Quiz</h3>
                      <h4>Beginners</h4>
                      <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: <?php echo $ans;?>%"></div>
                      </div>
                      <h4>Intermediate</h4>
                      <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                      </div>
                      <h4>Expert</h4>
                      <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                      </div>
                      <h4>Professional</h4>
                      <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                      </div>
                    </div>

                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                  <h4 class="modal-title"> <?php echo $fetch['email']?> </h4>

                </div>
                <div class="modal-body" style="color:black;">

                  <form action="" method="POST" style="margin-top: 12px;">
                    
					<div class="form-group label-floating">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                        <label for="password" class="control-label">Old Password</label>
                        <input class="form-control" type="password" name="old_password" maxlength="60" style="font-size:18px;" required>
                      </div>
                    </div>
                    
					<div class="form-group label-floating">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                        <label for="password" class="control-label"> New Password</label>
                        <input class="form-control" type="password" name="new_password" maxlength="60" style="font-size:18px;" required>
                      </div>
                    </div>
                    <button type="submit" class="btn  btn-success " name="update" style="transition: all .25s;">Update!</button>
                  </form>

                </div>

              </form>
            </div>
          </div>
        </div>

      </div>
      <!-- Model END -->
    </body>
