<?php

session_start();

$from_time1 = date("Y-m-d H:i:s");
$to_time1  = $_SESSION['end_time'];

$timefirst = strtotime($from_time1);
$timesecond = strtotime($to_time1);

$differenceinseconds = $timesecond - $timefirst;
//echo "diff = ".$differenceinseconds;

if($differenceinseconds == '00:00:00'){
        $_SESSION['end_time'] = date("Y-m-d H:i:s");
        header("Location: redirect.php");

}elseif($differenceinseconds < 0){
    $_SESSION['end_time'] = date("Y-m-d H:i:s");
    $_SESSION['time_left'] = "no";
    echo "Time Out";
    ?>
    <script type="application/javascript">
        myStopFunction();
    </script>
<?php
}
else{
    echo gmdate("H:i:s", $differenceinseconds);

}

?>

