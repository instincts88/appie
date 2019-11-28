<?php 
    include 'pinprocess.php';
 /*   $selectslotsconfirm = sqlsrv_query($connection, "SELECT * FROM TimeSliceVacancySummary WHERE MedicalOfficerID = ? AND ClinicID = ? AND EffectiveDate = ? AND TimeSessionID = ? AND TimeSliceDetails = ?", array($_SESSION['ChosenPhysicianID'], 1, $dateofappointment, $SessionID, $sessiondetails), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

    $slotsconfirm = sqlsrv_num_rows($selectslotsconfirm);
    while ($getvacancyconfirm = sqlsrv_fetch_array($selectslotsconfirm)){
      $slotMedconfirm = $getvacancyconfirm['Medical'];
      $vacancyconfirm = $getvacancyconfirm['Vacancy'];
    }
  */ 
 
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>University Hospital-KNUST Appointment Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/tabicon.png" /> 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>

</head>


<body class="page-id-1">

    <header class="header navbar-fixed-top">                           
        <div class="container">
                  <nav class="navbar navbar-default ">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="img/knust-logo.png"> UHS <br/> APPOINTMENT PORTAL</a>
                      </div>

                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">   
                        <ul class="nav navbar-nav navbar-right">
                          <li  class="active"><a href="#">Home</a></li>
                          <li><a href="#">About</a></li>
                          <li></li>
                        </ul>                        
                      </div>

                      <div class="profile">
                          <div class="profile-pic pull-left">
                            <img src="img/profilepic.jpg">
                          </div>
                          <div class="profile-name pull-left">
                            <span id="welcome-tag">Hi, </span>
                            <span id="profile-id"><?php echo  $_SESSION['ClientName'];?></span>
                          </div>
                          <a href="login.html" id="logout" class="btn"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>                          
                        </div>
                    </div>
                  </nav>
        </div>     
    </header>
    
  
  <div class="section-layout">
    
    <div class="col-sm-12 booking-col">      

      <div class="confirmmation-box">
          <p class="confirmmation-note" >Please you do not have a confirmed <strong>Physician</strong> based on which you will do an online appointment. <br>Check again after 24 hours. <br> Thank You</p>
          <hr>
      
        
      </div>

    </div>         
  </div>          

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.date.js'></script>
  

</body>
</html>

