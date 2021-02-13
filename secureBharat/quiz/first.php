<?php

$_SESSION['time_left'] = "yes";


// NOt to see below
$duration = "";
$sql = "SELECT * FROM timer";
$result = mysqli_query($cxn,$sql) or die("cant connect to database");
while($row=mysqli_fetch_array($result)){
    $duration = $row['duration'];
}

$_SESSION['duration'] = $duration;
$_SESSION['start_time'] = date("Y-m-d H:i:s");

//echo "start time = ".$_SESSION['start_time'];

$end_time = $end_time = date("Y-m-d H:i:s", strtotime('+'.$_SESSION['duration'].'minutes', strtotime($_SESSION['start_time'])));

$_SESSION['end_time'] = $end_time;


//echo "end_time time = ".$_SESSION['end_time'];


?>

