<?php
include("connectionfactory.php");

           $sel="select * from sub_topic_quiz where topic_id=".$_GET['x']; 
 		         $exe=mysqli_query($conn,$sel); 
		         $fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC);		
  
  
    if(@$_POST['submit']!=''){
	  if(@$_POST['radio1']=='' && @$_POST['radio2']=='')
		echo '<script>alert("Fill the Response");</script>';
		else if(@$_POST['radio1']==$fetch['answer'])
			echo '<script>alert("Your answer is Correct");</script>';
	
	     else
			echo '<script>alert("Wrong Answer!!!!");</script>';
	
			}	
				
	  
  
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x18">
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../css/index.css" rel="stylesheet" type="text/css"/>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/sidenavbar.css" rel="stylesheet" type="text/css"/>

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
</script>
<style>
.topic{
	margin:20px;
	font-family:'Josefin Slab',sans-serif;
	font-size:17px;
	line-height:22px;
	margin-bottom:60px;
}

.border{
	border-bottom:1px solid #ddd;
	padding:5px;
	margin-bottom:25px;
}
</style>
</head>
<body>

<div class="nav-side-menu">
    <div class="brand">Secure Bharat</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-folder-open fa-lg"></i>Scavenger hunt
                  </a>
                </li>

                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i>Email Threats
                  </a>
                </li>

                

    <?php  
				$sel="select * from trivia";
                $exe=mysqli_query($conn,$sel);
                $total=mysqli_num_rows($exe);				
                
				while($total--){
                 $fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC);
				?>				
				
				    <li  data-toggle="collapse" data-target="#topic<?php echo $fetch['topic_id'];?>" class="collapsed active">
                   <a href="javascript: void(0)"><i class="fa fa-book fa-lg"></i>Topic <?php echo $fetch['topic_id'];?><span class="arrow"></span></a>
                  </li>
					<ul class="sub-menu collapse" id="topic<?php echo $fetch['topic_id']; ?>">
                    <a href="contents.php?x=<?php echo $fetch['topic_id']; ?>">Content</a>
               <?php if($fetch['content']!='') { ?><li><a href="trivia.php?x=<?php echo $fetch['topic_id'];?>">Trivia1</a></li><?php }?>
                    <li><a href="quiz.php?x=<?php echo $fetch['topic_id'];?>">Quiz</a></li>
                
                
				</ul>

                
                <?php 
				
				}?>


            </ul>
     </div>
</div>

      <div class="container-fluid">
    <div class="col-sm-offset-3 col-sm-9" style="height:100%; background-color:#fff; margin-top:10%;">
        

		<?php $sel="select * from sub_topic_quiz where topic_id=".$_GET['x']; 
 		         $exe=mysqli_query($conn,$sel); 
		       $fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC);		
		?> 
		
		<div class="topic" id="topic1">
            <h2><?php echo $fetch['question'];?></h2>
			<form method="post" action="quiz.php?x=<?php echo $fetch['topic_id'];?>">
				<input class="form-check-input" type="radio" name="radio1" value="1"> True<br>
				<input class="form-check-input" type="radio" name="radio2" value="2"> False<br>	
				<input type="submit" class="btn btn-primary" name="submit" value="Submit">
			</form>
           
            
        </div>
       
		
        
    </div>
</div>

</body>
       



	