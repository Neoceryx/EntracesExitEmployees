<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h3 class="center-align">Employees List</h3>

    <!-- Start employee list container -->
    <div class="row">

      <!-- Start Employee Card -->
      <div class="col s12 m4 l4 js_Employee" data-empid="1">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="col s4">
                <img src="https://cdn0.iconfinder.com/data/icons/superuser-web-kit/512/686909-user_people_man_human_head_person-512.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="col s8">
                <span class="black-text">
                  <p>Daniel Fierro</p>
                  <p>12345678</p>
                  <p>Normal</p>
                </span>
              </div>
            </div>
          </div>
        </div>
      <!-- End Employee Card -->

    </div>
  <!-- End employee list container -->

  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Aditional js files -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Admin\Employees.js")?>"></script>

</html>
