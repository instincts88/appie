<?php include 'loginprocess.php'; ?>

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

<body>

    <header class="header navbar-fixed-top">                           
        <div class="container">
                  <nav class="navbar navbar-default">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="img/knust-logo.png"> KNUST HOSPITAL <br/> APPOINTMENT PORTAL</a>
                      </div>

                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      
                        <ul class="nav navbar-nav navbar-right">
                          <li  class="active"><a href="#">Home</a></li>
                          <li><a href="#">About</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>
        </div>     
    </header>

    <div class="container login-row">

      <div class="col-sm-7 bannerimg">
          <img src="img/doctorimage.jpg">
          <p class="caption">Welcome to the University Hospital, KNUST Appointment Portal, a simple way to book an online visit with a Doctor</p>
      </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>What you should do if your hospital number is not recognised....</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        1. Please ensure you have entered the hospital number correctly.<br><br>
        2. Please if the first option does not work, you must proceed to the Hospital's Records Unit for registration.<br><br>

        Thank You.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>What you should do if you have problems with your telephone number....</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please make your way to the Hospital's Records Unit and get your telephone number correctly registered.<br><br>

        Thank You.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <div class="col-sm-4">
          <div class="login-form-box">
             <div class="login-form">
             <p class="box-heading">Login</p> <small class="pull-right sm-text">*FOR KNUST STAFF ONLY</small>
              <div class="col-md-12 caption3"><p>Please enter your KNUST Hospital number / File number below</p></div>
              
                            <form role="form" method="post">  
                                <div class="input-field">
                                  <div class="col-md-12">
                                  
                                  <p class = "text-center"><?php loginprocesses();?></p>
                                      <input  name = "clientID" required = "yes" autocomplete = "off"  class="form-control input-lg" id="HospitalNumber" placeholder="Hospital number/File number"  type="text">
                                  </div>                            
                                </div>

                                <div class="col-md-12">
                                  <input class="btn login-btn" type="submit" value="Proceed" name = "proceed">
                                </div>
                            </form>
                            
      </div>
           </div>
      </div>
           
    </div>    
           

    <div class="container">
       <footer class="copyright">
                     <small><span>Copyright © 2019 Kwame Nkrumah University Of Science and Technology. All Rights Reserved<span></small>
                     <br/>
                     <small><span>Developed by University Information Technology Services,KNUST<span></small>
       </footer>  
    </div>   


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
  

</body>
</html>
