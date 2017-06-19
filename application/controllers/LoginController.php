<?php

/**
 *
 */
class LoginController extends CI_Controller
{

  public function index()
  {

    // Load  the css filter_list
    $this->load->view('Template\css');

    // Load the Login Form
    $this->load->view('Login');
    
  }


}

 ?>
