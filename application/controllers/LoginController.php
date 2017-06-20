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

    // Loads the model
    $this->load->model('employees');

    // Acces Method from Model
    $Row=$this->employees->LoginEmp($EmplNumber, $EmpPass);

    // Debugger
    // var_dump($Row);

    // Validate Users Data
    if ($Row != null) {

      if ($Row->Pass == $EmpPass ) {

          // Store the vaules for the sesion variable. only can stroe 3 varibles
          $EmpSession = array(
            'NoEmploye' =>$EmplNumber,
            'Id' => 0,
            'login'=>true, // Says if the empl is login
            );

          //  Build the session
          $this->session->set_userdata($EmpSession);

          //  Allows access to the propieties array session
          echo $this->session->userdata('login');

      }else {

        // Redirect user to the index
        header('location:'.base_url());
      }

    }else {

      echo 0;

    }

  }
  // End Login Method

  public function LogOut()
  {
    // destroy session values
    $this->session->sess_destroy();

    // Redirect user to the index
    header('location:'.base_url());

  }


  public function AdminPanel()
  {

    // Load the Css Files.
    $this->load->view('Template\css.php');

    // Get Employe Number from Session variable
    $EmpNumbr=$this->session->userdata('NoEmploye');

    //  Build the query.
    $this->db->select('Id,NameEmp');
    $this->db->from('Employees');
    $this->db->where('NoEmploye', $EmpNumbr);

    // Query Executes.
    $query = $this->db->get();

    // stores Query data in arraay
    $Data = array('Employee' => $query );

    // Retrun Admin DashBoard view. Pass Data to te view
    $this->load->view('Admin\Index.php',$Data);

  }


}

 ?>
