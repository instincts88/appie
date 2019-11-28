<?php
//include 'connection.php';
include 'mainprocess.php';

/*
if(isset($_POST['submit'])){


        //$pinTimestamp = $_SESSION['PinCreateDate'] = $exactmoment[''];;
         $pinNumber = $_POST['pinNumber'];
         $stmt = sqlsrv_query( $connection, "SELECT * FROM Pin WHERE PatientNo = ? AND PinCode = ? AND PinDateCreatedStamp = ?;", array($_SESSION['ClientID'], $pinNumber, $_SESSION['DateCreatedTimeStamp']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));  
         $row_count = sqlsrv_num_rows( $stmt );
         $checkstatus = sqlsrv_query( $connection, "SELECT * FROM PatientMedicalStaffMapping WHERE PatientNo = ? AND IsConfirmed = ?;", array($_SESSION['ClientID'], 1), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));  
         $statusrow_count = sqlsrv_num_rows( $checkstatus );

         if( $statusrow_count>0){
                header("Location:index.php");
        }else{// if($TpinName === $pinNumber && $TpinTimestamp === $_SESSION['DateCreatedTimeStamp'] && $TClientID === $_SESSION['ClientID']){//} && $statusrow_count=0){
                header("Location:selection.php");
        }
}
include "mainprocess.php";
$dateofappointment = "11 November 2019";
$individdoa = explode(' ', $dateofappointment);
$individd = $individdoa[0];
$individm = $individdoa[1];
$individy = $individdoa[2];
/*
$timesessionquery = "SELECT * FROM TimeSession INNER JOIN TimeTable_Appoint ON TimeSession.TimeSessionID = TimeTable_Appoint.TimeSessionID WHERE PhysicianID = ? AND DayTT = ? AND MonthTT = ? and YearTT = ?";
                        $selecttimesession = sqlsrv_query($connection, $timesessionquery, array($_SESSION['ChosenPhysicianID'], $individd, $individm, $individy), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                        $selecttimeslice = sqlsrv_query($connection, "SELECT TimeSlice_Appoint.DifferenceValue, TimeSlice_Appoint.PatientsPerHour from TimeSlice_Appoint inner join MedicalStaff on timeslice_Appoint.TimeSliceID = MedicalStaff.TimeSliceID where MID = ?", array($_SESSION['ChosenPhysicianID']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                       
                     
                     
                        while ($chosentimesession = sqlsrv_fetch_array($selecttimesession)){
                                while($chosentimeslice = sqlsrv_fetch_array($selecttimeslice)){
                                        $ChosenTimeStartarray1 = explode(':00.', $chosentimesession['EffectStart']);
                                        $ChosenTimeStartwait = $ChosenTimeStartarray1[0];
                                        $ChosenTimeStar = date('h:i:s a', strtotime($ChosenTimeStartwait));
                                        $ChosenTimeStartarray = explode(':00 ', $ChosenTimeStar);
                                        $ChosenTimeStartobj = $ChosenTimeStartarray[0] . $ChosenTimeStartarray[1];
                                        $ChosenTimeStart = new DateTime($ChosenTimeStartobj);
                     
                                        $ChosenTimeEndarray1 = explode(':00.', $chosentimesession['EffectEnd']);
                                        $ChosenTimeEndwait = $ChosenTimeEndarray1[0];
                                        $ChosenTimeEn = date('h:i:s a', strtotime($ChosenTimeEndwait));
                                        $ChosenTimeEndarray = explode(':00 ', $ChosenTimeEn);
                                        $ChosenTimeEndobj = $ChosenTimeEndarray[0] . $ChosenTimeEndarray[1];
                                        $ChosenTimeEnd = new DateTime($ChosenTimeEndobj);
                                        
                                       // $ChosenTimeStart = $chosentimesession['EffectStart'];
                                     //   $ChosenTimeEnd = $chosentimesession['EffectEnd'];
                                        $ChosenTimeSlicearray = explode(':00.', $chosentimeslice['DifferenceValue']);
                                        $ChosenTimeSlicefull = explode(':', $ChosenTimeSlicearray[0]);
                                        $ChosenTimeSliceHour = $ChosenTimeSlicefull[0];
                                        $ChosenTimeSliceMinute = $ChosenTimeSlicefull[1];   
                                        $one = 'PT' . $ChosenTimeSliceHour . 'H' . $ChosenTimeSliceMinute . 'M';
                                        // echo $one;
                                       
                     
                                        $PatientsPerHour = $chosentimeslice['PatientsPerHour'];
                     
                                      //  $slotsleft = $PatientsPerHour - $slots;
                     
                                        $SessionName = $chosentimesession['SessionName'];
                                        $SessionDesc = $chosentimesession['Description'];
                                }
                     
                        }$currenttime = $ChosenTimeStart->format('H:i:s');
$selectslots = sqlsrv_query($connection, "SELECT * FROM HypAppointments WHERE MedicalOfficerID = ? AND AppointmentDate = ? AND AppointmentTime = ? AND IsCancelled = ?", array($_SESSION['ChosenPhysicianID'], $dateofappointment, $currenttime, 0), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
$slots = sqlsrv_num_rows($selectslots);
$slotsleft = $PatientsPerHour - $slots;  echo $slotsleft;
*/

/*
$chosenphysician = sqlsrv_query( $connection, "SELECT * FROM PatientMedicalStaffMapping INNER JOIN MedicalStaff ON MedicalStaff.MID = PatientMedicalStaffMapping.MedID WHERE PatientNo = ? AND IsConfirmed = ?", array($_SESSION['ClientID'], 1), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

//$chosenphysicianrow_count = sqlsrv_num_rows( $chosenphysician );

   while($chosenphysicianrow = sqlsrv_fetch_array($chosenphysician)){
       $_SESSION['ChosenPhysicianID'] = $chosenphysicianrow['MID'];
       $_SESSION['ChosenPhysician'] = $chosenphysicianrow['Fullname'];
       $_SESSION['ChosenPhysicianImage'] = $chosenphysicianrow['img'];
       // . " " . $chosenphysicianrow['PhysicianSurname'];
      // $_SESSION['ChosenPhysicianDesc'] = $chosenphysicianrow['PhysicianDesc'];
      // $ChosenPhysicianOtherNames = $chosenphysicianrow['PhysicianOtherNames'];

       //$ChosenPhysicianID = $_SESSION['ChosenPhysicianID'];
       //$ChosenPhysician = $ChosenPhysicianOtherNames . $ChosenPhysicianSurname;
       //$ChosenPhysician = $_SESSION['ChosenPhysician'];
  }

*/
if (isset($_POST['timebutton'])){
        $dateofappointment = $_POST['timeselected'];
        $converted = strtotime($dateofappointment);

        $converteddateofappointment = date( 'd-m-y', $converted);

        $individdoa = explode(' ', $dateofappointment);
        $individd = $individdoa[0];
        $individm = $individdoa[1];
        $individy = $individdoa[2];
        
        $timesessionquery = "SELECT * FROM TimeSession INNER JOIN TimeTable_Appoint ON TimeSession.TimeSessionID = TimeTable_Appoint.TimeSessionID WHERE PhysicianID = ? AND DayTT = ? AND MonthTT = ? and YearTT = ?";
        $selecttimesession = sqlsrv_query($connection, $timesessionquery, array($_SESSION['ChosenPhysicianID'], $individd, $individm, $individy), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
        echo sqlsrv_num_rows($selecttimesession);
        echo "<br>";
        echo $converteddateofappointment;
        echo "<br>";

        //$selecttimeslice = sqlsrv_query($connection, "SELECT TimeSlice_Appoint.DifferenceValue, TimeSlice_Appoint.PatientsPerHour from TimeSlice_Appoint inner join MedicalStaff on timeslice_Appoint.TimeSliceID = MedicalStaff.TimeSliceID where MID = ?", array($_SESSION['ChosenPhysicianID']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
        $selecttimeslice = sqlsrv_query($connection, "SELECT * FROM TimeSlice_Appoint", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
        /*

        while ($chosentimesession = sqlsrv_fetch_array($selecttimesession)){
                while($chosentimeslice = sqlsrv_fetch_array($selecttimeslice)){
                        $ChosenTimeStartarray1 = explode(':00.', $chosentimesession['EffectStart']);
                        $ChosenTimeStartwait = $ChosenTimeStartarray1[0];
                        $ChosenTimeStar = date('h:i:s a', strtotime($ChosenTimeStartwait));
                        $ChosenTimeStartarray = explode(':00 ', $ChosenTimeStar);
                        $ChosenTimeStartobj = $ChosenTimeStartarray[0] . $ChosenTimeStartarray[1];
                        $ChosenTimeStart = new DateTime($ChosenTimeStartobj);

                        $ChosenTimeEndarray1 = explode(':00.', $chosentimesession['EffectEnd']);
                        $ChosenTimeEndwait = $ChosenTimeEndarray1[0];
                        $ChosenTimeEn = date('h:i:s a', strtotime($ChosenTimeEndwait));
                        $ChosenTimeEndarray = explode(':00 ', $ChosenTimeEn);
                        $ChosenTimeEndobj = $ChosenTimeEndarray[0] . $ChosenTimeEndarray[1];
                        $ChosenTimeEnd = new DateTime($ChosenTimeEndobj);
                        
                // $ChosenTimeStart = $chosentimesession['EffectStart'];
                //   $ChosenTimeEnd = $chosentimesession['EffectEnd'];
                        $ChosenTimeSlicearray = explode(':00.', $chosentimeslice['DifferenceValue']);
                        $ChosenTimeSlicefull = explode(':', $ChosenTimeSlicearray[0]);
                        $ChosenTimeSliceHour = $ChosenTimeSlicefull[0];
                        $ChosenTimeSliceMinute = $ChosenTimeSlicefull[1];   
                        $one = 'PT' . $ChosenTimeSliceHour . 'H' . $ChosenTimeSliceMinute . 'M';
                        // echo $one;
                

                //   $PatientsPerHour = $chosentimeslice['PatientsPerHour'];

                //  $slotsleft = $PatientsPerHour - $slots;

                        $SessionName = $chosentimesession['SessionName'];
                        $SessionDesc = $chosentimesession['Description'];
                        $SessionID = $chosentimesession['TimeSessionID'];
                }

        }*/
        //while($ChosenTimeStart<=$ChosenTimeEnd){
                
        //  $currenttime = $ChosenTimeStart->format('H:i:s');

                //echo $SessionName;
                $selectslots = sqlsrv_query($connection, "SELECT * FROM TimeSliceVacancySummary WHERE MedicalOfficerID = ? AND ClinicID = ? AND EffectiveDate = ? AND TimeSessionID = ? AND TimeSliceDetails = ?", array($_SESSION['ChosenPhysicianID'], "1", $converteddateofappointment, "1", "08:00"), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                $slots = sqlsrv_num_rows($selectslots);
                echo $slots;
        // echo  $ChosenTimeStart->format('g:i A') . " - " . $ChosenTimeStart->add(new DateInterval($one))->format('g:i A');
        //}
}
?>
<form method = post>
<input type = "text" name = "timeselected">
<input type = "submit" name = "timebutton">
</form>