<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link href="css/index.css" rel="stylesheet" type="text/css"/>
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

    unlocked=1;//fetch from php

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
 <body >
    <!-- New Idea -->
    <div class="container-fluid">
      <div class="row " style="margin-top:50px;padding-top:10px;">
        <div class="col-md-6 col-sm-6 ">
          <div class="panel " id="panel1">
            <div class="panel-heading">
              <p class="panel-title" style="text-align: centre;font-size:18px;" id="title1">
              Beginners
              </p>
              </div>
              <div class="panel-body">
               <p>Content</p>
               <a type="button" href="quizBeginners.php"  class="btn btn-raised " name="startB" id="button1">Start</a>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
        <div class="col-md-6  col-sm-6">
          <div class="panel " id="panel2" style="max-height:300px; overflow-y:auto;">
            <div class="panel-heading">
              <p class="panel-title" style="text-align: centre;font-size:18px;" id="title2">
              Intermediate
              </p>
              </div>
              <div class="panel-body" >
               <p>Content</p>
               <p></p>
               <a type="button" href="#"  class="btn btn-raised " name="startI" id="button2">Start</a>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
        <div class="col-md-6  col-sm-6 ">
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
                     <div class="radio radio-primary">
                       <label>
                         <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                         Cryptography
                       </label>
                     </div>
                     <!-- repeat it by loopingin php for ctagories fetched from database -->
                     <div class="radio radio-primary">
                       <label>
                         <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                         ATM Frauds
                       </label>
                     </div>

                     <div class="radio radio-primary">
                       <label>
                         <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                         Social Engineering
                       </label>
                     </div>

                   </div>
                 </div>
               </div>
               <a type="button" href="#"  class="btn btn-raised " name="startE" id="button3" >Start</a>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="panel " id="panel4">
            <div class="panel-heading">
              <p class="panel-title" style="text-align: centre;font-size:18px;" id="title4">
             Professional
              </p>
              </div>
              <div class="panel-body">
               <p>Content</p>
               <a type="button" href="#"  id="button4" class="btn btn-raised " name="startP" >Start</a>
                <div class="clearfix"></div>
              </div>
            </div>
        </div>
      </div>
      </form>
      </div>
    </div>
  </body>
