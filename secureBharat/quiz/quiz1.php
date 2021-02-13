<?php 
	
	$con=mysqli_connect('localhost','root','',"secure_bharat");
	$sel="select * from quiz where question_no=54";
	$exe=mysqli_query($con,$sel);
	$fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC);
	
	
	/*$x=52;
	while($x<78){
	$sel1="select * from quiz22 where question_no=$x";
	$exe2=mysqli_query($con,$sel1);
	$fetch1=mysqli_fetch_array($exe2,MYSQLI_NUM);
	
	echo $ins1="insert into quiz set question_no='".$fetch1[0]."', question_name='".$fetch1[1]."', option1='".$fetch1[2]."', option2='".$fetch1[3]."', option3='".$fetch1[4]."', correct_option='".$fetch1[5]."', complete_answer='".$fetch1[6]."', image_path='".$fetch1[7]."' ";
	$x++;
	$exe3=mysqli_query($con,$ins1);
	}
	*/
	
	
 ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link href="css/footer.css" rel="stylesheet" type="text/css"/>
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<!-- Material design -->
  <!-- <link href="css/material/bootstrap-material-design.css" rel="stylesheet">
  	<link href="css/material/ripples.min.css" rel="stylesheet">
    <script src="js/material/material.min.js"></script>
	<script src="js/material/ripples.min.js"></script>


  <script>
$(document).ready(function(){
  $.material.init();
  $("select").dropdown();
});
</script>--> 
</head>
<body>
  <div class="row">
    <h1 align="center">Cyber Security</h1>
  </div>
  <div class="col-sm-1 col-md-3 ">
  </div>
  <div class="col-sm-10 col-md-6">
    <p class="lead"><?php echo $fetch['question_no'];?>% Completed</p>
    <div class="progress">
      <div class="progress-bar" role="progressbar" style="width: <?php echo $fetch['question_no']?>%">
        <span class="sr-only">40% Completed </span>
      </div>
    </div>
  <div class="panel panel-primary">
     <div class="panel-heading">
       <h3 class="panel-title">
          <?php echo $fetch['question_name'] ?>
         </h3>
     </div>
     <div class="panel-body">
       <div class="image">
         <img src="<?php echo $fetch['image_path'] ?>" style="width:100%;"/>
       </div>
       <hr>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" > <?php echo $fetch['option1'];?>
         </label>
       </div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> <?php echo $fetch['option2'];?>
         </label>
       </div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3"> <?php echo $fetch['option3'];?>
         </label>
       </div>

     </div><div class="container"></div>
     <div class="panel-footer">
       <!-- Trigger the modal with a button -->
       <a href="#" class="btn btn-primary " data-toggle="modal" data-target="#myModal" role="button">Confirm</a>

     </div>
   </div>
 </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Answer is correct or wrong </h4>
        </div>
        <div class="modal-body">
          <p><?php echo $fetch['complete_answer'];?></p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-default" >Next</button>
        </div>
      </div>

    </div>
  </div>

</body>
