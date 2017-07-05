<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Entraces Report</title>

    <!-- Alertfy css Files -->
    <link rel="stylesheet" href="<?=base_url("materialize\Plugins\alertifyjs\css\alertify.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("materialize\Plugins\alertifyjs\css/themes\default.min.css")?>">

  </head>
  <body>


    <h3 class="center-align">Entrances Report</h3>

    <!-- Start Search Panel -->
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">

          <h5>Search</h5>

          <!-- Start Search From -->
          <div class="row">
            <form class="col s12">
              <div class="row">

                <div class="input-field col s6">
                  <input id="js_StartDate" type="date" class="datepicker">
                  <label for="js_StartDate">Initial  Date</label>
                </div>

                <div class="input-field col s6">
                  <input id="js_EndDate" type="date" class="datepicker">
                  <label for="js_EndDate">Final Date</label>
                </div>

                <div class="input-field col s12">
                  <button id="js_Srch" type="button" name="button" class="btn waves-effect waves-light">Search</button>
                  <button id="js_Download" type="button" name="button" class="btn waves-effect waves-light">Download</button>
                </div>

              </div>
            </form>
          </div>
          <!-- Start Search From -->

        </div>
      </div>
    </div>
    <!-- End Search Panel -->

    <table id="js_Entrances" class="responsive-table highlight">

      <thead>
        <tr>
          <th>Name</th>
          <th>First Name</th>
          <th>No Employee</th>
          <th>Entrance</th>
          <th>Exit</th>
          <th>Worked Time</th>
        </tr>
      </thead>

      <tbody id="js_EntrancesData">
      </tbody>

    </table>



  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Animation Framework -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Main.js")?>"></script>

  <!-- Momentjs -->
  <script type="text/javascript" src="<?= base_url("materialize\Plugins\Momentjs.js")?>"></script>

  <!-- Alertfy js -->
  <script src="<?=base_url("materialize\Plugins\alertifyjs\alertify.min.js")?>"></script>

  <!-- Table Export plugin -->
  <script type="text/javascript" src="<?=base_url("materialize\Plugins\TableExport\libs\FileSaver\FileSaver.min.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("materialize\Plugins\TableExport\libs\js-xlsx\xlsx.core.min.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("materialize\Plugins\TableExport/tableExport.js")?>"></script>

  <script type="text/javascript">

    // Storage the server path
    let URL="<?=base_url('index.php/')?>"

  </script>

  <!-- Aditional js -->
  <script type="text/javascript" src="<?=base_url('materialize\js\Admin\EntrancesReport.js')?>"></script>

</html>
