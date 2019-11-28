<?php include 'selectprocess.php'; ?>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap1.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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
      .btn:hover{
         background-color: #146F22;
        }
        .btn {
            background-color:#5cb85c;
        }
        #myBtn {
          display: none;
          position: fixed;
          bottom: 20px;
          right: 30px;
          z-index: 99;
          font-size: 18px;
          border: none;
          outline: none;
          background-color: green;
          color: white;
          cursor: pointer;
          padding: 15px;
          border-radius: 4px;
        }
        #myBtn:hover {
          background-color: #555;
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
            if(cnt==maxAllowed){
                document.getElementByID('submitbutton').disabled = true;
            }
          });
        });

       
        
    </script>

  </head>
  <body>
    <header>

  <div class="navbar navbar-dark shadow-sm" style = "background-color:#5cb85c;">
    <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <!--<img src = "images/03.png" alt = "knust_logo here" height = 30px width = 20px>  -->
                <img src = img/knust-logo.png alt = "logo here"><label>UHS<br/>APPOINTMENT PORTAL</label>
            </a>
    <!--
      <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModalLong">
          <strong>Chosen Physicians: <span class='badge badge-danger'></span></strong>
      </button>
    -->  
    </div>
  </div>
</header>

<button onclick="topFunction()" id="myBtn" title="Go to top">Go To Submit</button>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 && < 100% || document.documentElement.scrollTop > 20 && < 100%) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.GetElementById("gotosubmit")
  document.body.scrollTop = 100;
  document.documentElement.scrollTop = 100;
}
</script>


    <!-- Modal -->
    <form method = "POST" action = "selection.php" id = "selectform" name = "form1">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You sure you want you want to go ahead with this selection?
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-success" name = "selectphy">Yes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" style = "background-color:red;">No</button>
      </div>
    </div>
  </div>
</div>
<main role="main">

  <section class="jumbotron" style = "background-color:#D8FFDE;">
    <div class="container">
      <h1 class="jumbotron-heading">Hello, <?php echo $_SESSION['ClientName']?></h1><br>
      <h4 class="jumbotron-heading">Please read this before you continue..........</h4><br>
      <p class="lead" style = "color:black;">This is the part that is going to contain all the information a client must know before he or she selects the three (3) physicians of his or her choice even though it may happen that none of the client's choices might be the selected physician</p>

    </div>
  </section>

  <div class="album py-5 bg-light" style = "margin-top: -34px;">
 
    <div class="container">
      <div class="row">


      <?php
   //       $index = 1;
     //     while ($index<=$phrow_count){
            while ($row_physicians = sqlsrv_fetch_array($selectphysicians)){
              echo "<div class='col-md-4'>";
              echo "<div class='card mb-4 shadow-sm' style = 'background-color:#D8FFDE'>";
              echo "<img class='bd-placeholder-img card-img-top text-center' width='100%' height='270ox' src='images/asdf.jpg' alt = 'Physicians Image Goes Here'>";
              echo "<div class='card-body bg-light' > <p class='card-text text-center'><strong>" . ($row_physicians['Fullname']) . "</strong></p>";
              //echo "<div class='card-body'> <p class='card-text'>Specialty: " . ($row_physicians['PhysicianSpecialty']) . '<br>Description: ' .($row_physicians['PhysicianDesc']) . "</p>";
              echo "<div class='card-body'>";
              echo "<div class='d-flex justify-content-between align-items-center'>";
              
              echo "<div class='input-group mb-3'>";
                echo "<div class='input-group-prepend'>";
                  
                    echo "<input type='checkbox' class = 'single-checkbox' name = 'phyID[]' value = '" . ($row_physicians['MID']) . "' aria-label='Checkbox for following text input' style = 'width:40px;height:40px'>";
                  
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
          
    <section id = "gotosubmit">
    <div class = "float-center container">
        <button id = "submitbutton" type="button" class="btn btn-lg btn-block text-white" data-toggle="modal" data-target="#exampleModalCenter" >Submit Selection</button>
       <!-- <button type="button" data-toggle="modal" data-target="#exampleModalchange" class="btn btn-lg btn-block text-white" >Submit Selection</button>
        <button type="submit" class="btn btn-lg btn-block text-white" name = "selectphy" onclick = "return confirm('Are You sure you want you want to go ahead with this selection?')">Submit Selection</button>-->
    </div>
    </section>

  
  </div>

</main>
</form>
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
