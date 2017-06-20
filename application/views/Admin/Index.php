<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Admin DashBoard</title>
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


    <h3 id="js_Sess" class="center-align" data-sesion="<?= $SesValidate?>">
      Welcome

      <?php foreach ($Employee->result() as $employe) {?>

        <!-- Display Employee Name -->
        <?php echo $employe->NameEmp ?>

      <?php } ?>
       <!-- End foreach -->

    </h3>

    <!-- Start Content -->
    <div class="row">
      <div class="col s12 m12 l12">

        <!-- Start Card Entrances Report -->
        <div class="row">
          <div class="col s12 m4 l4">
            <div class="card-panel teal">

              <p class="center-align">
                <i class="material-icons white-text large ">&#xE865;</i>
              </p>

              <h4 class="white-text center-align">Entrances Report</h4>

            </div>
          </div>
        </div>
        <!-- End Card Entrances Report -->


      </div>
    </div>
    <!-- End Content -->

  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Aditional js -->
  <script type="text/javascript" src="<?=base_url('materialize\js\Admin\Index.js')?>"></script>


</html>
