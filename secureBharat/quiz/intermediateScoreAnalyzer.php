<?php
session_start();
echo $_SESSION['user_auth'];

if(isset($_SESSION['user_auth']) and $_SESSION['user_auth'] == "yes") {
	
    include("cxn.php");
    include("helper.php");
    $cxn = mysqli_connect($host, $user, $pword, $dbname) or die ("error try after some time");

    $user_id = $_SESSION['user_id'];
}
else{
	header("Location: index.php");
	die();
}
?>

<?php
		$sql = "SELECT question_id FROM user_quiz_response WHERE user_id = $user_id AND level = 2 ORDER BY question_id DESC";
		$result = mysqli_query($cxn, $sql);
		while ($row=mysqli_fetch_row($result))
		{
			$sql_question="SELECT * FROM user WHERE level = 2 and question_id='".$row['']."'";
		}
		
 ?>