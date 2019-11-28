<?php

include 'loginprocess.php';

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
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>UHS Online Appointment Portal</title>

    
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
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
    
    <h3 class="cover-heading"><img src = "images/03.png" alt = "knust_logo here" height = 70px width = 45px><br>UHS APPOINTMENT PORTAL</h3><br>

    <form method = post>
      <p class="lead">Please enter you hospital number below</p>
      <input type = "text"  name = "clientID" required = yes autocomplete = "off"><br><br>
      <input type = "submit" class ="btn btn-lg btn-secondary" name = "proceed" value = "Proceed" data-toggle = "modal" data-target = "#exampleModal">

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
