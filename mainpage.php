<?php
    include "mainprocess.php";


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>UHS Appointment Portal</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/jumbotron/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS 
<link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->


    <style>

    
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .medicalpane{
          margin-top:-32px;
          height: 100%;
    
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }

      }

      .jumbotron{
        /*background: #434445;*/
      }

      .timesegment{
        -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadein 2s;
}
/*input[type="radio"] {
  -webkit-appearance: checkbox; /* Chrome, Safari, Opera 
    -moz-appearance: checkbox;  /* Firefox 
 -ms-appearance: checkbox;      /*not currently supported 
}*/

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
      

    </style>

        <script>

        </script>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark" style = "margin-top:-59px">
    
      <a class="navbar-brand" href="mainpage.php">UHS Appointment Portal</a>

 <!--   </div>
    <div class = "col-md-3">-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse float-right" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notification Area <strong><span class='badge badge-danger'><?php echo $pendingnumber; ?></span></strong> 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href = "#" data-toggle="modal" data-target="#exampleModalLong">Pending Appointments <strong><span class='badge badge-danger'><?php echo $pendingnumber; ?></span></strong></a>
            <a class="dropdown-item" href = "#" data-toggle="modal" data-target="#exampleModalchange">Request Change of Physician</a>
            <!--<a class="dropdown-item" href="#">Something else here</a>-->
          </div>
        </li>
    </ul>
      <!--<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalLong">
          <strong>Pending Appointments <span class='badge badge-danger'><?php echo $pendingnumber; ?></span></strong>
      </button>-->
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
      <!-- Modal -->
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Pending Appointments</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method = "POST">
            <div class="modal-body">
            <p><i>(please select an appointment you wish to cancel)</i></p>
            <table class = "table">
                      <thead>
                        <tr>
                          <th scope = "col" class = "text-center">Action</th>
                          <th scope = "col" class = "text-center">#</th>
                          <th scope = "col" class = "text-center">Date</th>
                          <th scope = "col" class = "text-center">Time</th>
                        </tr>
                        <?php
                          $index = 1;
                          while($index <= $pendingnumber){
                            while($viewpending = sqlsrv_fetch_array($pendingappointments)){
                              $appID = $viewpending['AppointmentID'];
                              $appDate = $viewpending['DateApp'];
                              $appTime = $viewpending['TimeApp'];
                              $appPhysician = $viewpending['PhysicianID'];
                              $appClient = $viewpending['ClientID'];
                              $appClinic = $viewpending['ClinicID'];
                              $appComments = $viewpending['Comments'];


                              $C1 = explode(':00.', $appTime);
                              $C2 = $C1[0];
                              $c3 = date('h:i:s a', strtotime($C2));
                              $c4 = explode(':00 ', $c3);
                              $finalC = $c4[0] . ' ' . $c4[1];

                              echo "<tr>";
                                echo "<td class = 'text-center'><input type = 'radio' name = 'delete' value = '" . $appID . "' required = yes></td>";
//                                echo "<td class = 'text-center'><button type='submit' class='btn btn-primary btn-sm' name = 'delete'>Cancel</button></td>";
                                echo "<td class = 'text-center'>" . $index . "</td>";
                                echo "<td class = 'text-center'>" . date_format($appDate, "l, j F Y") . "</td>";
                                echo "<td class = 'text-center'>" . $finalC . "</td>";
                              echo "</tr>";
                              $index++;
                            }
                            
                          }
                        ?>
                      </thead>
                      <tbody>
                        <tr>
                        </tr>

                    </table>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" name = "cancelappointment" value = 'Cancel Appointment'>
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>
          <!-- Button trigger modal -->
    
     

</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron" style = "background-color:#ffffff;">
    <div class="row container">
      <div class="col-md-8">
        <h1 class="display-3">Hello, <?php echo  $_SESSION['ClientName'];?></h1>
        <p>You can set you appointment below</p>
       
      <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>-->
      </div>
      <div class = "col-md-4">
        <h5>Your Physician: <?php echo " " . $_SESSION['ChosenPhysician'];?></h5>
        <table class = "table">
          <tr>
            <td><img src = "images/asdf.jpg" alt = "physician image here" height = "150px" width = "150px"></td>
            <td><?php echo $_SESSION['ChosenPhysicianDesc'];?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
 
  <div class="jumbotron container-fluid" style = "margin-top:-32px;">
  
    <!-- Example row of columns -->
    <form method="post" action = <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
    <div class="row medicalpane"style = "height:100%;">
      <div class = "col-md-12" > <h3 class = "text-center">Make Your Appointment Here</h3></div>
        <div class="col-md-4" id = "datesegment">
          <!--<h5 class = "text-center">Physician's Schedule</h5>-->
          
        <table class = "table">
          
            <tr>
            
              <td><p><strong>Select Date of Appointment: </strong></p>
                <select class = "custom-select" name = "dateselect" id = "dateselect" onchange = "myfunction()" required = "yes">
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
              </td>
           <!-- <tr><td><label id = 'selecteddate' name = 'appointmentdate'></label></td></tr>-->
            
            </tr>

            <tr>
              <td>
                <p><strong>Reason for Appointment</strong></p><br>
                <textarea class="form-control" aria-label="With textarea" name = "reason"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                <button type='submit' class='btn btn-primary' name = 'setappoint' onclick = "return confirm('Are You sure you want you want make an appointment on this day?')">Set Appointment</button>
              </td>
            </tr>

            
          </table>
        

        </div>

        <div class="col-md-8" id = "timesegment">
    
 
        </div>
        

    

      </div>
    </div>
    
    </form>
    

  </div> <!-- /container -->
 
</main>

<script>

</script>
<!-- Footer 
<footer class="page-footer font-small blue">

 Copyright
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> </a>
  </div>
  
</footer>
Footer -->
<!--
<footer class="container">
  <p>&copy; Company 2017-2019</p>
</footer>-->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
  $(document).ready(function(){
    $('#dateselect').change(function(){
     $('#timesegment').fadeIn(3000);
    });
  });
</script>
      
<!--
<script type = "text/javascript">
  $("#availabletime").click(function(){
    $("#timesegment").load(" #timesegment");
  })
</script>-->

</html>
