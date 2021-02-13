<?php
session_start();
include("cxn.php");
include("helper.php");

$cxn = mysqli_connect($host, $user, $pword, $dbname) or die ("error try after some time");

if(isset($_SESSION['user_auth'])) {
    $user_id = $_SESSION['user_id'];


    if(isset($_POST['question_id']) and isset($_POST['sel_option'])) {
        if(is_numeric($_POST['question_id']) and is_numeric($_POST['sel_option'])){

            $question_id = mysqli_real_escape_string($cxn,$_POST['question_id']);
            $question_id = intval($question_id);
            $user_response = mysqli_real_escape_string($cxn,$_POST['sel_option']);
            $user_response = intval($user_response);
            $level = getLevel($user_id,$cxn);
			$cat_id =  @$_SESSION['cat'];


            // Insert user_quiz_beginner_status (first entry in user_quiz_beginner_status table for new user_id)
            /*
            if(isEmpty_user_quiz_beginner_status($user_id,$cxn)){
                $sql = "INSERT INTO user_quiz_beginner_status (user_id, current_question_number) VALUE ($user_id, $question_id)";
                $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
            }else{
            // Update user_quiz_beginner_status
                echo "hihih";
                $current_question_number = $question_id + 1;
                $sql = "UPDATE user_quiz_beginner_status SET current_question_number = $current_question_number WHERE user_id = $user_id";
                $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
            }
            */

            // Insert user_response in user_quiz_response table
			
			if(isset($_SESSION['cat']) AND ($_SESSION['cat']!=10)){
				fillResponseWithCatId($user_id, $question_id, $user_response, $level, $_SESSION['cat'], $cxn);
			}else{
				fillResponse($user_id, $question_id, $user_response, 1, $cxn);
			}
            // Get answer for particular question for particular question_id

            $sql = "SELECT correct_option, complete_answer FROM quiz WHERE question_id = $question_id";
            $result = mysqli_query($cxn, $sql) or die("cant connect to database2");
            $row = mysqli_fetch_assoc($result);
            extract($row);
			
			if($level == 3 AND $correct_option == $user_response AND ($_SESSION['cat']!=10)){
            // Update score_counter
                
				$sqll = "SELECT score_counter FROM user_expert_status WHERE user_id = $user_id and cat_id = $cat_id";
                $resultt = mysqli_query($cxn, $sqll) or die("cant connect to database3");
				$roww = mysqli_fetch_assoc($resultt);
				$score_counter = $roww['score_counter'] + 1;
				
                $sql = "UPDATE user_expert_status SET score_counter = $score_counter WHERE user_id = $user_id and cat_id = $cat_id";
                $result = mysqli_query($cxn, $sql) or die("cant connect to database3");
				
				$sql = "SELECT SUM(score_counter) AS sum FROM user_expert_status WHERE user_id = $user_id";
                $result = mysqli_query($cxn, $sql) or die("cant connect to database3");
                $row = mysqli_fetch_assoc($result);
				if($row['sum'] == $number_of_question_to_pass_level_3){
					upgradeLevel($user_id, 4, $cxn);
					//echo "level upgarded";
				}
            }

            echo $correct_option . " +-+ " . $complete_answer;


        }
    }
}else{
    echo "failed login";
}