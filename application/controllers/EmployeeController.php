<?php

/**
 *
 */
class EmployeeController extends CI_Controller
{

  public function index()
  {

    // Load  the css filter_list
    $this->load->view('Template\css');

    // Load the Main View
    $this->load->view('TestView');

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
