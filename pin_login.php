<?php include 'pinprocess.php'; ?>
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
          <p class="caption">Welcome to the University Hospital, KNUST Appointment Portal, a simple way to book online to visit a Doctor</p>
      </div>

      <div class="col-sm-4">
          <div class="login-form-box">
             <div class="login-form">
             <p class="box-heading">Login</p> <small class="pull-right sm-text">*FOR KNUST STAFF ONLY</small>

              <div class="col-md-12 caption3"><p>Welcome <span class="staff-name"><?php echo $_SESSION['ClientName'];?></span> with Hospital Number: <span class="hospital-id"><?php echo $_SESSION['ClientID'];?></span>  </p>

              <p>Please enter the 5-digit PIN number sent to your phone number registered with the hospital</p>  
              </div>
              
                            <form role="form" method="post">
                                
                                <div class="input-field">
                                  <div class="col-md-12">
                                  <p class = "text-center"><?php pinprocesses();?></p>
                                    <input class="form-control input-lg" id="pin" placeholder="Pin"  type="text" name = "pinNumber" required = yes autocomplete = "off" maxlength="5" >
                                  </div>                            
                                </div>

                                <div class="col-md-12">
                                  <!-- <input class="btn login-btn" type="submit" value="Submit"> -->
                                  <input class="btn login-btn" type="submit" value="Submit" name = "submit">
                                </div>
                            </form>
                            <form method = "post">
                                <div class="col-md-12 text-center">
                                  <button type="submit" name = "resendpin" class="btn btn-link" style = "color:black">Resend PIN</button>
                                  <p class = "text-center"><?php resendpins();?></p>
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
