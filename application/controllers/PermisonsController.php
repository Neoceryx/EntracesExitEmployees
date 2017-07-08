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

  public function RegiterPermison()
  {

    // Get Permison Id from ajax call
    $PerId=$this->input->post("PERMID");

    // Get Employee number from ajax call
    $EmpNumber=$this->input->post("EMNUMBER");

    // Get Description from ajax call
    $Desc=$this->input->post("DESC");

    // Variables
    $EmpId=0;

    // echo $PerId. " :: ". $EmpNumber." :: ".$Desc;

    { /* Region Get EmployeId by EmpNumber */

      // Build the query
      $this->db->select('Id');
      $this->db->from('employees');
      $this->db->where('NoEmploye', $EmpNumber);

      // prepre query to be executed
      $Query=$this->db->get();

      // Get DataBase info
      foreach ($Query->result() as $employee) {
         $EmpId=$employee->Id;
      }

    } /* End Region */

    { /* Region Add Employee Permison */

      // Get the current date
      $CurrentDate = date('Y-m-d H:i:s');

      // validate permison type
      if ($PerId != 5 ) {

        // Clear Description for the rest permison types
        $Desc="";
      }

      // Assosiative array
      $Data = array(
        'Employees_Id' => $EmpId,
        'PermisonTypes_Id' => $PerId,
        'Description' => $Desc,
        'StartDate' => $CurrentDate,
        'EndDate' => '',
      );

      // Build the query
      $this->db->insert('permisons',$Data);

    } /* End Region */

  }
  // End funtion


}
// End Controller Class
 ?>
