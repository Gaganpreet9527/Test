<?php
error_reporting(0);
$host = "localhost";
$uname = "root";
$pwd = "";
$db = "dbtest";
$mysql_connect = mysql_connect($host, $uname, $pwd) or die("Mysql is not connected");
$connet_db = mysql_select_db($db) or die("Datbase is not connected");
mysql_set_charset('utf8');	
@session_start();
$base_url = 'http://localhost/Upload-Resize-and-Crop-an-Image-with-PHP/';
 




?>