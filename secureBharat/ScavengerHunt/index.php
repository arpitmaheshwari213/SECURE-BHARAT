<?php
include("connectionfactory.php");
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x18">
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../css/index.css" rel="stylesheet" type="text/css"/>
  <link href="../css/home.css" rel="stylesheet" type="text/css"/>
  <!-- <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet"> -->
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
  <style>
  	body{
		font-family:Serif;
	}
  </style>
</head>
<body>
  <?php include("header.php");?>

  <div class="container-fluid parallax">
    <div class="row" id="upperDiv" >

      <div class="col-md-6 col-md-offset-3">
      <h2>Scavenger Hunt</h2>

        <p>The basic meaning of Scavenger Hunt is typically a puzzle or riddle which the participants has to solve by using hacky techniques. Here we represent the idea to introduce students with some basic catchy knowledge to make them aware of the scam and frauds that they are engaged in. It consists of some briefs about the topic, some technique that they can ensure to stay safe, a Quiz which is aligned to test what they have learned and finally some Resources for students who have the willingness to learn more about the topic and dive into the Cyber Security world.</p>
          
      </div>
      </div>
    </div>

    <h2 align="center" style="padding:30px;color:black">TOPICS</h2>
	<div class="container" >
      <div class="row" style="margin-bottom:100px;">
    
	<?php 
	
	$sel="select * from course";
	$exe=mysqli_query($conn,$sel);
	  while($fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC)){
     	
	?>
	
	    <div class="col-md-4 col-sm-6 col-xs-12 ">
          <div class="well well-lg" style="color:black;" >
            <h3 style="color:black;"><?php echo $fetch['course_name']?></h3>
            <img src="../images/image<?php echo $fetch['image']?>.jpg" style="width:100%;min-height:150px;"/>
            <center><p style="padding-top:10px;font-size:23px;"><span style="color:green;"><i>By</i></span> &nbsp;<?php echo $fetch['course_author'];?></p></center>
            <a href="email-threats1.php" class="btn btn-raised btn-danger">Explore</a>
            
			
            
			<a onclick="showDetails(this)" class="btn btn-raised btn-danger" id="course<?php echo $fetch['course_id'];?>">About</a>
            <div  style="display:none;font-size:18px;" id="course<?php echo $fetch['course_id'];?>Details">
              <p><?php echo $fetch['course_description'];?></p>
              </div>
            </div>
          </div>

          <?php } ?>		
			
  </div>
  </div>
			
             


            <!-- Footer -->
            <div class="container-fluid " style="background-color:black;">
            <div id="footer" data-role:"footer" >
           <div class="col-md-12">
             <h4 style="color:white;text-align:center;">All copyright reserved by Hindustan Squad</h4>
           </div>

            </div>
          </div>
          </body>
