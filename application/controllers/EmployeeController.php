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

    // Load the Main View whit the Employees info
    $this->load->view('EntranceExits');

  }

  public function EntrancesExitReport()
  {

    // Build the query
    $Query =$this->db->query("SELECT  Employees.NameEmp, Employees.FstName, Employees.NoEmploye, EntraceRegister, Exitregister, TIMEDIFF(EntraceRegister,Exitregister) AS 'TimeNeeded'
    FROM  ShiftEntracesExits INNER JOIN Employees ON (Employees_Id = Id)");

    // Store info in array
    // $Data = array('Report' => $Query );

    foreach ($Query->result() as $row ) {
      echo "
      <tr>
        <td>".$row->NameEmp."</td>
        <td>".$row->FstName."</td>
        <td>".$row->NoEmploye."</td>
        <td>".$row->EntraceRegister."</td>
        <td>".$row->Exitregister."</td>
        <td>".$row->TimeNeeded."</td>
      </tr>
      ";

    }

  }

  public function RegisterEntrance()
  {

    // Recibe EMPNUM val from ajax call
    $EmpNum=$this->input->post('EMPNUM');

    // Get the current date and time. Need Specify time zome on config file.
    $EntranceDate=date('Y-m-d h:i:s');

    // varibles
    $EmpId="";

    //  Display the info
    // echo $EmpNum." :: ".$EntranceDate;

    // Get Employee id by NumEmploye. Build the query.
    $this->db->select('Id');
    $this->db->from('Employees');
    $this->db->where('NoEmploye', $EmpNum);
    $query = $this->db->get();

    // Display Info
    foreach ($query->result() as $row)
    {

      // Store the result in the Empid variable
      $EmpId=$row->Id;

    }

    { /* Region Register Entrance */

      // Create array whit the info to will be inserted
      $Data = array('Employees_Id' => $EmpId, 'EntraceRegister'=>$EntranceDate, 'Exitregister'=>'');

      // Build the query. TableName/FieldsArray
      $this->db->insert('shiftentracesexits',$Data);   

    } /*  End Region */


  }

}


?>
