<?php

include 'pinprocess.php';

/*if (isset($_POST['submit'])){
  $pinNumber = htmlspecialchars($_POST['pinNumber']);
  $readpin = "SELECT * from Pin WHERE ClientID = ? and Pin = ;";
  $params = array($clientID);
  $selectquery = sqlsrv_query($connection, $select, $params); 
  $selectresult = sqlsrv_num_rows($selectquery);
  if ($selectresult === false){
      echo "User is not registered";
  }else{
      generatePIN();
  }
  
}*/

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="knust uits">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>UHS Online Appointment Portal</title>

    
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      body{
          background: blue;
      }

      .pin{
          text-length:
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      #pinnum{
        display:none;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      
  <header class="masthead mb-auto">
  
  <div class="inner">
      
<!--      <h4 class="masthead-brand"><img src = "images/03.png" alt = "knust_logo here" height = 70px width = 45px>       UNIVERSITY HEALTH SERVICES</h4>-->

    </div>
  </header>

  <main role="main" class="inner cover" id="hospnum">
    
    <h3 class="cover-heading"><img src = "images/03.png" alt = "knust_logo here" height = 70px width = 45px><br>UHS APPOINTMENT PORTAL</h3><br><br>
    <p class="cover">Welcome <?php echo $_SESSION['ClientName'];?>, with Hospital ID: <?php echo $_SESSION['ClientID'];?></p>
    <p class="lead">Please enter the 5-digit PIN number sent to your phone number registered with the hospital</p>
   
    

    <form method = post action = "numcheck.php">
      <input type = "text" class = "pintext" name = "pinNumber" required = yes autocomplete = "off" maxlength="5" ><br><br>
      <input type = "submit" class ="btn btn-lg btn-secondary" data-toggle="modal" data-target="#exampleModal" name = "submit" value = "Submit" data-target = "#pinissues"><br><br>

<p class = "lead"><a href="http://html.design">Resend PIN</a></p>
    <form>
  </main>

  <!--<main role="main" class="inner cover" id = "pinnum">
    <h3 id = "response" class = "cover"></h3>
    
    <h3 class="cover">Please enter the 5-digit PIN number sent to your phone number registered with the hospital</h3>
    <p class="lead">Please enter you hospital number below</p>--><!--
    <form method = post action = #>
      <input type = "text"  name = "pinNumber" required = yes><br><br>
      <input type = "submit" class ="btn btn-lg btn-secondary" name = "submit" value = "Submit">
    <form>
  </main>-->


  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Copyright© 2019. All Rights Reserved.</p>
    </div>
  </footer>
</div>
</body>
</html>
