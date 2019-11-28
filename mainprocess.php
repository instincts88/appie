<?php

    include "connection.php";
    include "selectprocess.php";

//session_destroy();
    echo "<script>";
    echo "function myfunction(){";
      echo "var dateselect = document.getElementById('dateselect');";
      echo "var dateappoint = dateselect.options[dateselect.selectedIndex].value;";
      echo "document.getElementById('selecteddate').innerHTML = dateappoint;";
      echo "document.getElementById('timesegment').style.display = 'block' ";
    
    echo "}";

  echo "</script>";


  $getmomentforever = sqlsrv_query($connection, "SELECT getdate()", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
  while ($exactmoment = sqlsrv_fetch_array($getmomentforever)){
      $dateCreatedforever = $exactmoment[''];
  }
     
        $chosenphysician = sqlsrv_query( $connection, "SELECT * FROM PatientMedicalStaffMapping INNER JOIN MedicalStaff ON MedicalStaff.MID = PatientMedicalStaffMapping.MedID WHERE PatientNo = ? AND IsConfirmed = ?", array($_SESSION['ClientID'], 1), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

        //$chosenphysicianrow_count = sqlsrv_num_rows( $chosenphysician );
        
           while($chosenphysicianrow = sqlsrv_fetch_array($chosenphysician)){
               $_SESSION['ChosenPhysicianID'] = $chosenphysicianrow['MID'];
               $_SESSION['ChosenPhysician'] = $chosenphysicianrow['Fullname'];
               //$_SESSION['ChosenPhysicianImage'] = $chosenphysicianrow['img'];

          }

          $selectactivedays = sqlsrv_query($connection, "SELECT * FROM TimeTable_Appoint WHERE PhysicianID = ?", array($_SESSION['ChosenPhysicianID']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
      
$pendingappointments = sqlsrv_query($connection, "SELECT * FROM HypAppointments WHERE PatientNo = ? AND MedicalOfficerID = ? AND IsCancelled = ?", array($_SESSION['ClientID'], $_SESSION['ChosenPhysicianID'], "False"), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
$pendingnumber = sqlsrv_num_rows($pendingappointments);

if(isset($_POST['setappoint'])){

  $getmomentagain = sqlsrv_query($connection, "SELECT getdate()", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
  while ($exactmoment = sqlsrv_fetch_array($getmomentagain)){
      $dateCreated = $exactmoment[''];
  }
  //$dateCreated = $dateCreated1
   $dateapp = $_POST['dateselect'];
   $timeapp = $_POST['timeselected'];
   $reason = $_POST['reason'];
   $appTimestamp = date('Y-m-d H:i:s');
   $convertedtime = new DateTime($timeapp);
   $_SESSION['settime2'] = $convertedtime->format('H:i:s');
   $_SESSION['settime'] = $convertedtime->format('g:i A');
   $_SESSION['setdate'] = $dateapp;
  // $vacancyleft = $vacancy - 1;
   //$dateCreated = date('Y-m-d');
   
  if($pendingnumber>0){
    echo "You already have a pending appointment";
  }else{

   $makeappoint= "INSERT INTO HypAppointments (PatientId, PatientNo, DateCreated, ConsultRoom, MedicalOfficerID, ReasonNotes, AppointmentTime, AppointmentDate, ClinicID, IsCancelled, AppointmentCreatedOnline, TimeSliceDetails, TimeSessionID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
   $params = array($_SESSION['ClientTransID'], $_SESSION['ClientID'], $dateCreated, '1', $_SESSION['ChosenPhysicianID'], $reason, $timeapp, $dateapp, '18', 0, 1, "", 1);
   $insertquery= sqlsrv_query($connection, $makeappoint, $params);
   sqlsrv_free_stmt($insertquery);

   $udpateslots = sqlsrv_query($connection, "UPDATE TimeSliceVacancySummary SET Vacancy = ? WHERE MedicalOfficerID = ? AND ClinicID = ? AND EffectiveDate = ? AND  TimeSliceDetails = ?", array($vacancyleft, $_SESSION['ChosenPhysicianID'], 1, $sessiondetails));
   sqlsrv_free_stmt($udpateslots);
   //$makevacancy = "INSERT INTO TimeSliceVacancySummary (MedicalOfficerID, ClinicID, EffectiveDate, TimeSessionID, TimeSliceDetails, Vacancy, DateCreated) VALUES (?,?,?,?,?,?,?);";
   //$paramsvacancy = array($_SESSION['ChosenPhysicianID'], $_SESSION['ClinicID'], $dateapp, $TimeSessionID, $timeslicedetails, 1 ,$dateCreated);//, $reason, $timeapp, $dateapp, '18', 0, 1, );
  
   header("Location:confirmation.php");

   $_SESSION['dateCreated'] = $datecreated;
  }
}

if(isset($_POST['cancelappointment'])){
  //$selectedappID = $_POST['delete'];


  //Find appointment to be deleted
  $finddel = sqlsrv_query($connection, "SELECT * FROM HypAppointments WHERE PatientNo = ?  AND AppointmentDate = ? AND IsCancelled = ?", array($_SESSION['ClientID'], $_SESSION['setdate'], 0), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
  echo sqlsrv_num_rows($finddel);
  while($findingdel = sqlsrv_fetch_array($finddel)){
    //$findappID = $findingdel['AppointmentID'];
    $realfindappDate = $findingdel['AppointmentDate'];
    $findappTime = $findingdel['AppointmentTime'];
    $findappPhysician = $findingdel['MedicalOfficerID'];
    $findappClient = $findingdel['PatientNo'];
    $findappClinic = $findingdel['ClinicID'];
    $findappComments = $findingdel['ReasonNotes'];
    
    $findappDate = new DateTime($realfindappDate);
    $w1 = explode(':00.', $findappTime);
    $w2 = $w1[0];
    $w3 = date('h:i:s a', strtotime($w2));
    $w4 = explode(':00 ', $w3);
    $finalw = $w4[0] . ' ' . $w4[1];
    //$_SESSION['deleteid'] = $findappID;
    $_SESSION['deletedate'] = date_format($findappDate, "l, j F Y");
    $_SESSION['deletetime'] = $finalw;
 
    header("Location:cancelappointment.php");
 
  }
}
if(isset($_POST['confirmyes'])){
  // $selectedappID = $_POST['delete'];
   $findappTimestamp = date('Y-m-d H:i:s');

 
     //Cancel appointments
     $cancelappoint= sqlsrv_query($connection, "UPDATE HypAppointments SET IsCancelled = ? WHERE PatientNo = ? AND AppointmentDate = ? AND AppointmentTime = ?", array(1, $_SESSION['ClientID'], $_SESSION['setdate'], $_SESSION['settime2']));
     sqlsrv_free_stmt($cancelappoint); 
/*$review = sqlsrv_query($connection, "SELECT * FROM HypAppointments WHERE PatientNo = ?  AND AppointmentDate = ? AND AppointmentTime = ?", array($_SESSION['ClientID'], $_SESSION['setdate'], $_SESSION['settime2']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
     echo sqlsrv_num_rows($review);*/
     //header("Location:cancelappointmentsuccess.php");
  
 
 }
 if(isset($_POST['confirmno'])){
 
     header("Location:appointments.php");
  
 
 }
 
 //session_destroy();
?>