<?php

/**
 *
 */
class PermisonsController extends CI_Controller
{

  public function Index()
  {

    // Load css files
    $this->load->view("Template\css");

    // return the view
    $this->load->view("Employees/EmployeesPermisons");

  }


}
// End Controller Class
 ?>
