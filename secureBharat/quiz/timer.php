<?php

session_start();

if(isset($_SESSION['time_left'])){
    if($_SESSION['time_left'] == "yes"){

    }else{
        header("Location: scorepage.php");
        die("yo");
    }
}else{
    header("Location: scorepage.php");
    die("yo");
}

?>
<!DOCTYPE html>
<html>
<head>
    <script type="application/javascript">

        setTimeout(function() {
            location.reload();
        }, <?php echo intval($_SESSION['duration'])*60*1000; ?>)


        var refreshIntervalId = setInterval(function()
        {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
                    if (xmlhttp.status == 200) {
                        document.getElementById("response").innerHTML = xmlhttp.responseText;
                    }
                }
            };

            xmlhttp.open("GET", "response.php", true);
            xmlhttp.send();

        },1000);
    </script>

</head>
<body>

<div id="response"></div>

</body>
</html>
