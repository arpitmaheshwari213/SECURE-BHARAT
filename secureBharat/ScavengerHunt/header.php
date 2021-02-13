<div class="navbar navbar-default" style="margin-bottom:0px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-default-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">SECURE BHARAT</a>
      </div>
      <div class="navbar-collapse collapse navbar-default-collapse">
        <ul class="nav navbar-nav">
          <li <?php if(@$_GET['no']==1){ ?> class="active" <?php } ?> ><a href="../index.php?no=1">HOME</a></li>
          
          <li <?php if(@$_GET['no']==5) {?> class="active" <?php } ?> ><a href="scavengerhunt.php?no=5">SCAVENGER HUNT</a></li>
		  <li <?php if(@$_GET['no']==3){ ?> class="active" <?php } ?> ><a href="../treasurehunt.php?no=3">TREASURE HUNT</a></li>
          <li <?php if(@$_GET['no']==7) {?> class="active" <?php } ?>><a href="../awarenessquiz.php?no=7">AWARENESS QUIZ</a></li>
          <li <?php if(@$_GET['no']==9) {?> class="active" <?php } ?>><a href="../Forum/index.php?no=9">Q&A FORUM</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <?php 
              if(@$_SESSION['USERID']==''){
                echo "<li><a href='login.php'>Login</a></li>";
                // echo "Login";
                
              }
              else{
                
                  echo '<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$_SESSION['USERNAME'].'<span><i class="material-icons"></i></span></a>
        <ul class="dropdown-menu">
          <li><a href="myprofile.php">My Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </li>';
              }
      ?>
        </ul>

        
      </div>
    </div>
  </div>
