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

  public function AdminInfo($EmpNumbr='')
  {

    //  Build the query.
    $this->db->select('Id,NameEmp,EmployeesRoles_Id');
    $this->db->from('Employees');
    $this->db->where('NoEmploye', $EmpNumbr);

    // Query Executes
    return $this->db->get();

  }

  public function GetEntrancesReport()
  {

    // Build the query
    $Query = $this->db->query("SELECT  Employees.NameEmp, Employees.FstName, Employees.NoEmploye, EntraceRegister, Exitregister, TIMEDIFF(Exitregister,EntraceRegister) AS 'TimeNeeded'
    FROM  ShiftEntracesExits INNER JOIN Employees ON (Employees_Id = Id)");

    // Execute the query
    return $Query;

  }

}

?>
