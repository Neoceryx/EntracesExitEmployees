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

    <!-- Modal Structure -->
    <div id="js_EmpDetail" class="modal modal-fixed-footer">
      <div class="modal-content ">

        <div class="row">
          <form class="col s12">

            <div class="row js_EmpInfo">

            </div>

            <div class="row ">

              <div class="col s6 ">
                <label>Employee roles</label>
                <select id="js_RolesId" class="browser-default" >
                  <option value=""  selected>Choose the employee role</option>
                  <option value="1">Admin</option>
                  <option value="2">Normal</option>
                </select>
              </div>

            </div>

          </form>
        </div>

      </div>
      <div class="modal-footer">
        <a id="js_ModifyEmpInfo" href="#!" class="waves-effect waves-green btn-flat ">Save Changes</a>
      </div>
    </div>

  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Animation Framework -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Main.js")?>"></script>

  <!-- Aditional js files -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Admin\Employees.js")?>"></script>

</html>
