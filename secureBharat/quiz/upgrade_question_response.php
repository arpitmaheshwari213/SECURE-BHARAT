<?php
session_start();
include("cxn.php");
include("helper.php");

$cxn = mysqli_connect($host, $user, $pword, $dbname) or die ("error try after some time");

if(isset($_SESSION['user_auth'])) {
    $user_id = $_SESSION['user_id'];
    $level = getLevel($user_id, $cxn);

    if(isset($_POST['question_id']) and isset($_POST['sel_option'])) {
        if(is_numeric($_POST['question_id'])){
            if(isset($_POST['sel_option']) and is_numeric($_POST['sel_option'])) {
                $question_id = mysqli_real_escape_string($cxn, $_POST['question_id']);
                $question_id = intval($question_id);
                $user_response = mysqli_real_escape_string($cxn, $_POST['sel_option']);
                $user_response = intval($user_response);

                upgradeResponse($user_id, $question_id, $user_response, $cxn);
            }

            $all_question_ids_array = getAllRandomQuestionIdFromResponse($user_id,$level,$cxn);
            //print_r($all_question_ids_array);


            if(isset($_POST['go']) and is_numeric($_POST['go'])){
                if($_POST['go'] == 7){
                    // Next question fetch
                    if($_SESSION['current_question_count']+1 < $number_of_question_level_4) {
                        $_SESSION['current_question_count'] = $_SESSION['current_question_count'] + 1;
                    }

                    $question_id = $all_question_ids_array[$_SESSION['current_question_count']]['question_id'];
                    $row = getSingleQuestionRow($question_id,$cxn);
                }elseif($_POST['go'] == 6){
                    // // Previous question fetch
                    if($_SESSION['current_question_count']-1 >= 0) {
                        $_SESSION['current_question_count'] = $_SESSION['current_question_count'] - 1;
                    }

                    $question_id = $all_question_ids_array[$_SESSION['current_question_count']]['question_id'];
                    $row = getSingleQuestionRow($question_id,$cxn);
                }
            }

                //echo '<br>Ajax - $_SESSION[\'current_question_count\'] = '.$_SESSION['current_question_count'].'<br>';
                extract($row);
                echo $question_id." +++ ".$question_name." +++ ".$option1." +++ ".$option2." +++ ".$option3." +++ ".$option4;

            //echo "Answer saved";

        }
    }
}else{
    echo "failed login";die();
}