<?php
/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the forum can
work correctly.
******************************************************/
require "../cxn.php";
//We log to the DataBase
mysql_connect($host, $user, $pword);
mysql_select_db($dbname);

//Username of the Administrator
$admin='dixit';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Forum Home Page
$url_home = 'index.php';

//Design Name
$design = 'default';


/******************************************************
----------------------Initialization-------------------
******************************************************/
include('init.php');
?>