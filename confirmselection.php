<?php 
    include 'mainprocess.php';
 
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
    
    <div class="col-sm-10 booking-col">      
    <form method = "post">
      <div class="confirmmation-box">
          <p class="confirmmation-note">Confirmation</p>
          <hr>
          <div class="booking-details">
              <h4>Appointment details</h4>
              <ul>
                <li><span id="detailsTitle"><i class="fa fa-calendar" aria-hidden="true"></i> Date:</span> <span id="bookingDate"><?php echo $_SESSION['deletedate']; ?> </span></li>
                <li><span id="detailsTitle"><i class="fa fa-clock-o" aria-hidden="true"></i> Time Period:</span> <span id="bookingTime"><?php echo $_SESSION['deletetime']; ?></span></li>
              </ul>
          </div>
          <hr>
          <button type = "submit" class = "btn cancel-btn" name = "confirmyes">Yes</button>
          <button type = "submit" class = "btn proceed-btn" name = "confirmno">No</button>
          <!--<a href="cancelappointmentsuccess.html" class="btn cancel-btn">Yes</a>
          <a href="appointments.html" class="btn proceed-btn">No</a>-->
          <h5><a href="appointments.php">View all appointments</a></h5>
      </div>
</form>
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

