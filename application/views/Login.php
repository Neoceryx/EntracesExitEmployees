<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <!-- Start NavBar -->
    <nav>
      <div class="nav-wrapper blue lighten-2">

        <a href="<?=base_url();?>" class="brand-logo">HOME</a>

        <!-- Start NavBar Links -->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="<?=site_url('LoginController/index')?>">Login</a></li>
        </ul>
        <!-- End Navbar Links -->

      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Content -->
    <div class="row">

      <!-- Add 3 blank spaces to the left -->
      <div class="col s12 l3"></div>

      <!-- Start Login Form Content -->
      <div class="col s12 l9">

        <div class="row">
          <div class="col s12 m7 l7">
            <div class="card-panel white">

              <!-- Start Login From -->
              <div class="row">
                <form class="col s12">
                  <div class="row">

                    <div class="input-field col s12">
                      <input id="js_EmployeeNmbr" type="text" class="validate">
                      <label for="js_EmployeeNmbr">Employe Number</label>
                    </div>

                    <div class="input-field col s12">
                      <input id="js_Password" type="text" name="" value="">
                      <label for="js_Password">Password</label>
                    </div>

                    <div class="input-field col s12">
                      <button id="js_LoginBtn" class="btn waves-effects waves-light col s12" type="button" name="button">Login</button>
                    </div>

                  </div>
                </form>
              </div>
              <!-- End login form -->

            </div>
          </div>
        </div>

      </div>
      <!-- End Login Form Content -->

    </div>
    <!-- End Content -->


  </body>

  <!-- Js Files -->
  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>


</html>
