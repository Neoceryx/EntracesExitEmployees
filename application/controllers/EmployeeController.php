<?php

/**
 *
 */
class EmployeeController extends CI_Controller
{

  public function index()
  {

    { /* Region Get info from Employees Model*/

      // Load the Model
      $this->load->model('Employees');

      // Create Employees objet to access GetEmployees method.
      $Result=$this->Employees->GetEmployees();

      // Store the method result on an array
      $Data= array('Employees' => $Result );

    } /* End Region */

    // Load  the css filter_list
    $this->load->view('Template\css');

    // Load the Main View whit the Employees info
    $this->load->view('TestView',$Data);

    // Load the js files
    $this->load->view("Template\js");

  }

  // Recive id value on the url.
  public function test($id='')
  {

  // Display the id val
  echo $id;

  }



}


?>
