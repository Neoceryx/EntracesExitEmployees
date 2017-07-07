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

    // Load the model
    $this->load->model('Permisons');

    // Acces to model method
    $Result=$this->Permisons->GetPermisonsTypesList();

    // Store query result into assosiative array
    $Data = array('PermisonsTypes' => $Result);

    // return the view. whit the database info
    $this->load->view("Employees/EmployeesPermisons", $Data);

  }


}
// End Controller Class
 ?>
