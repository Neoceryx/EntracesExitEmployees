<?php

/**
 *
 */
class Employees extends CI_Model
{

  public function GetEmployees()
  {

    // Get info from Employees Table
    return $this->db->get('Employees');

  }



  public function LoginEmp($EmplNumber="",$EmpPass="")
  {

    // Build the query
    $Query= $this->db->query("SELECT employees.Id NameEmp, FstName,EmployeesRoles_Id, employeesroles.Description, Pass FROM employees
    inner join employeesroles on (EmployeesRoles_Id = employeesroles.Id)
    where (NoEmploye = '".$EmplNumber."' and Pass='".$EmpPass."')");

    // Validate Employex exist
    if ($Query->num_rows() >=  1 ) {

      // Retuen query varibla as a row
      return $Query->row();

    }else {

      return null;

    }

  }
  // End LoginEmp

}




?>
