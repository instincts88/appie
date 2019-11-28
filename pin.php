   <?php 
        include 'connection.php';
        /*$insert = "INSERT INTO Test.Pin (PinID, Pin, ClientID)VALUES(?,?);";
        $params = array('12345', 'PS11111');
        $insertquery = sqlsrv_query($connection, $insert, $params);
        if($insertquery){
            echo "row inserted";
        }
*/
      //  echo ("Inserting a new row into table" . PHP_EOL);
        $tsql= "INSERT INTO Pin (Pin, ClientID) VALUES (?,?);";
        $params = array('Jake','United');
        $getResults= sqlsrv_query($connection, $tsql, $params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

        sqlsrv_free_stmt($getResults);
/*
        $insert= "INSERT INTO Pin (Pin, ClientID) VALUES (?,?);";
        $params = array('12314','PS11111');
        $insertquery= sqlsrv_query($connection, $insert, $params);
        $rowsAffected = sqlsrv_rows_affected($insertquery);
        if ($insertquery == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

        sqlsrv_free_stmt($insertquery);
        */
    ?>