<?php
session_start();

// echo $_SESSION['current_question_count'];
// echo "id = ".$_SESSION['user_id'];

if(isset($_SESSION['user_auth']) AND isset($_SESSION['time_left'])) {
    include("cxn.php");
    include("helper.php");
    if($_SESSION['time_left'] == "yes"){

    }else{
        header("Location: scorepage.php");
        die("yo");
    }

    $cxn = mysqli_connect($host, $user, $pword, $dbname) or die ("error try after some time");
    $user_id = $_SESSION['user_id'];
    $level = getLevel($user_id, $cxn);

    $sql = "SELECT question_id FROM user_quiz_response WHERE user_id = $user_id AND level = 2 AND user_response IS NULL ORDER BY question_id ASC";

    $result = mysqli_query($cxn, $sql) or die("cant connect to database");
    $row = mysqli_fetch_assoc($result);
    $n = mysqli_num_rows($result);

    if($level >1){
          $level_temp=2;
        //echo "no of rows ".$n."  ".$number_of_question_level_2;
          if($n == 0){
            // All question answered
            
          }else{
           extract($row); 
          }

            $all_question_ids_array = getAllRandomQuestionIdFromResponse($user_id,$level_temp,$cxn);
            //print_r($all_question_ids_array);

            if($_SESSION['current_question_count'] >=0 and $_SESSION['current_question_count'] < $number_of_question_level_2) {
               // echo '<br>$_SESSION[\'current_question_count\'] = ' . $_SESSION['current_question_count'];
            }else{
                $_SESSION['current_question_count'] = 0;
            }
            $current_question_number = $_SESSION['current_question_count'];
            
          
            $single_question_row = getSingleQuestionRow($all_question_ids_array[$_SESSION['current_question_count']]['question_id'],$cxn);
            extract($single_question_row);
           

        
    }/*elseif($level == 3){
        echo "do you want to play level 2 again";
        die();
    }*/else{
        header("Location: selectLevelQuiz.php");
    }



}else{
	header("Location: scorepage.php");
    echo "login failed";die();
}

//echo "<br>question_id = ".$question_id;
//echo "<br> tiem left".$_SESSION['time_left'];

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
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.countdownTimer.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.countdownTimer.css" />
    <script src="js/material/material.min.js"></script>
	<script src="js/material/ripples.min.js"></script>


  <script>
$(document).ready(function(){
  $.material.init();
  $("select").dropdown();
});

setTimeout(function() {
    location.reload();
}, <?php
    echo 5*60*1000;
    
    ?>);

// Timer Countdown
var refreshIntervalId = setInterval(function()
{

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
            if (xmlhttp.status == 200) {
                document.getElementById("given_date").innerHTML = xmlhttp.responseText;
            }
        }
    };

    xmlhttp.open("GET", "response.php", true);
    xmlhttp.send();

},1000);

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

function postStuff(go_variable){
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
    var url = "upgrade_question_response.php";
    var question_id = <?php echo $question_id ?>;
    var sel_option = getRadioCheckedValue("optionsRadios");
    //alert(go_variable);
    var vars = "go=" + go_variable + "&question_id="+question_id+"&sel_option="+sel_option;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("tell").innerHTML = "";
            var ans_array = return_data.split(" +++ ");


            document.getElementById("question_name").innerHTML =  ans_array[1];
            document.getElementById("optionsRadios1").innerHTML = ans_array[2];
            document.getElementById("optionsRadios2").innerHTML = ans_array[3];
            document.getElementById("optionsRadios3").innerHTML = ans_array[4];
            document.getElementById("optionsRadios4").innerHTML = ans_array[5];

            refresh();
        }
    }
// Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
document.getElementById("tell").innerHTML = "";

}

  </script>

</head>
<body style="color:#009688">
  <div class="row">
    <h1 align="center">Intermediate Quiz</h1>
      <p id="tell"><p>
  </div>

  <span id="given_date" class="style colorDefinition size_lg">&emsp;&emsp;&emsp;&emsp;</span>

  <div class="col-sm-1 col-md-3">
  </div>
  <div class="col-sm-10 col-md-6">     
	 <p class="lead" style="margin-bottom:0px"><?php echo round(($current_question_number+1)/($number_of_question_level_2)*100)."%"; ?> Completed</p>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round(($current_question_number+1)/($number_of_question_level_2)*100)."%"; ?>" aria-valuemin="0" aria-valuemax="<?php echo $number_of_question_level_2 ?>" style="width: <?php echo round(($current_question_number+1)/($number_of_question_level_2)*100)."%"; ?>;">
            <span class="sr-only"><?php echo round(($current_question_number+1)/($number_of_question_level_2)*100)."%"; ?> Completed</span>
      </div>
    </div>
  <div class="panel panel-primary">
     <div class="panel-heading">
       <h3 id="question_name" class="panel-title">
           <?php echo $question_name ?>
         </h3>
     </div>
     <div class="panel-body">
       <div class="image">
         <!-- <img style="width:100%;"/> -->
       </div>
       <!-- <hr> -->
       <form action="" method="POST">
       <div class="form-group">
       <div class="radio">
         <?php $sel="SELECT user_response FROM user_quiz_response WHERE user_id = $user_id and question_id=$question_id";
               $exe=mysqli_query($cxn,$sel);
               $fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC);
               $radio1=$fetch['user_response'];
         ?>


         <label>
           <input type="radio" name="optionsRadios" <?php if($radio1==1){echo "checked";}?> id="optionsRadios1" value="1" > <?php echo $option1 ?>
         </label>
       </div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" <?php if($radio1==2){echo "checked";}?> id="optionsRadios2" value="2"> <?php echo $option2 ?>
         </label>
       </div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" <?php if($radio1==3){echo "checked";}?> id="optionsRadios3" value="3"> <?php echo $option3 ?>
         </label>
       </div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" <?php if($radio1==4){echo "checked";}?> id="optionsRadios4" value="4"> <?php echo $option4 ?>
         </label>
       </div>
     </div>
     </div><div class="container"></div>
     <div class="panel-footer">
       <!-- Trigger the modal with a button -->

       <button type="button" name="go" class="btn btn-raised btn-primary" value="prev" onclick="postStuff('6')">Prev</button>
       <button type="button" name="go" class="btn btn-raised btn-primary" value="next" onclick="postStuff('7')">Next</button>
       <a href="scorepage.php" class="btn btn-raised btn-primary pull-right" onclick="confirm('Do you really want to submit quiz?')">Submit Quiz</a>

     </div>
   </div>
 </div>
</body>
