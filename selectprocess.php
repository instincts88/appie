<?php
include 'connection.php';
include 'loginprocess.php';

$selectphysicians = sqlsrv_query( $connection, "SELECT * FROM MedicalStaff", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

$phrow_count= sqlsrv_num_rows($selectphysicians);

//$chosenphysician = sqlsrv_query($connection, "SELECT * FROM PatientMedicalStaffMapping INNER JOIN MedicalStaff ON  WHERE PatientNo = ? AND IsConfirmed = ?", array($_SESSION['ClientID'], 1), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
//$chosenphysician = sqlsrv_query( $connection, "select * from Physician_Appoint inner join Clients on Physician_Appoint.PhysicianID = Clients.PhysicianID where ClientID = ? ", array($_SESSION['ClientID']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));


if(isset($_POST['selectphy'])){
  //  $swelected = $_POST['phyID'];


    if(!empty($_POST['phyID'])){
        // Loop to store and display values of individual checked checkbox.
        
       $get = 1;
        //foreach(array_slice($_POST['phyID'], 0, 2) as $selected){
        $choices = array();
       foreach($_POST['phyID'] as $selected){
            $choices[$get] =  $selected . ' ';
            $get++;
       }
       if(sizeof($choices)!=3){
          echo "<script type='text/javascript\'>document.getElementByID('submitbutton').disabled = true;</script>";
          echo "<script type='text/javascript\'>window.alert('please select exactly three physicians');</script>";
       }else{
          $choicestmt1 = "INSERT INTO PatientMedicalStaffMapping (PatientID, PatientNo, MedID, DateCreated, IsConfirmed, IsOnlineCreated) VALUES (?,?,?,?,?,?);";
          $paramsagain1 = array($_SESSION['ClientTransID'], $_SESSION['ClientID'], $choices[1], date('Y-m-d H:i:s'), 1, 1);
          $choicesquery1= sqlsrv_query($connection, $choicestmt1, $paramsagain1);
          sqlsrv_free_stmt($choicesquery1);
          
          $choicestmt2 = "INSERT INTO PatientMedicalStaffMapping (PatientID, PatientNo, MedID, DateCreated, IsConfirmed, IsOnlineCreated) VALUES (?,?,?,?,?,?);";
          $paramsagain2 = array($_SESSION['ClientTransID'], $_SESSION['ClientID'], $choices[2], date('Y-m-d H:i:s'), 0, 1);
          $choicesquery2= sqlsrv_query($connection, $choicestmt2, $paramsagain2);
          sqlsrv_free_stmt($choicesquery2);

          $choicestmt3 = "INSERT INTO PatientMedicalStaffMapping (PatientID, PatientNo, MedID, DateCreated, IsConfirmed, IsOnlineCreated) VALUES (?,?,?,?,?,?);";
          $paramsagain3 = array($_SESSION['ClientTransID'], $_SESSION['ClientID'], $choices[3], date('Y-m-d H:i:s'), 0, 1);
          $choicesquery3= sqlsrv_query($connection, $choicestmt3, $paramsagain3);
          sqlsrv_free_stmt($choicesquery3);
          header("Location:index.php");
       }
    }
    //print_r($arr);Notice: Undefined index: image in C:\xampp\htdocs\beta\mainprocess.php on line 27
}
?>