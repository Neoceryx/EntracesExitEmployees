<!DOCTYPE html>
<html>
  <head>

    <title>Entraces And exits</title>

  </head>
  <body>

    <h3 class="center-align">Shift Entrances and exits</h3>
    <!-- <a href="<?=site_url('EmployeeController/test/123')?>">TesMethod</a> -->


    <div class="row">

      <div class="col s12 m4 l4">
        Qr Code Reader
      </div>

      <!-- Start Entrances and Exits Table -->
      <div class="col s12 m8 l8">

        <table class="highlight">

          <thead>
            <tr>
              <th>Name</th>
              <th>First Name</th>
              <th>No Employee</th>
              <th>Entrace</th>
              <th>Exit</th>
              <th>Total time</th>
            </tr>
          </thead>

          <!-- Here ajax Put the info  -->
          <tbody class="js_ShiftResult"></tbody>

        </table>

      </div>
      <!-- End Entrances and Exits Table -->


    </div>

  </body>


  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <!-- Materialize js Files -->
  <script type="text/javascript" src="materialize\js\materialize.min.js"></script>

  <!-- Aditional js -->
  <script src="materialize\js\EntrancesExtis.js" charset="utf-8"></script>


</html>
