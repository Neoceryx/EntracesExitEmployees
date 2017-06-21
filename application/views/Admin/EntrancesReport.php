<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <!-- Start NavBar -->
    <nav>
      <div class="nav-wrapper blue-grey darken-3">

        <a href="<?=site_url("LoginController/AdminPanel")?>" class="brand-logo">Admin</a>

        <!-- Start NavBar Links -->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#">Entrances Report</a></li>

          <!-- Validate If the user is login -->
          <?php if ($this->session->userdata('login') ) { $SesValidate=$this->session->userdata('login') ?>

            <li><a href="<?=site_url('LoginController/LogOut')?>">Log Out</a></li>

          <?php } else {

            // Redirect User to the login Form
            header('location:'.site_url("LoginController/index"));

          } ?>
          <!-- End Pass Session Variable -->

        </ul>
        <!-- End NavBar Links -->

      </div>
    </nav>
    <!-- End NavBar -->

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
                  <input id="js_NoEmp" type="text" name="" value="">
                  <label for="js_NoEmp">No Employee</label>
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



    <table id="js_Entrances">

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

      <tbody>

        <!-- Start Display Employe Info -->
        <?php foreach ($Employee->result() as $employee) {?>

          <tr class="js_EmpRecords">
            <td><?= $employee->NameEmp?></td>
            <td><?= $employee->FstName?></td>
            <td><?= $employee->NoEmploye?></td>
            <td><?= $employee->EntraceRegister?></td>
            <td><?= $employee->Exitregister?></td>
            <td><?= $employee->TimeNeeded?></td>
          </tr>

        <?php } ?>
        <!-- End Display Employe Info -->


      </tbody>

    </table>



  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Table Export plugin -->
  <script type="text/javascript" src="<?=base_url("materialize\Plugins\TableExport\libs\FileSaver\FileSaver.min.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("materialize\Plugins\TableExport\libs\js-xlsx\xlsx.core.min.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("materialize\Plugins\TableExport/tableExport.js")?>"></script>


  <!-- Aditional js -->
  <script type="text/javascript" src="<?=base_url('materialize\js\Admin\EntrancesReport.js')?>"></script>

</html>
