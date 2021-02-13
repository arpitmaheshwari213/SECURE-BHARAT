<?php 
	$con=mysqli_connect('localhost','root','',"secure_bharat_final");
	session_start();
	
	$sel="select * from user where user_id='".$_SESSION['session_id']."' ";
	$exe=mysqli_query($con,$sel);
	$fetch=mysqli_fetch_array($exe, MYSQLI_BOTH);
	

?>

<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="css/index.css" rel="stylesheet" type="text/css"/>
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


  <script>
  $(document).ready(function(){
    $.material.init();
    $("select").dropdown();
  });
  function showDetails(a)
  {
    b=a.id+"Details";
    if(document.getElementById(b).style.display=="none")
    {document.getElementById(b).style.display="block";}
    else
    document.getElementById(b).style.display="none";
  }
  </script>
</head>
<body>
  <div class="navbar navbar-default" style="background-color:black">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-default-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">Secure Bharat</a>
      </div>
      <div class="navbar-collapse collapse navbar-default-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="treasureGetStart.php">Treasure Hunt</a></li>
          <li><a href="ScavengerGetStart.php">Scavenger Hunt</a></li>
          <li><a href="AwarenessQuiz.php">Awareness Quiz</a></li>
          <li><a href="Forum.php">Q&A Forum</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <?php 
							if($_SESSION['session_id']==''){
								//echo "<li><a href='login.php'>Login</a></li>"; 
							}
							else{
								
							}
		  ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="container-fluid parallax">
    <div class="row" style="background-color:black;opacity:0.8;min-height:400px;" >

      <div class="col-md-6 col-md-offset-3">
      <img src="Treasure/2a261e54-7234-49d9-9c89-cd5536c4baa8.jpg">
      </div>
      </div>
    </div>
   
            <!-- Footer -->
            <div class="container-fluid" style="background-color:black;">
            <div id="footer" data-role:"footer" >
           <div class="col-md-3 col-md-offset-1">
             <h4>All copyright reserved by Hindustan Squad</h4>
           </div>
           <div class="col-md-4">
           </div>
           <div class="col-md-4">
           </div>
            </div>
          </div>
          </body>
