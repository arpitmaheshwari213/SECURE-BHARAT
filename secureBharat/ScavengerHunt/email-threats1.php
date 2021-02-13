<?php
include("connectionfactory.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x18">
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../css/index.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../fonta/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet"> 
  <!-- <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../js/jquery-1.10.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- Material design -->
  <link href="../css/material/bootstrap-material-design.css" rel="stylesheet">
  <link href="../css/material/ripples.min.css" rel="stylesheet">
  <link href="../css/sidenav.css" rel="stylesheet">
  <script src="../js/material/material.min.js"></script>
  <script src="../js/material/ripples.min.js"></script>

  <script>
  
   function marks(){
	   
	   
	   
	   
	   
	   
   }
  
  
  </script>
  
  
  
  
  
  
  
  
  
  
  <style>
  h1,h2,h3,h4,h5,h6,p{
    font-family:'Josefin Slab',sans-serif;
    text-align:justify;
  }
  p{
    font-size:18px;
  }
  .modal-content{
	padding:10px;
	line-height:20px;
	font-size:16px;
	}
	.navigation{
		font-size:130%;
		color:#333;
	}
	
	 .navigation a:hover, .navigation a:visited, .navigation a:focus {
		border-bottom:2px #009688 solid;
		font-size:110%;
		background-color:#fff;
	}
	
	.content{
		border-bottom:1px #eee solid;
		padding:20px;
		font-size:18px;
	}
	
  </style>
  <script>
  $(document).ready(function(){
    $.material.init();
    $("select").dropdown();
  });
  </script>
<title>Untitled Document</title>
</head>
<body>
<?php	include("header.php");  ?>
	<div class="container-fluid" style="background-color:#fff; border-bottom:2px #eee solid; box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24);">
    	<div class="row">
        	<div class="col-xs-offset-1 col-xs-10">
    			<h3><b>Email Threats</b></h3>
                <p>
                    E-Mails are just like postcards from which the information can be viewed by anyone. When a mail is transferred from one mail server to another mail server there are various stops at which there is a possibility of unauthorized users trying to view the information or modify it. 
                  <p id="textArea"></p>
                  <a id="toggleButton" onClick="togleText()" style="cursor:pointer;">See More</a>
                </p>
        	</div>
        </div>
        <script>
	  	var status = "less";
		var text;
		function togleText()
		{	
			text='Since a backup is maintained for an e-Mail server all the messages will be stored in the form of clear text though it has been deleted from your mailbox. Hence there is a chance of viewing the information by the people who are maintaining backups. So it is not advisable to send personal information through e-Mails.';
			
			if (status == "less") {
				document.getElementById("textArea").innerHTML=text;
				document.getElementById("toggleButton").innerText = "See Less";
				status = "more";
			} else if (status == "more") {
				document.getElementById("textArea").innerHTML = "";
				docu	ment.getElementById("toggleButton").innerText = "See More";
				status = "less";
			}
		}
		</script>
    	<div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <ul class="nav navbar-nav navigation">
                    <li><a class="a1" href="" style="cursor:pointer;" >Topics</a></li>
                    <li><a class="a2" href="" style="cursor:pointer;">Q & A</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top:15px;">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-6" style="background-color:#fff;">
               <div id="topics">
               <a name="topics"></a>
               <ol type="1">
			   <?php
			   
			   $sel="select * from sub_topic where course_id=1";
			   $exe=mysqli_query($conn,$sel);
			   
			   while($fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC)){
				?>
			   
			   <li class="content"><a href="contents.php?x=<?php echo $fetch['topic_id'];?> "><?php echo $fetch['topic_name'];?></a></li>
                   
               <?php }?>
			   </ol>	
                    
               </div>
            </div>
			<?php  
			       $sel="select * from  resources ";  
			       $exe=mysqli_query($conn,$sel);
			
			?>
			
			
			<div class="col-xs-3 col-xs-offset-1" style="background-color:#fff;">
            	<h3>Resources</h3>
                <?php while($fetch=mysqli_fetch_array($exe,MYSQLI_ASSOC)){
				 ?>
				 <h4><i style="vertical-align:middle" class="material-icons">keyboard_arrow_right</i><a href="<?php echo $fetch['Links'];?>"><?php echo $fetch['Links'];?></a>
				 </h4>
				<?php } ?> 
			
			</div>
        </div>
        <div class="row"> 
            <div class="col-xs-offset-1 col-xs-6" style="background-color:#fff; margin-top:15px;margin-bottom:15px;">    
                <div id="qa" class="content" ">
                <a name="qa"></a>
				<!----- q a forum attachment-->
                
                Ask your queries and suggestions here!!!
				<br>
				<br>
				<a type="button" class="btn btn-raised btn-primary" href="#">Ask</a>
                </div>
            </div>
			<div class="col-xs-3 col-xs-offset-1" style="background-color:#fff;">
            	<h3>Rate this Topic!!</h3>
                <div style="line-height:18px;">
                	<fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" onclick="marks()"/><label class = "full" for="star5" title="Awesome - 5 star"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5" onclick="marks()"/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" onclick="marks()"/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3.5" onclick="marks()"/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" onclick="marks()"/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2.5" onclick="marks()"/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" onclick="marks()"/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1.5" onclick="marks()"/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" onclick="marks()"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="0.5" onclick="marks()"/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php");?>
	</body>
</html>