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
if($fetch_user_details['user_challenge_no']==1)
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
						    header("Location: $x2");
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
              <div class="panel-body" style="">
                <div class="row">
                <div class="col-md-2 col-xs-4" style="text-align:center;">
                  <img id="th_logo" src="images/treasure_hunt_logo.png" />
                  <h4 style="font-family:sans-serif;"><?php echo $fetch_main_details['username'];?></h4>
                </div>
                <div class="col-md-2 col-xs-4" style="text-align:center;">
                  <img src="images/trophy.png" class="icons" />
                  <h4 style="font-family:sans-serif;">Challenge <br> <?php echo $fetch_user_details['user_challenge_no'];?></h4>
                </div>
                <div class="col-md-2 col-xs-4" style="text-align:center;">
                  <img src="images/coin.jpg" class="icons" />
                  <h4 style="font-family:sans-serif;">Bit Coins <br><?php echo $fetch_user_details['user_bitcoin'];?> ฿</h4>
                </div>
				<div class="col-md-2 col-xs-4" style="text-align:center;">
                    <img src="images/reward.png" class="icons" />
                    <h4 style="font-family:sans-serif;">Rewards <br><?php echo $fetch_task_details['task_reward'];?></h4>
                  </div>
				  
				<div class="col-md-2  col-xs-4" style="text-align:center;">
                    <!-- <img src="images/hint_icon.png" class="icons"/> -->
                    <form action="" method="post"><input type="image" src="images/hint.png"  class="icons" name="hint" value="click here" id="uhint" /></form>
                    <h4 style="font-family:sans-serif;">Hint Cost<br> <?php echo $fetch_task_details['task_hint_cost'];?></h4>
					<!--<div style="color:Red;"><form action="" method="post"><input type="submit" name="hint" value="click here" id="uhint"></form>
				  </div>-->
				  </div>
                <div class="col-md-2 col-xs-4" style="text-align:center;">
                  <!-- <img src="images/quit.jpg" class="icons"/> -->
                  <input type="image" src="images/quit.png" class="icons" name="quit" id="quit" />
                  <h4 style="font-family:sans-serif;"><a href="../index.php"> back to home</a></h4>
                </div>
              </div>
                <div id="frame" style="margin-top:30px;">

                    
                  
                  <!-- Question  -->
					
                    <div  style="margin:auto;text-align:left;">
					<div style="font-family:sans-serif; text-align:center;"><h1>Story</h1></div>
                    <h3 style="font-family:sans-serif;line-height:1.5;font-size:16px;margin:0px 0px;">
                        
					  Did you know what is a good password ? Just try and check it out
<br/>
A good password must includes Numbers, Symbols, Capital Letters, and Lower-Case Letters. It should have atleast 12 Characters.

But Remembered it can't be a dictionary Word or Combination of Dictionary Words.
 <br/><br/></h3>        
 <div>
 <div style="color:red;font-family:sans-serif;line-height:1.5;font-size:14px;" >
 
 <?php if(isset($_POST['submit2'])){
$pwd = $_POST['pwd'];
$i=0;$j=1;
if( strlen($pwd) < 8 ) {
	
$error= "Your Password too short!";
echo "Weakness in your password :".$pwd." is <br>".$j." .".$error." <br>";
$i++;$j++;
}

if( strlen($pwd) > 20 ) {
$error = "Your Password too long! ";
echo $i." .".$error." <br>";
$i++;$j++;
}



if( !preg_match("#[0-9]+#", $pwd) ) {
$error = "Your Password must include at least one number! ";
echo $j." .".$error." <br>";
$i++;$j++;
}

if( !preg_match("#[a-z]+#", $pwd) ) {
$error = "Your Password must include at least one letter! ";
echo $j." .".$error." <br>";
$i++;$j++;
}

if( !preg_match("#[A-Z]+#", $pwd) ) {
$error = "Your Password must include at least one CAPS! ";
echo $j." .".$error." <br>";
$i++;$j++;
}

if( !preg_match("#\W+#", $pwd) ) {
$error = "Your Password must include at least one symbol! ";
echo $j." .".$error." <br>";
$i++;$j++;
}
if($error){
	if($i>3){
	echo "      <br>Your password is too weak<br>";
	}
	else if($i>=1){
	echo "   Your password is weak<br>";
	}
	else{}
	
} else {
echo "Your password is strong.";
}
}?>
</div>
					  
					    </div>
                        
						  <form action="" method="POST" style="font-family:sans-serif;text-align:center">
                            						<input type="password" id="answer" placeholder="Check It" name="pwd" style="text-align: center;"><br>
													<div id="password" style="background-color:red"></div>													
                            <button type="submit" class="btn btn-raised btn-danger" name="submit2" style="vertical-align:middle">CHECK STRENGTH</button>
                          </form>
<br>						  
<div style="color:blue;font-family:sans-serif;text-align:center; font-size:18px;">
								<?php 
		   							if(($fetch_user_details['user_bitcoin']>=$fetch_task_details['task_hint_cost']) || $fetch_user_details['hint_status']==1) 
									 {
										 
										
		   							  if(isset($_POST['hint']) && $fetch_user_details['hint_status']==0)
									  { 	  
											
											$hint=$fetch_task_details['task_hint_desc'];
											$a=$fetch_user_details['user_bitcoin']-$fetch_task_details['task_hint_cost'];
											$update1="update user_data_treasure set hint_status=1,user_bitcoin='$a' where user_id='".$user_id."' ";
											$exe=mysqli_query($cxn, $update1);
									  }								
									}
									if($fetch_user_details['hint_status']==1){
									echo $hint=$fetch_task_details['task_hint_desc'];
									}
									?></div>
<h3 style="font-family:sans-serif;line-height:2;font-size:18px;margin:0px 20px;">   
	<span style="color:red;">Challenge :- You need to guess the easiest password ... yes you Can ..?</span>
</h3>	
<h3 style="font-family:sans-serif;line-height:2;font-size:18px;margin:0px 20px;">   
					  <div  class="col-sm-4">
123456789<br/>
password<br/>
12345<br/>
12345678<br/>
qwerty<br/>
             </div>
             <div class="col-sm-4">
						1234567<br/>
facebook<br/>
123456	<br/>
abc123<br/>
123123</div	>
            <div class="col-sm-4">
            	654321<br/>jaihind<br />1234<br />111111<br/>15august<br /><br />
            </div>
					  </h3>
					 
                        <!--<h4 style="font-family:'Josefin Slab',sans-serif;color:lime;text-align:center">ANSWER</H4>-->
                          <form action="" method="POST" style="font-family:sans-serif;text-align:center">
                            <input type="password" id="answer" placeholder="Password for this level" name="password" style="text-align: center;">
							
                            <button type="submit" class="btn btn-raised btn-success" name="submit">SUBMIT</button>
                          </form>
						 
                        </div><div style="font-color:black;">
								<?php 
		   							if(($fetch_user_details['user_bitcoin']>=$fetch_task_details['task_hint_cost']) || $fetch_user_details['hint_status']==1) 
									 {
										$hint=$fetch_task_details['task_hint_desc'];
		   							  if(isset($_POST['hint']) && $fetch_user_details['hint_status']==0)
									  { 	  
											$hint=$fetch_task_details['task_hint_desc'];
											$a=$fetch_user_details['user_bitcoin']-$fetch_task_details['task_hint_cost'];
											$update1="update user_data_treasure set hint_status=1,user_bitcoin='$a' where user_id='".$user_id."' ";
											$exe=mysqli_query($cxn, $update1);
									  }								
									}
?></div>

                      
                    </div>
                  
                </div>
              </div>
              </body>
