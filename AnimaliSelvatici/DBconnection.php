<?php


define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'users');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
$db_selected = mysqli_select_db($conn, DBNAME);

if ( !$conn ) {
    die("Connection failed : " . mysqli_error($conn));
}

if ( !$db_selected ) {
    die("Database Connection failed : " . mysqli_error($conn));
}

