<?php
session_start();

include("test.php");
include("cxn.php");

$cxn=mysqli_connect($host,$user,$pword,$dbname) or die ("error try after some time");


if(isset($_POST['submit'])) {
    $label = array("name" =>"",
        "email" => "",
        "password" => ""
    );

}


foreach ($_POST as $key => $value) {
    if (check($key, $value)) {
        $label[$key] = safe($value);
        $label[$key] = mysqli_real_escape_string($cxn, $value);
    } else {
        die("error in $key");
    }
}

foreach($_POST as $key => $value){
    echo $key." = ".$value."<br>";
}

// Insert Data into user Table

$sql = "INSERT INTO user (user_name, user_email, user_password, join_date)
VALUES('$label[name]','$label[email]','$label[password]',NOW())";
$result = mysqli_query($cxn, $sql) or die("Cant update".mysqli_error($cxn));
$user_id = mysqli_insert_id($cxn);
$_SESSION['user_auth'] = "yes";
$_SESSION['user_id'] = $user_id;

$sql = "INSERT INTO user_quiz_score (user_id, quiz_level, quiz_score)
VALUES($user_id,1,0)";
$result = mysqli_query($cxn, $sql) or die("Cant update".mysqli_error($cxn));


// Successfull signup redirecting to ....
header("Location: selectLevelQuiz.php");

?>