<?php
//This page let display the list of personnal message of an user
include('config.php');
$_SESSION['username']=$_SESSION['USERNAME'];
$_SESSION['userid']=$_SESSION['USERID'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Personal Messages</title>
    </head>
    <body>
    
        <div class="content">
<?php
if(isset($_SESSION['username']))
{
$req1 = mysqli_query($conn,'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req2 = mysqli_query($conn,'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$nb_new_pm = mysqli_fetch_array(mysqli_query($conn,'select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Forum Index</a> &gt; List of your Personal Messages
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> - <a href="../myprofile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a><!--  (<a href="login.php">Logout</a>) -->
    </div>
    <div class="clean"></div>
</div>
This is the list of your personal messages:<br />
<a href="new_pm.php" class="button">New Personal Message</a><br />
<h3>Unread messages(<?php echo intval(mysqli_num_rows($req1)); ?>):</h3>
<table class="list_pm">
	<tr>
    	<th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date Sent</th>
    </tr>
<?php
while($dn1 = mysqli_fetch_array($req1))
{
?>
	<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $dn1['reps']-1; ?></td>
    	<td><?php echo htmlentities($dn1['username'], ENT_QUOTES, 'UTF-8'); ?></td>
    	<td><?php echo date('d/m/Y H:i:s' ,$dn1['timestamp']); ?></td>
    </tr>
<?php
}
if(intval(mysqli_num_rows($req1))==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no unread message.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Read messages(<?php echo intval(mysqli_num_rows($req2)); ?>):</h3>
<table class="list_pm">
	<tr>
    	<th class="title_cell">Title</th>
        <th>Nb. Rreplies</th>
        <th>Participant</th>
        <th>Date Sent</th>
    </tr>
<?php
while($dn2 = mysqli_fetch_array($req2))
{
?>
	<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $dn2['reps']-1; ?></td>
    	<td><?php echo htmlentities($dn2['username'], ENT_QUOTES, 'UTF-8'); ?></td>
    	<td><?php echo date('d/m/Y H:i:s' ,$dn2['timestamp']); ?></td>
    </tr>
<?php
}
if(intval(mysqli_num_rows($req2))==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no read message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else

{
?>
<h2>You must be logged to access this page:</h2>
<div class="box_login">
	<form action="login.php" method="post">
		<label for="username">Username</label><input type="text" name="username" id="username" /><br />
		<label for="password">Password</label><input type="password" name="password" id="password" /><br />
        <label for="memorize">Remember</label><input type="checkbox" name="memorize" id="memorize" value="yes" />
        <div class="center">
	        <input type="submit" value="Login" /> <input type="button" onclick="javascript:document.location='signup.php';" value="Sign Up" />
        </div>
    </form>
</div>
<?php
}
?>
		</div>

	</body>
</html>
