<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 3/25/2017
 * Time: 5:01 AM
 */

$number_of_question_level_1 = 30;


function getSingleQuestionRow($question_id, $cxn){
    $sql = "SELECT * FROM quiz WHERE question_id = $question_id";
    $result = mysqli_query($cxn, $sql) or die("cant connect to database");
    $row = mysqli_fetch_assoc($result);
    return $row;
}


function getLevel($user_id, $cxn){

    $sql = "SELECT quiz_level FROM user_quiz_score WHERE user_id = $user_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    $row=mysqli_fetch_assoc($result);
    return $row['quiz_level'];
}

function getQuestion($user_id, $cxn){

    $sql = "SELECT quiz_level FROM user_quiz_response WHERE user_id = $user_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    $row=mysqli_fetch_assoc($result);
    return $row['quiz_level'];
}

function getAllRandomQuestionId($number_of_question, $level, $cxn){

    $all_question_id_array = array();
    //SELECT question_id FROM quiz WHERE `question_level` = 1 ORDER BY RAND() LIMIT 10
    $sql = "SELECT question_id FROM quiz WHERE `question_level` = $level ORDER BY RAND() LIMIT $number_of_question";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    while($row = mysqli_fetch_assoc($result))
    {
        $all_question_id_array[] = $row;
    }
    return $all_question_id_array;
}

function isEmpty_user_quiz_beginner_status($user_id, $cxn){
    $sql = "SELECT current_question_number FROM user_quiz_beginner_status WHERE `user_id` = $user_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    $n = mysqli_num_rows($result);
    if($n >= 1){
        return false;
    }else{
        return true;
    }
}

function fillResponse($user_id, $question_id, $user_response, $cxn){
    $sql = "INSERT INTO user_quiz_response (user_id, question_id, user_response) VALUE ($user_id, $question_id, $user_response)";
    $result = mysqli_query($cxn, $sql) or die("cant connect to database3");
    if($result){
        return true;
    }else{
        return false;
    }
}


function upgradeLevel($user_id, $new_level, $cxn){
    $sql = "UPDATE user_quiz_score SET quiz_level = $new_level WHERE user_id = $user_id";
    $result = mysqli_query($cxn, $sql) or die("cant connect to database3");
    if($result){
        return true;
    }else{
        return false;
    }
}


?>