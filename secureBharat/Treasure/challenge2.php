<?php
session_start();

if(isset($_SESSION['USERID'])){
        $user_id = $_SESSION['USERID'];
		//echo $user_id;
		include("cxn.php");
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
if($fetch_user_details['user_challenge_no']==2)
                {
				//nothing;	
				}
				else
				{
					header("Location: logout.php");
				}
?>
<?php if(isset($_POST['submit']))
				 {
					if($fetch_task_details['task_pswd']==$_POST['password'])
					{
							
						    $temp1=$fetch_user_details['user_challenge_no']+1;
							$temp2=$fetch_user_details['user_bitcoin']+$fetch_task_details['task_reward'];
						 	$update1="update user_data_treasure set user_challenge_no='".$temp1."',user_bitcoin='".$temp2."', hint_status=0 where user_id='".$user_id."' ";
							mysqli_query($cxn, $update1);
							$x1=$fetch_user_details['user_challenge_no']+1;
							$x2="challenge".$x1.".php";
						    header("Location: $x2?hacker=");
							echo "you got succed";
					}
					//put it into model box;
					else{
						echo "<script>alert('Wrong Password');</script>";
					}
				 }
				 
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
  <body style="background-color:black">
    <div class="container-fluid">
      <div class="row">
        <!-- <div class=" col-xs-12 col-sm-offset-2 col-sm-8" style="margin-top:20px;margin-bottom:20px;"> -->
        <div class=" col-xs-12 col-md-12" style="padding:0px;">
          <div class="panel panel-success" >
            <div class="panel-heading">
              <p class="panel-title" style="text-align: center; font-size:24px;line-height: 1.2;">
                <!-- <i class="material-icons" style="font-size: 48px;">create</i><br> -->
                TREASURE HUNT</p>
              </div>
              <div class="panel-body" >
                <div class="row">
                <div class="col-md-3 col-sm-12" style="text-align:center;">
                  <img id="th_logo" src="images/treasure_hunt_logo.png" />
                  <h4 style="font-family:'Josefin Slab',sans-serif;"><?php echo $fetch_main_details['username'];?></h4>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4" style="text-align:center;">
                  <img src="images/trophy.png" class="icons" />">
				  
				  Challenge :- <?php echo $fetch_user_details['user_challenge_no'];?></h4>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4" style="text-align:center;">
                  <img src="images/coin.jpg" class="icons" />
                  <h4 style="font-family:sans-serif;">Bit Coins :- <?php echo $fetch_user_details['user_bitcoin'];?> ฿</h4>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4" style="text-align:center;">
                  <!-- <img src="images/quit_icon" class="icons"/> -->
                  <input type="image" src="images/quit.png" class="icons" name="quit" id="quit" />
                  <h4 style="font-family:'Josefin Slab',sans-serif;color:lime;"><a href="../index.php"> back to home</a></h4>
                </div>
              </div>
                <div id="frame" >
                  <div style="border:10px groove green;">

                    <div class="col-md-2 col-md-offset-8 col-sm-3 col-sm-offset-6 col-xs-5 col-xs-offset-2">
                    <!-- <img src="images/hint_icon.png" class="icons"/> -->
                    <form action="" method="post"><input type="image" src="images/hint_icon.png"  class="icons" name="hint" value="click here" id="uhint" /></form>
                    <h4 style="font-family:'Josefin Slab',sans-serif;color:lime;">Hint Cost :- <?php echo $fetch_task_details['task_hint_cost'];?></h4>
					<!--<div style="color:Red;"><form action="" method="post"><input type="submit" name="hint" value="click here" id="uhint"></form>
				  </div>-->
				  </div>
                  <div class="col-md-2 col-sm-3 col-xs-5" >
                    <img src="images/reward_icon.png" class="icons" />
                    <h4 style="font-family:sans-serif;color:lime;">Rewards :-<?php echo $fetch_task_details['task_reward'];?></h4>
                  </div>
                  <!-- Question  -->
					
                    <div  style="margin:auto;text-align:center;">
                      <h3 style="font-family:sans-serif;color:#ff9933;line-height:2;font-size:18px;margin:0px 20px;">
                      Do you know,<br>
  
1.Internet service providers (ISP) do  Mass-collecting information about perfectly legal things you do online.
<br>
2.Government may constantly put surveillance on your digital identity, your personal data.
<br>
3.Companies like facebook and Google sells your data.
<br>
Indirectly you are vulnerable ... !
<br>
There is a site called <a href="https://archive.org/">https://archive.org/</a>, which Archive a library of millions of free books, movies, software, music, websites, and more.  
<br>						
   </h3>        
 <div>
					  <h3 style="font-family:sans-serif;color:white;line-height:2;font-size:18px;margin:0px 20px;"> 
					  <?php if($fetch_user_details['hint_status']!=0)
									  {
											echo $fetch_task_details['task_hint_desc'];
									  }?>
						</h3>
					    </div>   
<h3 style="font-family:sans-serif;line-height:2;font-size:18px;margin:0px 20px;">   
	<span>Qusestion :- </span>You have to go there and tell me the information
	<br>about the name of the competition in 2013 like in 2017 
	<br>it is Smart India Hackathon,using the website snapshot of web i4c.co.in.
</h3>	
 <!--<img src="2a261e54-7234-49d9-9c89-cd5536c4baa8.jpg"/>-->
					 
                        <!--<h4 style="font-family:'Josefin Slab',sans-serif;color:lime;text-align:center">ANSWER</H4>-->
                          <form action="" method="POST" >
                            <input type="password" id="answer" placeholder="Password for this level" name="password" style="background-color:white;text-align: center;">
                            <br>
                            <button type="submit" class="btn btn-raised btn-success" name="submit">SUBMIT</button>
                          </form>
                        </div><div style="font-color:black;">
								<?php 
		   							if(($fetch_user_details['user_bitcoin']>=$fetch_task_details['task_hint_cost']) || $fetch_user_details['hint_status']==1) 
									 {
										
		   							  if(isset($_POST['hint']) && $fetch_user_details['hint_status']==0)
									  { 	  
											echo $hint=$fetch_task_details['task_hint_desc'];
											$a=$fetch_user_details['user_bitcoin']-$fetch_task_details['task_hint_cost'];
											$update1="update user_data_treasure set hint_status=1,user_bitcoin='$a' where user_id='".$user_id."' ";
											$exe=mysqli_query($cxn, $update1);
									  }								
									}
?></div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
             

              </body>
