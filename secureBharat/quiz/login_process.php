<?php
session_start();


if(isset($_POST['submit'])) {

    require_once "cxn.php";
    require_once "test.php";

    $cxn = mysqli_connect($host, $user, $pword, $dbname) or die ("error try after some time");

    foreach ($_POST as $key => $value) {
        if (check($key, $value)) {
            //echo $key . " =  " . $value . "<br>";
        } else {
            die("Invalid Data");
        }

        // Check login status

        $sql = "SELECT user_id FROM user WHERE user_email = '$_POST[email]' AND user_password = '$_POST[password]'";
        //echo $sql;
        $result = mysqli_query($cxn, $sql) or die("cant connect to database");
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        $n = mysqli_num_rows($result);

        // Login success
        if ($n >= 1) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_auth'] = "yes";

            header("Location: selectLevelQuiz.php");
        } // Login Failed
        else {
            echo "Wrong password";
        }
    }

}else{
    header("Location: login.html");
}