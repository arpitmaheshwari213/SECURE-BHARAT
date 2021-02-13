<?php
session_start();

if(isset($_SESSION['user_auth'])){
        $user_id = $_SESSION['user_id'];
        include("cxn.php");
        include("helper.php");
        $cxn=mysqli_connect($host,$user,$pword,$dbname) or die ("error try after some time");
        $level = getLevel($user_id, $cxn);
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

            unlocked = <?php echo $level ?>;//fetch by php quiz_level from user_quiz_score table
            x=document.getElementsByName('Level');
            for(i=unlocked;i<x.length;i++)
            {
                x[i].disabled = true;
                x[i].parentElement.innerHTML=x[i].parentElement.innerHTML+"<i class='material-icons' >lock</i>";
                //<i class="material-icons" >lock</i>
            }
            x[unlocked-1].click();
            //x[unlocked-1].checked="true";
        });

        //no need of php in below functions
        function uncheck(a){
            x=document.getElementsByName("Level");
            for(i=0;i<x.length;i++){
                if(x[i].checked==true&&x[i]!=a.id)
                {
                    x[i].click();
                }
            }
        }
        function topic(t){
            uncheck(t);
            if(document.getElementById(t.id+"Topics").style.display=="none")
            {
                document.getElementById(t.id+"Topics").style.display="block";
            }
            else
                document.getElementById(t.id+"Topics").style.display="none";
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class=" col-sm-offset-3 col-sm-6 col-xs-12 col-md-offset-2 col-md-4" style="margin-top:50px;margin-bottom:50px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p class="panel-title" style="text-align: center; font-size: 36px; line-height: 1.5;">
                        <i class="material-icons" style="font-size: 48px;">book</i><br>
                        Awareness Quiz</p>
                </div>
                <div class="panel-body">
                    <p>Content </p>
                    <p>How to  </p>
                    <p>Rules </p>
                    <button type="button" class="btn btn-raised btn-primary pull-right" name="quiz" data-toggle="modal" data-target="#myModal">Quiz</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="color: white;background-color: #009688;padding-bottom:20px;">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h3 class="modal-title "><i class="material-icons" style="padding-right:5px;">create</i> Select Level</h3>
            </div>
            <div class="modal-body" >
                <!-- apply php  for form-->
                <form action="level_fetch.php" method="POST" >
                    <div class="form-group">
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox"  name="Level" value="1" id="Beginners" onclick="uncheck(this)">Beginners
                            </label>
                        </div>
                        <br>
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox"  name="Level" value="2" id="Intermediate" onclick="uncheck(this)">Intermediate
                            </label>
                        </div>
                        <br>
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox" onclick="topic(this)" name="Level" value="3" id="Expert">Expert
                                <div id="ExpertTopics" style="display:none;">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Topic</label>
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
                                                                   value="ca">

                                                            <?php echo $row['category_name']; ?>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <br>
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox"   name="Level" value="Professional" id="Professional" onclick="uncheck(this)">Professional

                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-raised btn-primary " name="start">Start</button>
                </form>
            </div>

            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>

    </div>
</div>
</body>

