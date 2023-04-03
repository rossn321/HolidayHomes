<?php
    // Allows the website to connect to the database I have created  
    define('USERNAME', 'bh2019'); //PHPmyAdmin username
    define('PWRD', 'FrShkMB@c52'); //PhpMyadmin Pword
    define('HOSTNAME', 'localhost'); 
    define('DBNAME', 'bh2019'); // Full name including s...
  
    //Database connection 
    $con = @mysqli_connect(HOSTNAME, USERNAME, PWRD, DBNAME) OR die('Could not connect to db'.mysqli_connect_error());
?>