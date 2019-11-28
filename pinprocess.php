<?php

include 'connection.php';
include 'loginprocess.php';
//unset($_SESSION["ChosenPhysicianID"]);
//session_destroy();
function pinprocesses(){
    global $connection;
   // global $pinTimeCreatedStamp;
    
    if(isset($_POST['submit'])){


       //$pinTimestamp = $_SESSION['PinCreateDate'] = $exactmoment[''];;
        $pinNumber = $_POST['pinNumber'];
        $stmt = sqlsrv_query( $connection, "SELECT * FROM Pin WHERE PatientNo = ? AND PinCode = ? AND PinDateCreatedStamp = ?;", array($_SESSION['ClientID'], $pinNumber, $_SESSION['DateCreatedTimeStamp']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));  
        $row_count = sqlsrv_num_rows( $stmt );

        $checkstatus = sqlsrv_query( $connection, "SELECT * FROM PatientMedicalStaffMapping WHERE PatientNo = ? AND IsConfirmed = ?;", array($_SESSION['ClientID'], 1), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));  
        $statusrow_count = sqlsrv_num_rows( $checkstatus );

        $checkstatusagain = sqlsrv_query( $connection, "SELECT * FROM PatientMedicalStaffMapping WHERE PatientNo = ?;", array($_SESSION['ClientID']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));  
        $statusrow_countagain = sqlsrv_num_rows( $checkstatusagain );
        
        
        if ($row_count === false){
            echo "\nerror\n";  
        }else if ($row_count >0 ){ 
            while($row = sqlsrv_fetch_array($stmt)){
                $TpinName = $row['PinCode'];
                $TClientID = $row['PatientNo'];
                $TpinTimestamp = $row['PinDateCreatedStamp'];
                

            }
            if($TpinName === $pinNumber && $TpinTimestamp === $_SESSION['DateCreatedTimeStamp'] && $TClientID === $_SESSION['ClientID'] && $statusrow_count>0){
                echo "<script>window.open('index.php','_self')</script>";
                //header("Location:selection.php");
            }else if($TpinName === $pinNumber && $TpinTimestamp === $_SESSION['DateCreatedTimeStamp'] && $TClientID === $_SESSION['ClientID'] && $statusrow_count=0){
                echo "<script>window.open('selection.php','_self')</script>";
                //header("Location:selection.php");
            }else if($TpinName === $pinNumber && $TpinTimestamp === $_SESSION['DateCreatedTimeStamp'] && $TClientID === $_SESSION['ClientID'] && $statusrow_countagain>0){
                echo "<script>window.open('confirmation2.php','_self')</script>";

            }else if(($TpinName === $pinNumber && $TpinTimestamp <> $_SESSION['DateCreatedTimeStamp'] && $TClientID === $_SESSION['ClientID'])||($TpinName === $pinNumber && $TpinTimestamp <> $_SESSION['DateCreatedTimeStamp'] && $TClientID === $_SESSION['ClientID'])){
                echo "<label style = 'font-family:tw cen mt;color:#990000;font-size:15px;'><strong>PIN has expired.</strong><br><i> Please Click on RESEND PIN to get a new one</i></label>";
/*                $digits = 5;
                $i=0;
                $pin = "";
                while($i<$digits){
                    $pin.= mt_rand(0, 9);
                    $i++;
                }
                $pinDateCreatedStamp = date('Y-m-d');
                $pinTimeCreatedStamp = date('H:i:s');
                

                $insert= "INSERT INTO Pin (PinCode, PatientNo, PinTimeCreatedStamp, PinDateCreatedStamp) VALUES (?,?,?,?);";
                $params = array($pin, $_SESSION['ClientID'], $pinTimeCreatedStamp, $pinDateCreatedStamp);
                $insertquery= sqlsrv_query($connection, $insert, $params);
                sqlsrv_free_stmt($insertquery);
                //SMS Pin to Client

                ;*/
            }else if($TpinName != $pinNumber && $TpinTimestamp > $pinTimestamp && $TClientID === $_SESSION['ClientID']){
                echo "<label style = 'font-family:tw cen mt;color:#990000;font-size:15px;'><strong>PIN has expired.</strong><br><i>Please Click on RESEND PIN to get a new one</i></label>";
                /*$digits = 5;
                $i=0;
                $pin = "";
                while($i<$digits){
                    $pin.= mt_rand(0, 9);
                    $i++;
                }
                $pinDateCreatedStamp = date('Y-m-d');
                $pinTimeCreatedStamp = date('H:i:s');
                

                $insert= "INSERT INTO Pin (PinCode, PatientNo, PinTimeCreatedStamp, PinDateCreatedStamp) VALUES (?,?,?,?);";
                $params = array($pin, $_SESSION['ClientID'], $pinTimeCreatedStamp, $pinDateCreatedStamp);
                $insertquery= sqlsrv_query($connection, $insert, $params);
                sqlsrv_free_stmt($insertquery);
                //SMS Pin to Client

                */
            }else{
                echo "<script>window.open('selection.php','_self')</script>";
               // echo "<label style = 'font-family:tw cen mt;color:#990000;font-size:15px;'><strong>Don't know what is wrong</strong><br><i>Please Click on RESEND PIN to get a new one</i></label>";
            }

        }else{
            echo "<label style = 'font-family:tw cen mt;color:#990000;font-size:15px;'><strong>INCORRECT PIN. </strong><i>Please try again</i></label>";
            
        }
    

    }
}

function resendpins(){
    global $connection;
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

        $resendpin= "UPDATE Pin SET PinCode = ? WHERE PatientNo = ? AND PinDateCreatedStamp = ?";
        $resendparams = array($pin, $_SESSION['ClientID'], $_SESSION['DateCreatedTimeStamp']);
        $resendpinquery= sqlsrv_query($connection, $resendpin, $resendparams);
        sqlsrv_free_stmt($resendpinquery);
        //SMS Pin to Client


        echo "<label style = 'font-family:tw cen mt;color:#990000;font-size:15px;'><strong>PIN has been resent!</strong><i></i></label>";
    }
}

?>