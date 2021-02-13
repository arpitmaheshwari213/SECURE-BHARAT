<?php
session_start();

if(isset($_SESSION['USERID'])){
        $user_id = $_SESSION['USERID'];
		include("cxn.php");
		echo $user_id;
		$cxn=mysqli_connect($host,$user,$pword,$dbname) or die ("error try after some time");
		$sql="select * from user_data_treasure where user_id=$user_id";
		$exe=mysqli_query($cxn, $sql);
		$fetch_user_details=mysqli_fetch_array($exe,MYSQLI_ASSOC);
		$sql="select * from users where id=$user_id";
		$exe=mysqli_query($cxn, $sql);
		$fetch_main_details=mysqli_fetch_array($exe,MYSQLI_ASSOC);
		$sql="select * from treasure_task_bank where task_id='".$fetch_user_details['user_challenge_no']."'";
		$exe=mysqli_query($cxn, $sql);
		$fetch_task_details=mysqli_fetch_array($exe,MYSQLI_ASSOC);
	}
	else{
		header("Location: index.php");
	}
	$x="challenge".$fetch_user_details['user_challenge_no'].".php";
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Treasure Hunt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/challenge.css">
  <link href="../css/index.css" rel="stylesheet" type="text/css"/>
  <link href="css/treasure_hunt.css" rel="stylesheet" type="text/css"/>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="../js/jquery-1.10.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- Material design -->
  <link href="../css/material/bootstrap-material-design.css" rel="stylesheet">
  <link href="../css/material/ripples.min.css" rel="stylesheet">
  <script src="../js/material/material.min.js"></script>
  <script src="../js/material/ripples.min.js"></script>

  <script>	
  $(document).ready(function(){
    $.material.init();
    $("select").dropdown();
  });
  </script>
  <body style="background-image:url('image1.jpg');">
    <div class="container-fluid">
      <div class="row">
        <!-- <div class=" col-xs-12 col-md-offset-2 col-md-8" style="margin-top:20px;margin-bottom:20px;"> -->
        <div class=" col-xs-12 col-sm-8 col-sm-offset-2" style="padding:0px;margin-top:30px;">
          <div class="panel panel-success" >
            <div class="panel-heading">
              <p class="panel-title" style="text-align: center;font-family:sans-serif; font-size:24px;line-height: 1.2;">
                <!-- <i class="material-icons" style="font-size: 48px;">create</i><br> -->
                TREASURE HUNT</p>
              </div>
              <div class="panel-body" >
                <div class="row">
                <div class="col-md-3 col-sm-12" style="text-align:center;">
                  <img id="th_logo" src="images/treasure_hunt_logo.png" />
                  <h4 style="font-family:sans-serif;"><?php echo $fetch_main_details['username'];?></h4>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4" style="text-align:center;">
                  <img src="images/trophy.png" class="icons" />
                  <h4 style="font-family:sans-serif;">Challenge </h4>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4" style="text-align:center;">
                  <img src="images/coin.jpg" class="icons" />
                  <h4 style="font-family:sans-serif;">Bit Coins </h4>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4" style="text-align:center;">
                  <!-- <img src="images/quit_icon.png" class="icons"/> -->
                  <input type="image" src="images/quit.png"  class="icons" name="quit" id="quit" />
                  <h4 style="font-family:sans-serif;"><a href="../index.php"> back to home</a></h4>
                </div>
              </div>
                <div id="frame" >
                  

                    
                  <!-- Question  -->
					
                        <div style="font-family:'monospace',sans-serif;">
							
           </div>
                      
                    <div  style="margin:30px auto;text-align:center;">
                      <h3 style="font-family:sans-serif;line-height:35px;font-size:18px;margin:0px 20px;text-align:left;">
                        <ul><li>Welcome to the treasure hunt</li><li> it is the place where you gonna hit the cyber world ... !</li> <li>All the challenges are organised into levels from easy to difficult</li><li>Completion of each challenge reward you some cyber money, which can be used on hints for the cyber problems.</li><li>User get ranked on the basis of the thier current level.</li><li>You will start with 100 bitcoins.</li></ul>
                      </h3>
                        <!--<h4 style="font-family:'Josefin Slab',sans-serif;color:lime;text-align:center">ANSWER</H4>-->
                         <a href="<?php echo $x ?>" class="btn btn-success btn-raised" style="text-decoration:none;font-size:24px"><div id="button" style="width:inherit;font-family:sans-serif;">Lets Begin!!!</div></a> 
                        </div>
							
                      </div>
					 
                    </div>
					</div>
					
                  </div>
                </div>
              </div>
             

              </body>
