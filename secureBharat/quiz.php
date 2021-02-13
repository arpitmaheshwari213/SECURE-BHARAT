<?php 
	
	$con2=mysqli_connect('localhost','root','',"secure_bharat");
	$sel="select * from quiz where question_id=37";
	$exe=mysqli_query($con2,$sel);
	$fetch=mysqli_fetch_array($exe, MYSQLI_BOTH);
	
	
	
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
  <script language="javascript">
  function yo(){
        var e = document.getElementById("filter");
        var filter = e.options[e.selectedIndex].value;

    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById('items-list').innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET","dup.php?filter_by="+ filter + "&place=Kunhari",true);
    xmlhttp.send();
    }
    </script>
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
    <p class="lead"><?php echo $fetch['question_id'];?>% Completed</p>
    <div class="progress">
      <div class="progress-bar" role="progressbar" style="width: <?php echo $fetch['question_id']?>%">
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
           <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" > <?php echo $fetch['option1'];?>
         </label>
       </div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="optionsRadios2" value="2"> <?php echo $fetch['option2'];?>
         </label>
       </div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="optionsRadios3" value="3"> <?php echo $fetch['option3'];?>
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
          <h4 class="modal-title">Answer is <?php echo "your ans is  correct";
		   ?> </h4>
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
