<?php
 include_once("connectionfactory.php");
 session_start();
 
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="css/index.css" rel="stylesheet" type="text/css"/>
  <link href="css/home.css" rel="stylesheet" type="text/css"/>
  <!-- <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Material design -->
  <link href="css/material/bootstrap-material-design.css" rel="stylesheet">
  <link href="css/material/ripples.min.css" rel="stylesheet">
  <script src="js/material/material.min.js"></script>
  <script src="js/material/ripples.min.js"></script>


  <script>
  $(document).ready(function(){
    $.material.init();
    $("select").dropdown();
  });

  function showDetails(a)
  {
    b=a.id+"Details";
    if(document.getElementById(b).style.display=="none")
    {
      document.getElementById(b).style.display="block";
     }
    else
    document.getElementById(b).style.display="none";
  }
  </script>
</head>
<body>
  <?php
    include_once("header.php");
  ?>
  <div class="container-fluid parallax">
    <div class="row" id="upperDiv" >

      <div class="col-md-6 col-md-offset-3">
      <h2>Q & A FORUM</h2>

        <p >Treasure hunt will be a game based environment which will reinforce learning in the area of
cyber security.It will consist of 100 plus challenges ,each challenge will provide an infosec
scenario, a set of objectives , links to various digital assets that user have to use and how to
use them to solve each challenge.</p>
    <p>
    Each challenge solved will take user to the next challenge i.e without solving the previous
  challenge user cannot move to the next challenge. Treasure hunt will not only aware users for
  cyber security but teach them how to implement it practically for their betterment in day-today
  life . The challenges will keep them engaged, entertained and enlightened.
    </p>  <div style="text-align:center;">
           <a href= <?php if(@$_SESSION['USERID']) { ?> "forum/index.php" <?php } else {  ?>  "login.php" <?php }?>   class="btn btn-raised btn-default"  role="button" >Play</a>
        </div>
      </div>
      </div>
    </div>

  <!-- Footer -->
               <?php   include("footer.php");?>   
                      </body>
