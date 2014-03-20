<?php

## log a click on the element ##

header('Content-type: image/png');

date_default_timezone_set("UTC");

$time = time(); // grab the timestamp
$real_date = date("Y-m-d H:i", $time); // grab the real date
$ip = $_SERVER['REMOTE_ADDR']; // grab the user's IP address
$element = $_GET['name']; // grab the element / tagged variable

/*
id       --> INT, 20 auto-increment
date     --> VARCHAR, 30
time     --> INT, 20
element  --> VARCHAR, 255
ip       --> VARCHAR, 25
*/

$mysqli = new mysqli('127.0.0.1', 'root', 'root', 'clicky3'); //update with your relevant values

/* Create a prepared statement */
 if($stmt = $mysqli -> prepare("INSERT INTO clicks (date,time,element,ip) VALUES (?,?,?,?)")) {

/* Bind parameters
 s - string, b - boolean, i - int, etc */
 $stmt -> bind_param("siss", $real_date,$time,$element,$ip);

/* Execute it */
 $stmt -> execute();

/* Close statement */
 $stmt -> close();

}

 $mysqli -> close();

print 'hi';
