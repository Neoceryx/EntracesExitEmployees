<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>New Employee</title>

    <!-- Alertfy css Files -->
    <link rel="stylesheet" href="<?=base_url("materialize\Plugins\alertifyjs\css\alertify.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("materialize\Plugins\alertifyjs\css/themes\default.min.css")?>">



  </head>
  <body>

    <h3 class="center-align">New Employee Register</h3>

    <!-- Start form Register container -->
    <div class="row">
      <form id="js_FormRegEmp" class="col s12 m12 l12">
        <div class="row">

          <div class="input-field col s6">
            <input id="js_Name" type="text" placeholder="Name" name="jv_Name" class="validate" value="">
          </div>

          <div class="input-field col s6">
            <input id="js_FstName" type="text" placeholder="First Name" name="jv_FstName" value="">
          </div>

          <div class="input-field col s4">
            <input id="js_EmpNumbr" type="text" placeholder="Employe Number" name="jv_EmpNum" value="">
          </div>

          <div class="input-field col s4">
            <input id="js_Pass" type="password" placeholder="Employe Pass" name="js_EmpPass" value="">
          </div>

          <div class="col s4">
            <label>Browser Select</label>
            <select id="js_EmpRole" class="browser-default" name="jv_EmpRole">
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

    <!-- Display bakenc result -->
    <div class="js_Result"></div>


  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Framework effects -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Main.js")?>"></script>

  <!-- Jquery Validator Plugin -->
  <script type="text/javascript" src="<?=base_url("materialize\Plugins\jquery-validation-1.16.0\dist\jquery.validate.min.js")?>"></script>

  <!-- Alertfy js -->
  <script src="<?=base_url("materialize\Plugins\alertifyjs\alertify.min.js")?>"></script>

  <script type="text/javascript">

    // Storage the server path
    let URL="<?=base_url('index.php/')?>"

  </script>

  <!-- Adtional Js -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Admin\NewEmployee.js")?>"></script>

</html>
