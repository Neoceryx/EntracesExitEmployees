<!-- Start NavBar -->
<nav>
  <div class="nav-wrapper blue-grey darken-3">

    <a href="<?=site_url("LoginController/EmployeeDashBoard")?>" class="brand-logo">Employee</a>

    <!-- Start NavBar Links -->
    <ul id="nav-mobile" class="right hide-on-med-and-down">

      <!-- Validate If the user is login -->
      <?php if ($this->session->userdata('login') ) { ?>

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
