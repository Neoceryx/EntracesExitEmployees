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
    $Query= $this->db->query("SELECT employees.Id EmployeesRoles_Id, employeesroles.Description, Pass FROM employees
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

  public function GetEntrancesReportByDateRange($StartDate,$EndDate)
  {

    // Build the query
    $Query = $this->db->query("SELECT employees.Id, employees.NameEmp,employees.FstName, employees.NoEmploye ,EntraceRegister,Exitregister
      , TIMEDIFF(Exitregister,EntraceRegister) as 'TimeNeeded'
      FROM shiftentracesexits
      INNER JOIN employees ON (Employees_id = employees.Id)
      WHERE (DATE(EntraceRegister) BETWEEN '".$StartDate."' AND '".$EndDate."' );");

    // Execute the query
    return $Query;

  }

  public function SaveEmploye($Name, $FName, $EmpNum, $Pass, $EmpRoleId)
  {
    // Assossiative Array
    $Data = array(
      'NameEmp' => $Name,
      'FstName' => $FName,
      'NoEmploye' => $EmpNum,
      'Pass' => $Pass,
      'EmployeesRoles_Id' => $EmpRoleId,
     );

    // Build Query.
    $this->db->insert( "employees", $Data);


  }

}
// End class

?>
