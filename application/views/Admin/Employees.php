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
        <div class='col s12 m4 l4 js_Employee' data-empid='<?=$employe->EmpId?>'>
          <div class='card-panel grey lighten-5 z-depth-1'>
            <div class='row valign-wrapper'>
              <div class='col s4'>
                <img src='http://blog.chemistry.com/wp-content/uploads/2012/09/man-smiling.jpg' alt='' class='circle responsive-img'>
              </div>
              <div class='col s8'>
                <span class='black-text'>
                  <p class="js_EmpName"><?=$employe->NameEmp." ".$employe->FstName?></p>
                  <p><?=$employe->NoEmploye?></p>
                  <p><?=$employe->Desc?></p>
                </span>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
    <!-- End employee list container -->

    <input id="sortpicture" type="file" name="sortpic" />
<button id="upload">Upload</button>

  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Aditional js files -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Admin\Employees.js")?>"></script>

</html>
