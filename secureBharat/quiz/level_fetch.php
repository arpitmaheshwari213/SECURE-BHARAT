<?php
session_start();

if(isset($_SESSION['user_auth'])) {
    $user_id = $_SESSION['user_id'];
	echo $user_id;
    include("cxn.php");
    include("helper.php");
    $cxn = mysqli_connect($host, $user, $pword, $dbname) or die ("error try after some time");

    $level = getLevel($user_id, $cxn);

    if($level == $_POST['Level']) {
        if ($level == 1) {
            header("Location: quizBeginners.php");
        } elseif ($level == 2) {
            include("first.php");
            iniIntermediate($user_id, $number_of_question_level_2, 2, $cxn);
            $_SESSION['current_question_count'] = 0;
            header("Location: quizIntermediate.php");
        } elseif ($level == 3) {
			if(is_numeric($_POST['cat']) and $_POST['cat'] > 0 and $_POST['cat'] < 50){
			$_SESSION['cat'] = $_POST['cat'];
			}
			iniExpert($user_id,$cxn);
            header("Location: quizExpert.php");
        } elseif ($level == 4) {
			include("first.php");
            iniIntermediate($user_id, $number_of_question_level_4, 4, $cxn);
            $_SESSION['current_question_count'] = 0;
            header("Location: quizProfessional.php");
        }
    } // Restart already played game
	elseif($_POST['Level'] < $level){
        if ($_POST['Level'] == 1) {
            header("Location: quizBeginners.php");
        } elseif ($_POST['Level'] == 2) {
            include("first.php");
            iniIntermediate($user_id, $number_of_question_level_2, 2, $cxn);
            $_SESSION['current_question_count'] = 0;
            header("Location: quizIntermediate.php");
        } elseif ($_POST['Level'] == 3) {
			iniExpert($user_id,$cxn);
            header("Location: quizExpert.php");
        } elseif ($_POST['Level'] == 4) {
			include("first.php");
            iniIntermediate($user_id, $number_of_question_level_4, 4, $cxn);
            $_SESSION['current_question_count'] = 0;
            header("Location: quizProfessional.php");
        }
    }
}