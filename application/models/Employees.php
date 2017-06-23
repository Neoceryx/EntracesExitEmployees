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

    // Descision variable
    $IsRepeted="";

    // Constant
    define("YES",1);

    { /* Region Verify new employe is not repeted */

      // Build the query
      $this->db->select("COUNT(*)as Repetitions");
      $this->db->from("employees");
      $this->db->where("NoEmploye",$EmpNum);

      // Prepare Query to be execute
      $Query=$this->db->get();

      // Executes the query
      foreach ($Query->result() as $employe) {

        // Store the number rows affetec by the query
        $IsRepeted=$employe->Repetitions;

      }

    } /* End Region */

    // validate if the Employe is not repeted
    if ($IsRepeted == YES) {

      // Return the Repeats number from an employee
      return $IsRepeted;

    }else {

      { /* Region Add New Employess */

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

      } /* End Region */

    }
    // End Validation

  }
  // End function

}
// End class

?>
