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
                    <div class="container-fluid col-md-12">
                      <div class="navbar-header col-md-6">
                        <a class="navbar-brand" href="#"><img src="img/knust-logo.png"> UHS <br/> APPOINTMENT PORTAL</a>
                      </div>
                      <div class="profile col-md-6">
                        <div class="profile-name pull-right">
                          <span id="welcome-tag">Hi, </span>
                          <span id="profile-id"><?php echo $_SESSION['ClientName'];?></span>
                          <a href="login.html" id="logout" class="btn"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                        </div>
                                                    
                        </div>
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
                          <li  class="active"><a href="index.php"><i class="fa fa-home"></i> Create An Appointment</a></li>
                          <li><a href="appointments.php"><i class="fa fa-calendar"></i> Appointments 
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

      <h3 class="caption2">Welcome <?php echo  $_SESSION['ClientName'] . ", ";?> let's get you started</h3>       

      <div class="booking-form">
                            <form role="form" action="" method="post">
                              <div class = "row">
                                <div class="col-md-12">
                                  <div class="contain-doctors">
                                    <div class="col-xs-4">
                                      <div class="dr-image">
                                        <?php //echo "<img src='" . $_SESSION['ChosenPhysicianImage'] . "'>"; ?>
                                      </div>
                                    </div>
                                    <div class="col-xs-8">
                                      <h6>Your Physician</h6>
                                      <h3 class="dr-name"><?php echo " " . $_SESSION['ChosenPhysician'];?></h3>
                                    </div>
                                  </div> 
                                </div>
                               
                              </div>
                                <div class="col-md-6 contain-date-time pull-left"> 

                                  <div class="contain-pickdate">
                                    <fieldset>
                                      <!--<input type="date" id="dateselect" name = "dateselect" placeholder="Select appointment Date" required="">-->
                                      
                                      <select class = "form-control" name = "dateselect" id = "dateselect" onchange = "myfunction()" required = "yes">
                                        <option value = ''  disabled selected>Please Select Date</option>
                                        <?php 
                                            while ($activedays = sqlsrv_fetch_array($selectactivedays)){
                                                $ChosenDay = $activedays['DayTT'];
                                                $ChosenMonth = $activedays['MonthTT'];
                                                $ChosenYear = $activedays['YearTT'];
                                                $Wholedate = $ChosenDay . ' ' . $ChosenMonth . ' ' . $ChosenYear;

                                                echo "<option name = 'dates' value = '" . $Wholedate . "' >" . $Wholedate . "</option>";
                                            }
                                        ?>
                                      </select>
                                    </fieldset>
                                
                                  </div>
                                
                                  <div class="input-field" id = "timesegment">
                                 
                                  </div>
                                  
                                </div>
                                <div class = "col-md-6">
                                  <div class="input-field">
                                   
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "reason" placeholder = "Reason for Appointment (Optional)"></textarea>
                                  </div>
                                </div>
                                                              
                                <div class="col-md-12 contain-btn">
                                  <button type = "submit" class = "btn proceed-btn btn login-btn pull-right" name = "setappoint">Proceed <i class="fa fa-arrow-right"></i></button>
                                </div>  
                            </form>
      </div>
    </div>         
  </div>          
  <script src="js/jquery-3.4.1.min.js"></script>
<script>
  $(document).ready(function(){
    $('#dateselect').change(function(){
      var datevalue = $(this).val();
      $.ajax({
        url:"timeslice.php",
        method:"POST",
        data:{datevalue:datevalue},
        dataType:"text",
        success:function(data)
        {
          $('#timesegment').html(data);
        }
        

      });
    });
  });




</script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.date.js'></script>
  

</body>
</html>
