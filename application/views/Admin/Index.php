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
          <?php if ($this->session->userdata('login') ) { ?>

            <li><a href="<?=site_url('LoginController/LogOut')?>">Log Out</a></li>      

          <?php } else { ?>

            <!-- <p>asdasd</p> -->

          <?php } ?>
          <!-- End Pass Session Variable -->

        </ul>
        <!-- End NavBar Links -->

      </div>
    </nav>
    <!-- End NavBar -->


    <h3>
      Welcome

      <?php foreach ($Employee->result() as $employe) {?>

        <!-- Display Employee Name -->
        <?php echo $employe->NameEmp ?>

      <?php } ?>
       <!-- End foreach -->

    </h3>





  </body>
</html>
