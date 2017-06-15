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

  // public function GetExitEntrances()
  // {
  //   return $this->db->query('SELECT  Employees.NameEmp, Employees.FstName, Employees.NoEmploye, EntraceRegister, Exitregister, TIMEDIFF(EntraceRegister,Exitregister) AS 'Time Needed'
  //   FROM  ShiftEntracesExits INNER JOIN Employees ON (Employees_Id = Id)');
  // }

}


?>
