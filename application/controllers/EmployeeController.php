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

  public function EntranceReport()
  {
    // Load class
    $this->load->view("Template\css");

    // Load the navba fro the Admin
    $this->load->view("Admin/navbar");

    // Loads the view whit the info
    $this->load->view("Admin\EntrancesReport");

  }

  public function GetEntrancesReportByDateRange()
  {

    // Get Initial Date val from ajax call
    $StartDate=$this->input->post("INITDATE");

    // Get End Date val from ajax call
    $EndDate=$this->input->post("ENDDATE");

    // Load Model
    $this->load->model("employees");

    $Result = $this->employees->GetEntrancesReportByDateRange($StartDate,$EndDate);

    // Deugger
    // var_dump($Result->result());

    // Display DataBase Info.
    foreach ($Result->result() as $employee) {
      echo "
      <tr class='js_EmpRecords'>
        <td> $employee->NameEmp</td>
        <td> $employee->FstName</td>
        <td> $employee->NoEmploye</td>
        <td> $employee->EntraceRegister</td>
        <td> $employee->Exitregister</td>
        <td> $employee->TimeNeeded</td>
      </tr>
      ";
    }
    // End Foreach

  }
  // End Function

  public function NewEmployee()
  {

    // Load the css files
    $this->load->view("Template\css");

    // Load the Admin navbar
    $this->load->view("Admin/navbar");

    // Load the Register Employe Form
    $this->load->view("Admin\NewEmployee");

  }
  // End function

  public function AddNewEmployee()
  {

    // Get EmpName from ajax call
    $Name=$this->input->post("NAME");

    // Get FirstName
    $FstName=$this->input->post("FSTNAME");

    $EmNmbr=$this->input->post("EMPNUMBR");

    $EmpPass=$this->input->post("EMPASS");

    $EmpRoleId=$this->input->post("EMPROLEID");

    echo $Name. " : ".$FstName." : ".$EmNmbr." : ".$EmpPass." : ". $EmpRoleId;

  }
  // End function

}
// End Class

?>
