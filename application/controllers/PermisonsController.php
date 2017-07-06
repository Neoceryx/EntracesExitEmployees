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

    // Build the query
    $query = $this->db->get('permisontypes');

    // Store query result into assosiative array
    $Data = array('PermisonsTypes' => $query);

    // return the view. whit the database info
    $this->load->view("Employees/EmployeesPermisons", $Data);

  }


}
// End Controller Class
 ?>
