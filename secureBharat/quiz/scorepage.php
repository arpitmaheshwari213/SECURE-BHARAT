<?php
session_start();
if(isset($_SESSION['user_auth']) AND isset($_SESSION['time_left'])) {
    include("cxn.php");
    include("helper.php");
    $cxn = mysqli_connect($host, $user, $pword, $dbname) or die ("error try after some time");
    $user_id = $_SESSION['user_id'];
    $level = getLevel($user_id, $cxn);

    if ($_SESSION['time_left'] == "no") {
		// header("Location: scorepage.php");
    } else {

    }

    // Calculate score in terms of percentage

    $percentage = calculateIntermediateScore($number_of_question_level_2, 2,$user_id, $cxn);
    // Upgrade level

    if($level == 2 && $percentage>=10){

          upgradeLevel($user_id, 3, $cxn);
       }else{
        echo "You failed better luck next time";
       }
}else{
    echo "Illegal Access";
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

    </script>

</head>
<body style="color:#009688">
<div class="row">
    <h1 align="center">Score Board</h1>
    <p id="tell"><p>
</div>



<div class="col-sm-1 col-md-3 ">
</div>
<div class="col-sm-10 col-md-6">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 id="question_name" class="panel-title">

            </h3>
        </div>
        <div class="panel-body">
            <div class="image">
                <!-- <img style="width:100%;"/> -->

                <h3 style="font-size: 1.4em;">Your Score is <?php echo $percentage."%"; ?></h3><br/>
<?php
                // Update the SQL for more details
                            
			    
			
			   
			    $sql="select user_quiz_response.question_id,question_name,user_response,correct_option from user_quiz_response,quiz where level=2 and user_quiz_response.question_id=quiz.question_id and user_quiz_response.user_id='".$user_id."'";
                $result = mysqli_query($cxn,$sql) or die("cant connect to database");
                $i=1;
                while(@$row=@mysqli_fetch_assoc($result)){
            
			        if($row['user_response']==''){
                      $sel="select option".$row['correct_option']." from  quiz where question_id=".$row['question_id'];
                      $exe=mysqli_query($cxn,$sel);
                      $fetch=mysqli_fetch_array($exe,MYSQLI_BOTH);
                         echo '<div>'.$i++.'.'.$row['question_name'].'<br/> Correct Answer='.$row['correct_option'].") ".$fetch[0].'<br/><br/>
                                    </div>';



                    }else{

                   $sel="select option".$row['correct_option'].",option".$row['user_response']." from  quiz where question_id=".$row['question_id'];
                   $exe=mysqli_query($cxn,$sel);
                   $fetch=mysqli_fetch_array($exe,MYSQLI_BOTH);

                   echo '<div>'.$i++.'.'.$row['question_name'].'<br/> User Response = '.$row['user_response'].") ".$fetch[1].'<br/><br/> </div>';
                    if($fetch[0]!=$fetch[1]){
                     
                     echo ' Correct Answer='.$row['correct_option'].") ".$fetch[0].'<br/><br/>';
   
                   }
                   else{
                   echo ' Your answer is Correct.<br/><br/>';
                   }
                   
                    
                }


}
?>
            </div>
            <!-- <hr> -->

        </div><div class="container"></div>
        <div class="panel-footer">
            <!-- Trigger the modal with a button -->
            <a href="../quizSelection.php" type="button" class="btn btn-raised btn-primary" >Go to Next level</a>
        </div>
    </div>
</div>


</body>
</html>
<?php
        
           $sql="delete from user_quiz_response where user_id = $user_id and level = 2";
           mysqli_query($cxn,$sql);
 ?>