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

  public function CurrentEntrancesExitReport()
  {

    // Build the query
    $Query =$this->db->query("SELECT  Employees.NameEmp, Employees.FstName, Employees.NoEmploye, EntraceRegister, Exitregister, TIMEDIFF(Exitregister,EntraceRegister) AS 'TimeNeeded'
    FROM  ShiftEntracesExits INNER JOIN Employees ON (Employees_Id = Id)
    WHERE(DATE(ShiftEntracesExits.EntraceRegister) = DATE(now()) )");

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
    $CurrentDate=date('Y-m-d H:i:s');

    // varibles
    $EmpId="";

    // Decision Variable
    $MinRegEntrance=0;

    // Constant
    define("HASENTRANCE",1);

    //  Display the info
    // echo $EmpNum." :: ".$CurrentDate;


    { /* Region Get Employee id by NumEmploye. */

      //  Build the query.
      $this->db->select('Id');
      $this->db->from('Employees');
      $this->db->where('NoEmploye', $EmpNum);

      // Query Executes.
      $query = $this->db->get();

      // Display Info
      foreach ($query->result() as $row)
      {

        // Store the result in the Empid variable
        $EmpId=$row->Id;

      }

    } /* End Region */


    { /* Region Register Entrance */

      // Validate that an Employee not Register two time Entrances
      $HasEntrance=$this->db->query("SELECT COUNT(*) AS Entrances from shiftentracesexits
      WHERE (Employees_Id=$EmpId AND Exitregister IS NULL);");

      // Display Info
      foreach ($HasEntrance->result() as $row) {

        // Store the repeats entrances.
        $MinRegEntrance = $row->Entrances;

      }

      // Validate Entrances registers
      if ($MinRegEntrance >= HASENTRANCE ) {

        // Create array fiels to will be Updated
        $InfoUpdate = array('Exitregister' => $CurrentDate );

        // Build the query
        $this->db->where("Employees_Id",$EmpId);
        $this->db->update("shiftentracesexits", $InfoUpdate);

      }else {

        // Create array whit the info to will be inserted. Send Null value to the end
        $Data = array('Employees_Id' => $EmpId, 'EntraceRegister'=>$CurrentDate, 'Exitregister'=>null);

        // Build the query. TableName/FieldsArray. Insert new Register to ShiftEnrance table
        $this->db->insert('shiftentracesexits',$Data);

      }
      // End Validations


    } /*  End Region */


  }

}


?>
