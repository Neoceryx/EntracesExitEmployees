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

  public function Login()
  {

    // Recibe EmployeNumber form ajaxCall
    $EmplNumber=$this->input->post('EMPNUM');

    // Recibe Employee Password
    $EmpPass=$this->input->post('PASS');

    // Display values
    echo $EmplNumber." :: ". $EmpPass;


  }


}

 ?>
