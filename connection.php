<?php

$serverName = "192.168.40.227\TESTSQL2K17"; //serverName\instanceName
$connectionInfo = array( "Database"=>"KNUSTMIS", "UID"=>"WebservicesConnect", "PWD"=>"seliseli1", "ReturnDatesAsStrings"=> true);
$connection = sqlsrv_connect($serverName, $connectionInfo);

/*
$serverName = "192.168.40.227\SQL2K17"; //serverName\instanceName
$connectionInfo = array( "Database"=>"KNUSTMIS", "UID"=>"WebservicesConnect", "PWD"=>"seliseli1", "ReturnDatesAsStrings"=> true);
$connection = sqlsrv_connect($serverName, $connectionInfo);


if($connection) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}


if($connection) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$host = "localhost";
$username = "root";
$password = "";
$database = "appointment";

$connection = mysqli_connect($host,$username,$password,$database);
 */
?>
