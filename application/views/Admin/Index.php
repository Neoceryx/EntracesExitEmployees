<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Admin DashBoard</title>
  </head>
  <body>

    <h3 id="js_Sess" class="center-align">
      Welcome

      <?php foreach ($Employee->result() as $employe) {?>

        <!-- Display Employee Name -->
        <?php echo $employe->NameEmp ?>

      <?php } ?>
       <!-- End foreach -->

    </h3>

    <!-- Start Content -->
    <div class="row">

      <!-- Start Card Entrances Report -->
      <div id="js_EntraceReport" class="col s12 m4 l4">
        <div class="card-panel teal">

          <p class="center-align">
            <i class="material-icons white-text large ">&#xE865;</i>
          </p>

          <h4 class="white-text center-align">Entrances Report</h4>

        </div>
      </div>
      <!-- End Card Entrances Report -->

      <!-- Start Register Employee Card -->
      <div id="js_RegEmp" class="col s12 m4 l4">
        <div class="card-panel blue">
          <!-- Icon -->
          <p class="white-text center-align" >
            <i class="material-icons large">&#xE853;</i>
          </p>

          <h4 class="white-text center-align">New Employees</h4>

        </div>
      </div>
      <!-- End Register Employee Card -->

      <!-- Start Employees list Card -->
      <div id="js_Emp" class="col s12 m4 l4">
        <div class="card-panel teal">

          <!-- Icon -->
          <p class="white-text center-align" >
            <i class="material-icons large">&#xE853;</i>
          </p>

          <!-- Tittle -->
          <h4 class="white-text center-align">Employees</h4>

        </div>
      </div>
      <!-- End Employees list Card -->


    </div>
    <!-- End Content -->

  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Aditional js -->
  <script type="text/javascript" src="<?=base_url('materialize\js\Admin\Index.js')?>"></script>


</html>
