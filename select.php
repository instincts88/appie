<?php include 'selectprocess.php';?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Select Physicians</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

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
    </style>
    <!-- Custom styles for this template -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $("input[type='checkbox']").change(function(){
            var maxAllowed = 3;
            var cnt = $("input[type='checkbox']:checked").length;
            if(cnt>maxAllowed){
              $(this).prop("checked", "");
              alert('You can only select a maximum of ' + maxAllowed + ' physicians.');
            }
          });
        });
    </script>

  </head>
  <body>
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
  
  </div>
  <div class="navbar navbar-dark shadow-sm" style = "background-color:green;">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <!--<img src = "images/03.png" alt = "knust_logo here" height = 30px width = 20px>  -->
        <strong>UHS Appointment Portal</strong>
      </a>
<!--
      <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalLong">
          <strong>Chosen Physicians: <span class='badge badge-danger'></span></strong>
      </button>
    -->  
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron">
    <div class="container">
      <h1 class="jumbotron-heading">Hello, <?php echo $_SESSION['ClientName']?></h1><br>
      <h4 class="jumbotron-heading">Please read this before you continue..........</h4><br>
      <p class="lead" style = "color:black;">This is the part that is going to contain all the information a client must know before he or she selects the three (3) physicians of his or her choice even though it may happen that none of the client's choices might be the selected physician</p>

    </div>
  </section>

  <div class="album py-5 bg-light" style = "margin-top: -34px;">
  <form method = "POST" action = "select.php" id = "selectform" name = "form1">
    <div class="container">
      <div class="row">


      <?php
   //       $index = 1;
     //     while ($index<=$phrow_count){
            while ($row_physicians = sqlsrv_fetch_array($selectphysicians)){
              echo "<div class='col-md-4'>";
              echo "<div class='card mb-4 shadow-sm bg-primary '>";
              echo "<img class='bd-placeholder-img card-img-top text-center' width='100%' height='270ox' src='images/asdf.jpg' alt = 'Physicians Image Goes Here'>";
              echo "<div class='card-body bg-light' > <p class='card-text text-center'><strong>Dr. " . ($row_physicians['PhysicianOtherNames']) . " " . ($row_physicians['PhysicianSurname']) . "</strong></p>";
              echo "<div class='card-body'> <p class='card-text'>Specialty: " . ($row_physicians['PhysicianSpecialty']) . '<br>Description: ' .($row_physicians['PhysicianDesc']) . "</p>";
              echo "<div class='d-flex justify-content-between align-items-center'>";
              
              echo "<div class='input-group mb-3'>";
                echo "<div class='input-group-prepend'>";
                  
                    echo "<input type='checkbox' class = 'single-checkbox' name = 'phyID[]' value = '" . ($row_physicians['PhysicianID']) . "' aria-label='Checkbox for following text input' style = 'width:40px;height:40px'>";
                  
                echo "</div>";
              //  echo "<input type='text' class='form-control' aria-label='Text input with checkbox'>";
            //  echo "</div>";
           //   echo "<div class='btn-group'> <input id = 'selectphysicians' type = 'submit' name = 'selectphy' value = 'Select' class='btn btn-sm btn-outline-secondary' onclick = selectphysicians();> ";
              //echo "<input type  = 'text' name = 'physicianIDs' value = '" . ($row_physicians['PhysicianID']) . "'>";
              
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";

       //       $index++;

         //   }
          }
          

      ?>


      </div>
    </div>
    <div class = "float-center container">
    <button type="submit" class="btn btn-primary btn-lg btn-block" name = "selectphy" onclick = "return confirm('Are You sure you want you want to go ahead with this selection?')">Submit Selection</button>
    </div>
  </form>
  
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
