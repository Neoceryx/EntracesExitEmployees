<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h3 class="center-align">New Employee Register</h3>

    <!-- Start form Register container -->
    <div class="row">
      <form class="col s12 m12 l12">
        <div class="row">

          <div class="input-field col s6">
            <input id="js_Name" type="text" name="" value="">
            <label for="js_Name">Name</label>
          </div>

          <div class="input-field col s6">
            <input id="js_FstName" type="text" name="" value="">
            <label for="js_FstName">First Name</label>
          </div>

          <div class="input-field col s4">
            <input id="js_EmpNumbr" type="text" name="" value="">
            <label for="js_EmpNumbr">Employe Number</label>
          </div>

          <div class="input-field col s4">
            <input id="js_Pass" type="text" name="" value="">
            <label for="js_Pass">Employe Pass</label>
          </div>

          <div class="col s4">
            <label>Browser Select</label>
            <select id="js_EmpRole" class="browser-default">
              <option value="" disabled selected>Choose your option</option>
              <option value="2">Normal</option>
              <option value="1">Admin</option>
            </select>
          </div>

          <div class="input-field col s12">
            <button id="js_SaveEmp" type="button" class="btn-large waves-effect waves-light">Save</button>
          </div>

        </div>
      </form>
    </div>
    <!-- Start form Register container -->


  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Framework effects -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Main.js")?>"></script>

  <!-- Adtional Js -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Admin\NewEmployee.js")?>"></script>



</html>
