<?php
// define('HOST','localhost');
// define('USER','root');
// define('DB','dbrest');
// define('PASS','');

$host = "localhost";
$user = "root";
$pass  = "";
$db   = "dbrest";
$conn = new mysqli($host,$user,$pass,$db) or die('Connetion error to the database');