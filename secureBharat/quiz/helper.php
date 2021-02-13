<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 3/25/2017
 * Time: 5:01 AM
 */

$number_of_question_level_1 = 10;    // level 1 question
$number_of_question_level_2 = 5;    // level 2 question
$number_of_question_to_pass_level_3 = 20; // level 3 question
$number_of_question_level_4 = 5;


function getSingleQuestionRow($question_id, $cxn){
    $sql = "SELECT * FROM quiz WHERE question_id = $question_id";
    $result = mysqli_query($cxn, $sql) or die("cant connect to database");
    $row = mysqli_fetch_assoc($result);
    return $row;
}


function getLevel($user_id, $cxn){

    $sql = "SELECT quiz_level FROM user_quiz_score WHERE user_id = $user_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database1");
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

function getAllRandomQuestionIdFromResponse($user_id, $level, $cxn){

    $all_question_id_array = array();
    //SELECT question_id FROM quiz WHERE `question_level` = 1 ORDER BY RAND() LIMIT 10
    $sql = "SELECT question_id FROM user_quiz_response WHERE user_id = $user_id AND level = $level";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    while($row = mysqli_fetch_assoc($result))
    {
        $all_question_id_array[] = $row;
    }
    return $all_question_id_array;
}

function getAllRandomQuestionIdFromResponseLevel4($user_id, $level, $cxn){
	$all_question_id_array = array();
    //SELECT question_id FROM quiz WHERE `question_level` = 1 ORDER BY RAND() LIMIT 10
    $sql = "SELECT question_id FROM user_quiz_response WHERE user_id = $user_id AND level = $level";
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

function fillResponse($user_id, $question_id, $user_response, $level, $cxn){
	$sql = "SELECT * FROM user_quiz_response WHERE user_id = $user_id AND question_id = $question_id";
	$result = mysqli_query($cxn, $sql) or die("cant connect to database7");
	$n = mysqli_num_rows($result);
    if($n == 1){
		
	}else{
    $sql = "INSERT INTO user_quiz_response (user_id, question_id, user_response, level) VALUE ($user_id, $question_id, $user_response, $level)";
    $result = mysqli_query($cxn, $sql) or die("cant connect to database3");
    if($result){
        return true;
    }else{
     
	 return false;
    }
	}
	return true;
}

function fillResponseWithCatId($user_id, $question_id, $user_response, $level, $cat_id, $cxn){
	$sql = "SELECT * FROM user_quiz_response WHERE user_id = $user_id AND question_id = $question_id";
	$result = mysqli_query($cxn, $sql) or die("cant connect to database7");
	$n = mysqli_num_rows($result);
    if($n == 1){
		
	}else{
    $sql = "INSERT INTO user_quiz_response (user_id, question_id, user_response, level, cat_id) VALUE ($user_id, $question_id, $user_response, $level, $cat_id)";
    $result = mysqli_query($cxn, $sql) or die("cant connect to database3");
    if($result){
        return true;
    }else{
        return false;
    }
	}
	return true;
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

function insertPartialRow($user_id, $question_id, $level, $cxn){
    $sql = "INSERT INTO user_quiz_response (user_id, question_id, level) VALUE ($user_id, $question_id, $level)";
    $result = mysqli_query($cxn, $sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

function iniIntermediate($user_id, $number_of_question_level_2, $level, $cxn){
    $all_question_id_array = getAllRandomQuestionId($number_of_question_level_2, $level, $cxn);
    echo "<br>".$all_question_id_array[0]['question_id']."<br>";
    print_r($all_question_id_array);

    $sql = "SELECT * FROM user_quiz_response WHERE user_id = $user_id and level = $level";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database2".mysqli_error($cxn));
    $n = mysqli_num_rows($result);
    if($n > 0){

    }else{
        for ($i = 0; $i < $number_of_question_level_2; $i++ ){
            $question_id = $all_question_id_array[$i]['question_id'];
            insertPartialRow($user_id, $question_id, $level, $cxn);
            }
    }

}

function nextQuestion($user_id, $question_id, $cxn){
    $sql = "SELECT * FROM user_quiz_response WHERE user_id = $user_id and question_id = $question_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    $row=mysqli_fetch_assoc($result);
    $level = $row['level'];
    $serial_id = $row['serial_id'];
    $serial_id = $serial_id + 1;
    $sql = "SELECT question_id FROM user_quiz_response WHERE serial_id = $serial_id and level = $level";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    $question_id = $row['question_id'];
    $sql = "SELECT * FROM quiz WHERE question_id = $question_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    return $row;
}

function prevQuestion($user_id, $question_id, $cxn){
    $sql = "SELECT * FROM user_quiz_response WHERE user_id = $user_id and question_id = $question_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    $row=mysqli_fetch_assoc($result);
    $level = $row['level'];
    $serial_id = $row['serial_id'];
    $serial_id = $serial_id - 1;
    $sql = "SELECT question_id FROM user_quiz_response WHERE serial_id = $serial_id and level = $level";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    $question_id = $row['question_id'];
    $sql = "SELECT * FROM quiz WHERE question_id = $question_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    return $row;
}

function upgradeResponse($user_id, $question_id, $user_response, $cxn){
    $sql = "UPDATE user_quiz_response SET user_response = $user_response WHERE user_id = $user_id AND question_id = $question_id";
    $result = mysqli_query($cxn, $sql) or die("cant connect to database3".mysqli_error($cxn));
    if($result){
        return true;
    }else{
        return false;
    }
}

function calculateIntermediateScore($number_of_question_level_2,$level,$user_id, $cxn){
    $sum = 0;
    $sql = "SELECT quiz.question_id, quiz.correct_option, user_quiz_response.user_response FROM quiz INNER JOIN user_quiz_response ON quiz.question_id=user_quiz_response.question_id WHERE level = $level and user_id=$user_id";
    $result = mysqli_query($cxn,$sql) or die("cant connect to database");
    while($row=mysqli_fetch_assoc($result)){
        if($row['correct_option'] == $row['user_response']){
            $sum = $sum + 1;
        }
    }
    $percentage = round(($sum / $number_of_question_level_2)*100);
    return $percentage;

}

function iniExpert($user_id,$cxn){
	$sql = "SELECT DISTINCT `question_category_id` FROM `quiz` WHERE `question_level` =3";
	$result = mysqli_query($cxn,$sql) or die("cant connect to database");
	$n = mysqli_num_rows($result);
	for($i = 1;$i <= 6 ;$i++){
    $sql = "INSERT INTO user_expert_status (user_id, score_counter, cat_id) VALUE ('$user_id', 0, $i)";
    $result = mysqli_query($cxn, $sql);
	}
}

?>