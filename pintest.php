<?php
    session_start();
    include "connection.php";

    $getmoment = sqlsrv_query($connection, "SELECT getdate()", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    while ($exactmoment = sqlsrv_fetch_array($getmoment)){
        $in24hours = $exactmoment[''] . "<br>"; 
    }
    echo $in24hours;// = strtotime($in24hours);
    //$asdf= new DateInterval('PT24H');

   // echo $asdf;



?>