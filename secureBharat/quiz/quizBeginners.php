<?php
session_start();
@$_SESSION['cat']=10;
if(isset($_SESSION['user_auth']) and $_SESSION['user_auth'] == "yes") {
	
    include("cxn.php");
    include("helper.php");
    $cxn = mysqli_connect($host, $user, $pword, $dbname) or die ("error try after some time");

    $user_id = $_SESSION['user_id'];

    $level = getLevel($user_id, $cxn);

        $sql = "SELECT question_id FROM user_quiz_response WHERE user_id = $user_id AND level = 1 ORDER BY question_id DESC";
        //echo $sql;
        $result = mysqli_query($cxn, $sql) or die("cant connect to database");
        $row = mysqli_fetch_assoc($result);
        $n = mysqli_num_rows($result);
		$row['question_id'];

    if($level > 0){

        //echo "no of rows ".$n."  ".$number_of_question_level_1;

        if($n >= 1 and $n < $number_of_question_level_1){

            extract($row);
            $current_question_number = $question_id + 1;

            $single_question_row = getSingleQuestionRow($current_question_number, $cxn);
            extract($single_question_row);

            //echo "yobaby";
        }elseif($n == $number_of_question_level_1){
            // Here we go to next level  (30 == 30)
            echo "last";
            
		   echo $sel="select quiz.question_id from quiz,user_quiz_response where quiz.correct_option=user_response and user_id=".$user_id." and level=1 and quiz.question_id=user_quiz_response.question_id";         
           $exe=mysqli_query($cxn,$sel);
           $fetch=mysqli_num_rows($exe);
           
           if(mysqli_num_rows(mysqli_query($cxn,"select * from user_quiz_beginner_status where user_id='".$user_id."'"))){
                echo $sel="update user_quiz_beginner_status set correct_answer_no=".$fetch." where user_id='".$user_id."' ";
		   mysqli_query($cxn,$sel);}

           
          else{  
                echo $sel="insert into user_quiz_beginner_status values(".$user_id.",".$fetch.")";         
                mysqli_query($cxn,$sel);   
               }

               $sql="delete from user_quiz_response where user_id = $user_id and level = 1";
		   	   mysqli_query($cxn,$sql);
          
          if($level==1){
              $new_level = $level + 1;
              upgradeLevel($user_id, $new_level, $cxn);
            }

             header("Location: ../quizSelection.php");

        }else{
            // fetch first question from quiz
            $current_question_number = 1;
            $single_question_row = getSingleQuestionRow($current_question_number, $cxn);
            extract($single_question_row);
            //echo "yo";
        }
    }elseif($level > 1){
		// delete where user_id = $user_id and level = 1


        if($n >= 1 and $n < $number_of_question_level_1){

            extract($row);
            $current_question_number = $question_id + 1;

            $single_question_row = getSingleQuestionRow($current_question_number, $cxn);
            extract($single_question_row);

            //echo "yobaby";
        }elseif($n == $number_of_question_level_1){
			
		}
		else{
            // fetch first question from quiz
            $current_question_number = 1;

            $single_question_row = getSingleQuestionRow($current_question_number, $cxn);
            extract($single_question_row);
            //echo "yo";
        }
	
    }
	else{
    
    }
    


    /*  Get all random questions
    $all_question_id = getAllRandomQuestionId(30,$level,$cxn);
    print_r($all_question_id);
    echo $all_question_id[0]['question_id'];
    */


}else{
    echo "Login required !";
	die();
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
.correct{
  background-color: green;
 opacity: 0.9;
}

.wrong{
  background-color: red;
  opacity: 0.9;

}
</style>
  <script>
$(document).ready(function(){
  $.material.init();
  $("select").dropdown();
});
function getRadioCheckedValue(radio_name)
{
var oRadio = document.forms[0].elements[radio_name];
for(var i = 0; i < oRadio.length; i++)
{
if(oRadio[i].checked)
{
return oRadio[i].value;
}
}
return '';
}
var executed = false;

function refresh(){
    location.reload();
}

function postStuff(){
// Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        hr = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        hr = new ActiveXObject("Microsoft.XMLHTTP");
    }
// Create some variables we need to send to our PHP file
    var url = "submit_question.php";
    var question_id = <?php echo $question_id ?>;
    var sel_option = getRadioCheckedValue("optionsRadios");
    var vars = "question_id="+question_id+"&sel_option="+sel_option;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            var ans_array = return_data.split(" +-+ ");


            document.getElementById("correct_option").innerHTML = 'Correct answer is ' + ans_array[0];
            document.getElementById("complete_answer").innerHTML = ans_array[1];
            showAnswer(ans_array[0]);

        }
    }
// Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("correct_option").innerHTML = "processing...";

}


  function showAnswer(answer){
        if (!executed) {
            executed = true;
            // do something
            // fetch answer by php and place it at the place of 1
             // answer= 1;
             a=getRadioCheckedValue("optionsRadios");
              if(a==answer){
              document.getElementById(a).parentElement.className="correct";

            }
            //  else if(a==""){
            //    alert("Please! fill an answer");
            //  }
            else {
              document.getElementById(answer).parentElement.className="correct";
              document.getElementById(a).parentElement.parentElement.parentElement.className="wrong";

            }
        }
    }

</script>
</head>
<body style="color:#009688">
  <div class="row">
    <h1 align="center">Beginner Level</h1>
	<?php 
			
	
	?>
  </div>
  <div class="col-sm-1 col-md-3 ">
  </div>
  <div class="col-sm-10 col-md-6">
    <p class="lead" style="margin-bottom:0px"><?php echo round(($current_question_number - 1)/$number_of_question_level_1*100)."%"; ?> Completed</p>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round(($current_question_number - 1)/$number_of_question_level_1*100)."%"; ?>" aria-valuemin="0" aria-valuemax="<?php echo $number_of_question_level_1 ?>" style="width: <?php echo round(($current_question_number - 1)/$number_of_question_level_1*100)."%"; ?>;">
            <span class="sr-only"><?php echo round(($current_question_number - 1)/$number_of_question_level_1*100)."%"; ?> Completed</span>
      </div>
      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round(($current_question_number - 1)/$number_of_question_level_1*100)."%"; ?>" aria-valuemin="0" aria-valuemax="<?php echo $number_of_question_level_1 ?>" style="width: <?php echo round(($current_question_number - 1)/$number_of_question_level_1*100)."%"; ?>;">
            <span class="sr-only"><?php echo round(($current_question_number - 1)/$number_of_question_level_1*100)."%"; ?> Completed</span>
      </div>
    </div>
  <div class="panel panel-primary">
     <div class="panel-heading">
       <h3 class="panel-title" style="text-align:justify;">
          <?php echo $question_name ?>
         </h3>
     </div>
      <?php
      if(!empty($image_path)){
			
      ?>
      <div class="panel-body">
          <div class="image">
              <img src="<?php echo $image_path ?>" style="width:100%;"/>
          </div>
          <?php
          }
         ?>

       <form action="" method="">
       <div class="form-group">
         <div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="1" value="1" > <?php echo $option1 ?>
         </label>
       </div>
     </div>

       <div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="2" value="2"> <?php echo $option2 ?>
         </label>
       </div>
     </div>
     <div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="3" value="3"> <?php echo $option3 ?>
         </label>
       </div>
     </div>
           <?php
           if(!empty($option4)){

           ?>
           <div>
               <div class="radio">
                   <label>
                       <input type="radio" name="optionsRadios" id="4" value="4"> <?php echo $option4 ?>
                   </label>
               </div>
           </div>
       </div>
           <?php
           }
           ?>

     </div><div class="container"></div>
     <div class="panel-footer">
       <!-- Trigger the modal with a button -->
       <a href="#" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#myModal" type="submit" onclick="postStuff()";>Confirm</a>
     </form>
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
          <h4 class="modal-title"> <p id = "correct_option"></p></h4>
        </div>

        <div class="modal-body" style="padding-top:0px;margin-top:0px;">
          <!-- By php place answer and reason -->
          <h3>Explanation</h3>
          <p id="complete_answer"></p>
        </div>

        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-raised btn-primary" onclick="refresh()">Next</button>
        </div>
      </div>

    </div>
  </div>

</body>
