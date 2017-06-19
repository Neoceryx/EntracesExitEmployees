<?php

/**
 *
 */
class LoginController extends CI_Controller
{

  public function index()
  {

    // destroy session values
    $this->session->sess_destroy();

    // Load  the css filter_list
    $this->load->view('Template\css');

    // Load the Login Form
    $this->load->view('Login');

  }

  public function Login()
  {

    //  <Summary>
    //  Is necesari add session library on autoload file
    //  And create encription key on config file.
    //  </Summary>

    // Recibe EmployeNumber form ajaxCall
    $EmplNumber=$this->input->post('EMPNUM');

    // Recibe Employee Password
    $EmpPass=$this->input->post('PASS');

    // Display values
    // echo $EmplNumber." :: ". $EmpPass;

    // Store the vaules for the sesion variable. only can stroe 3 varibles
    $EmpSession = array(
      'NoEmploye' =>$EmplNumber,
      'Id' => 0,
      'login'=>true, // Says if the empl is login
   );

  //  Build the session
   $this->session->set_userdata($EmpSession);

  //  Allows access to the propieties array session
   echo $this->session->userdata('NoEmploye');

  }


}

 ?>
