<?php
session_start();

if(isset($_SESSION['USERID'])){
        $user_id = $_SESSION['USERID'];
        include("quiz/cxn.php");
		$cxn=mysqli_connect($host,$user,$pword,$dbname) or die ("error try after some time");
        include("quiz/helper.php");
		$level = getLevel($user_id, $cxn);
    }
	else{
		header("Location: index.php");
	}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
    // material bootstrap
    $.material.init();
    $("select").dropdown();

    unlocked=<?php echo $level ?>;//fetch from php

    for(i=1;i<=unlocked;i++)
    {
     x=document.getElementById('panel'+i);
     x.className=x.className+"panel-success";
     btn=document.getElementById('button'+i);
     btn.className=btn.className+"btn-success";
    }

    for(i>unlocked;i<=4;i++)
    {
      x=document.getElementById('panel'+i);
      x.className=x.className+"panel-danger";
      btn=document.getElementById('button'+i);
       btn.className=btn.className+"btn-danger";
      btn.className=btn.className+" disabled";
      tl=document.getElementById('title'+i);

      tl.innerHTML=tl.innerHTML+"<i class='material-icons pull-right' >lock</i>";
      //<i class="material-iconds" >lock</i>
    }
    //x[unlocked-1].click();
    //x[unlocked-1].checked="true";
  });

  //no need of php in below functions

  // function topic(t){
  //   uncheck(t);
  //   if(document.getElementById(t.id+"Topics").style.display=="none")
  //   {
  //     document.getElementById(t.id+"Topics").style.display="block";
  //   }
  //   else
  //   document.getElementById(t.id+"Topics").style.display="none";
  // }
  </script>
</head>
 <body style="background-color:black;opacity:0.7">
    <!-- New Idea -->
	
    <div class="container-fluid">
	<form action="quiz/level_fetch.php" method="POST" >
      <div class="row" style="margin-top:50px;padding-top:10px;">
        <div class="col-sm-offset-2 col-sm-4 ">
          <div class="panel " id="panel1">
            <div class="panel-heading">
              <p class="panel-title" style="text-align: centre;font-size:18px;" id="title1">
              Beginners
              </p>
              </div>
              <div class="panel-body">
               <p>Content</p>
               <button type="submit" class="btn btn-raised " name="Level" value="1" id="button1">Start</button>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
          <div class="panel " id="panel2" style="max-height:300px; overflow-y:auto;">
            <div class="panel-heading">
              <p class="panel-title" style="text-align: centre;font-size:18px;" id="title2">
              Intermediate
              </p>
              </div>
              <div class="panel-body" >
               <p>Content</p>
               <p></p>
               <button type="submit" class="btn btn-raised " name="Level" value="2" id="button2">Start</button>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
        <div class="col-sm-4 col-sm-offset-2 ">
          <div class="panel " id="panel3">
            <div class="panel-heading">
              <p class="panel-title" style="text-align: centre;font-size:18px;" id="title3">
              Expert
              </p>

              </div>
              <div class="panel-body">
               <p>Content</p>

               <div id="ExpertTopics" style="display:block;">
                 <div class="form-group">
                   <label class="col-md-2 control-label">Categories</label>
                   <div class="col-md-10">
                     <!-- Start by fetching php -->
                     <?php
                                                $sql = "SELECT * FROM category";
                                                $result = mysqli_query($cxn,$sql) or die("cant connect to database");
                                                while($row=mysqli_fetch_assoc($result)) {

                                                    ?>
                                                    <div class="radio radio-primary">
                                                        <label>
                                                            <input type="radio" name="cat" id="optionsRadios1"
                                                                   value="<?php echo $row['category_id']; ?>">

                                                            <?php echo $row['category_name']; ?>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                   </div>
                 </div>
               </div>
               <button type="submit"  class="btn btn-raised " name="Level" id="button3" value="3">Start</button>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
          <div class="panel " id="panel4">
            <div class="panel-heading">
              <p class="panel-title" style="text-align: centre;font-size:18px;" id="title4">
             Professional
              </p>
              </div>
              <div class="panel-body">
               <p>Content</p>
               <button type="submit" class="btn btn-raised " name="Level" value="4" id="button4">Start</button>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
      </div>
      </form>
      </div>
    </div>
  </body>
