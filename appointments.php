<?php include 'mainprocess.php'; ?>
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
    <div class="modal fade" id="exampleModalchange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">State your reason below</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Reason:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
  
  <div class="section-layout">
    <div class="col-sm-2 sidebar-col">
      <div class="sidenav">
        <ul class="nav">
                          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                          <li  class="active"><a href="appointments.php"><i class="fa fa-calendar"></i> Appointments 
                            <span id="pending" class="badge badge-danger"><?php echo $pendingnumber; ?></span>
                            </a>
                          </li>
                          <li><a href="#" data-toggle="modal" data-target="#exampleModalchange"><i class="fa fa-user-md"></i>Change Physician</a></li>
                          
        </ul>

        <div class="copyright2">
                     <small><span>Copyright © 2019 Kwame Nkrumah University Of Science and Technology. All Rights Reserved<span></small>
                     <br/>
                     <small><span>Developed by University Information Technology Services,KNUST<span></small>
                </div> 
      </div>
    </div>
    <div class="col-sm-10 booking-col">      
      <h3 class="caption2">Your Appointments</h3>   
      <div class="appointments">
      <form method = 'post'>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Reason</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

                <?php

                            while($viewpending = sqlsrv_fetch_array($pendingappointments)){
                              //$appID = $viewpending['AppointmentID'];
                              $realappDate = $viewpending['AppointmentDate'];
                              $appTime = $viewpending['AppointmentTime'];
                              $appPhysician = $viewpending['MedicalOfficerID'];
                              $appClient = $viewpending['PatientNo'];
                              $appClinic = $viewpending['ClinicID'];
                              $appComments = $viewpending['ReasonNotes'];

                              $appDate = new DateTime($realappDate);
                              $C1 = explode(':00.', $appTime);
                              $C2 = $C1[0];
                              $c3 = date('h:i:s a', strtotime($C2));
                              $c4 = explode(':00 ', $c3);
                              $finalC = $c4[0] . ' ' . $c4[1];
                              $_SESSION['Canceldate'] = date_format($appDate, "l, j F Y");
                              $_SESSION['Canceltime'] = $finalC;
                             // $_SESSION['appID'] = $appID;

                              echo "<tr>";
                              //echo "<td class = 'text-center'><input type = 'radio' name = 'delete' value = '" . $appID . "' required = yes style = 'width:25px;height:25px'></td>";
                              echo "<td class = 'date'>" . date_format($appDate, "l, j F Y") . "</td>";
                              echo "<td class = 'time'>" . $finalC . "</td>";
                              echo "<td class = 'reason'>" . $appComments . "</td>";
                                //echo "<td class = 'text-center'><input type = 'radio' name = 'delete' value = '" . $appID . "' required = yes></td>";
//                                echo "<td class = 'text-center'><button type='submit' class='btn btn-primary btn-sm' name = 'delete'>Cancel</button></td>";
                              echo "<td class = 'status-center'>Pending</td>";
                             

                              echo "</tr>";
                             
                            }
                            
                          
                        ?>

              </tbody>
            </table>
            <div class = 'pull-right'>
            <input type="submit" class="btn btn-danger" name = "cancelappointment" value = 'Cancel Selected Appointment'>
              </div>
 
            </form>
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

