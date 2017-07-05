<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h3 class="center-align">Employees List</h3>

    <!-- Start Search panel container -->
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel white black-text">

          <h4>Search</h4>

          <!-- Start Search form -->
          <div class="row">
            <form class="col s12" >
              <div class="row">

                <div class="input-field col s6">
                  <input id="js_SrchString" type="text" name="" value="">
                  <label for="js_Srch">Search</label>
                </div>

                <div class="input-field col s6">
                  <button id="js_SrchBtn" type="button" class="btn waves-effect waves-light">Click Me</button>
                </div>

              </div>
            </form>
          </div>
          <!-- End Search form -->


        </div>
      </div>
    </div>
    <!-- End Search panel container -->

    <!-- Start employee list container -->
    <div class="row js_EmpList">

      <?php foreach ($EMPLOYE->result() as $employe) {?>
        <div class="col s12 m4 l4 js_Employee" data-empid="<?=$employe->EmpId?>">
          <div class="card-panel grey lighten-5 z-depth-1">

            <div class="row valign-wrapper">

              <div class="col s4">
                <img src="http://blog.chemistry.com/wp-content/uploads/2012/09/man-smiling.jpg" alt="" class="circle responsive-img">
              </div>

              <div class="col s8">
                <span class="black-text">
                  <div class="js_EmpName" ><?=$employe->NameEmp." ".$employe->FstName?></div>
                  <div><?=$employe->NoEmploye?></div>
                  <div><?=$employe->Desc?></div>
                </span>
              </div>

            </div>

          </div>
        </div>
      <?php } ?>

    </div>
    <!-- End employee list container -->

    <!-- <p class="js_t">clickme</p> -->

    <div class="js_Json">
      <div class="">
      </div>
    </div>

    <!-- Modal Structure -->
    <div id="js_EmpDetail" class="modal modal-fixed-footer">
      <div class="modal-content ">

        <h4>Employee Information</h4>

        <!-- Start Edit Options -->
        <a class="dropdown-button btn" data-activates='EmpOptions'>
          <i class="material-icons">&#xE8B8;</i>
        </a>

        <ul id="EmpOptions" class='dropdown-content'>
          <li><a id="js_Edit" href="#!">Edit</a></li>
          <li><a id="js_Delete" href="#!">Delete</a></li>
        </ul>
        <!-- End Edit Options -->

        <div class="row">
          <form class="col s12 js_EmpInfoForm">

            <div class="row ">

              <div class='input-field col s6'>
              <input id='js_empname' disabled  type='text'placeholder='Employee Name' name='' value='$employee->NameEmp'>
              <label for='js_empname'></label>
              </div>

              <div class='input-field col s6'>
              <input id='js_FstNme' disabled  type='text' placeholder='First Name' name='' value='$employee->FstName'>
              <label for='js_FstNme'></label>
              </div>

              <div class='input-field col s6'>
              <input id='js_EmpNumber' disabled  type='text'placeholder='Employe Number' name='' value='$employee->NoEmploye'>
              <label for='js_EmpNumber'></label>
              </div>

              <div class="col s6 ">
                <label>Employee roles</label>
                <select id="js_RolesId" disabled  class="browser-default" >
                  <option value=""  selected>Choose the employee role</option>
                  <option value="1">Admin</option>
                  <option value="2">Normal</option>
                </select>
              </div>

            </div>

            <!-- Display backend results -->
            <div class="js_EmpInfo"></div>

            <!-- Display backend result -->
            <div class="js_UpdateEmpResult"></div>

            <!-- it will Display the qr generated -->
            <canvas id="js_QrCode"></canvas>


          </form>
        </div>

      </div>
      <div class="modal-footer">
        <a id="js_ModifyEmpInfo" disabled href="#!" class="waves-effect waves-green btn-flat ">Save Changes</a>
        <a id="js_CreateQr" href="#!" class="waves-effect waves-green btn-flat" >Create QrCode</a>
      </div>
    </div>

  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Animation Framework -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Main.js")?>"></script>

  <!-- Qr Generator plugin -->
  <script type="text/javascript" src="<?=base_url("materialize\Plugins\qrious\qrious.js")?>"></script>

  <script type="text/javascript">

    // Storage the server path
    let URL="<?=base_url('index.php/')?>"

  </script>

  <!-- Aditional js files -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Admin\Employees.js")?>"></script>

</html>
