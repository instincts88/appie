<?php
    session_start();
    include 'connection.php';
function loginprocesses(){
   /* echo "<script type = 'text/javascript\'>";
        echo "document.getElementById('tel').style.cssText = 'display: none;'";
        echo "document.getElementById('telbutton').style.cssText = 'display: none;'";
        echo "document.getElementById('num').style.cssText = 'display: none;'";
        echo "document.getElementById('numbutton').style.cssText = 'display: none;'";
    echo "</script>";
*/
    global $connection;
    if(isset($_POST['proceed'])){
        $getmoment = sqlsrv_query($connection, "SELECT getdate()", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
        while ($exactmoment = sqlsrv_fetch_array($getmoment)){
            $pinDateCreatedStamp = $exactmoment[''];
        }
/*        $separatedatetime = explode($asdf, " ");
        $pinDateCreatedStamp = $separatedatetime[0];
        $timeonlysortof = explode($separatedatetime[1], ".");
        $pinTimeCreatedStamp = $timeonlysortof[0];
        echo $timeonlysortof[0];
*/


        $_SESSION['DateCreatedTimeStamp'] = $pinDateCreatedStamp;

    $clientID = strtoupper($_POST['clientID']);
   
    $stmt = sqlsrv_query($connection, "SELECT * FROM Patient WHERE PatientNo = ?;" , array($clientID), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));  
  
    $row_count = sqlsrv_num_rows($stmt);  


        if ($row_count === false){
                echo "\nerror\n";  
        }else if ($row_count >0){ 
                while ($row = sqlsrv_fetch_array($stmt)){
                    $SClientID = $row['PatientNo'];
                    $SClientName = $row['Title'] . " " . $row['Fname'] .  " " . $row['Lname'];
                    $SClientTel= $row['telephone'];
                    $SClientTrans = $row['PatientId'];
                    
                }
                //Creating sessions to be used on other pages
                $_SESSION['ClientID'] = $SClientID;
                $_SESSION['ClientTransID'] = $SClientTrans;
                $_SESSION['ClientName'] = $SClientName;

                // is_numeric check
            
                $ClientTelLength = strlen($SClientTel);
            
                if (is_numeric($SClientTel)){
                    $ClientTelNumeric =  "TRUE";
                }else{
                    $ClientTelNumeric =  "FALSE";
                }
                if(is_null($SClientTel) || $ClientTelLength != 10){
                    echo "<script type = 'text/javascript\'>";
                        echo "document.getElementById('tel').style.cssText = 'display: block;'";
                        echo "document.getElementById('telbutton').style.cssText = 'display: block;'";
                    echo "</script>";
                    echo "<label style = 'font-family:tw cen mt;color:#990000;font-size:15px;'>Please the telephone number registered with the hospital is incorrect.</label>" . "<br>" . "<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#exampleModalCenter2'><i>What you should do</i></button>";
                }else{
                    $digits = 5;
                    $i=0;
                    $pin = "";
                    while($i<$digits){
                        $pin.= mt_rand(0, 9);
                        $i++;
                    }
                   

                    $insert= "INSERT INTO Pin (PinCode, PatientNo, PinDateCreatedStamp, PinIsActiveOrInActive) VALUES (?,?,?,?);";
                    $params = array($pin, $_SESSION['ClientID'], $_SESSION['DateCreatedTimeStamp'], 1);
                    $insertquery= sqlsrv_query($connection, $insert, $params);
                    sqlsrv_free_stmt($insertquery);

                   // echo "pin created";
                    //SMS Pin to Client

                    //$selectpin = sqlsrv_query( $connection, "select * from Pin WHERE ClientID=? AND Pin = ?;", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

                    //echo "pin is correct";
                        //header("Location:pin_login.php");
                        echo "<script>window.open('pin_login.php','_self')</script>";


                   /*echo "<script type = 'text/javascript\'>";
                        echo "document.getElementById('tel').style.cssText = 'display: block;'";
                        echo "document.getElementById('telbutton').style.cssText = 'display: block;'";
                        echo "document.getElementById('num').style.cssText = 'display: block;'";
                        echo "document.getElementById('numbutton').style.cssText = 'display: block;'";
                    echo "</script>";*/

                    
                    
                }
        }else{
            echo "<label style = 'font-family:tw cen mt;color:#990000;font-size:15px;'>Please the entered Hospital Number does not exist</label>" . "<br>" . "<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#exampleModalCenter'><i>What you should do</i></button>";
           /* echo "<script type = 'text/javascript\'>";
                echo "document.getElementById('num').style.cssText = 'display: block;'";
                echo "document.getElementById('numbutton').style.cssText = 'display: block;'";
            echo "</script>";*/
        }
    }
}
/*
function resendpins(){
    global $connection;
    global $pinDateCreatedStamp;
    if(isset($_POST['resendpin'])){
        $digits = 5;
        $i=0;
        $pin = "";
        while($i<$digits){
            $pin.= mt_rand(0, 9);
            $i++;
        }
       // $TpinTimestamp = $row['PinDateCreatedStamp'];
        //$pinDateCreatedStamp = date('Y-m-d');
        //$pinTimeCreatedStamp = date('H:i:s');
        $getmoment = sqlsrv_query($connection, "SELECT getdate()", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
        while ($exactmoment = sqlsrv_fetch_array($getmoment)){
            $pinDateCreatedStamp = $exactmoment[''];
        }

        $insert= "INSERT INTO Pin (PinCode, PatientNo, PinDateCreatedStamp) VALUES (?,?,?);";
        $params = array($pin, $_SESSION['ClientID'], $pinDateCreatedStamp);
        $insertquery= sqlsrv_query($connection, $insert, $params);
        sqlsrv_free_stmt($insertquery);
        //SMS Pin to Client


        echo "<label style = 'font-family:tw cen mt;color:#990000;font-size:15px;'><strong>PIN has been resent!</strong><i></i></label>";
    }
   // $_SESSION['DateCreatedTimeStamp'] = $pinDateCreatedStamp;
}
*/
?>