<?php

session_start();


$DBtype = 'mysql';
$host = 'localhost';
$DBname = 'taskphp';
$DBuserName = 'root';
$DBpassword = '';


$connection = new PDO("$DBtype:host=$host;dbname=$DBname", $DBuserName, $DBpassword);


