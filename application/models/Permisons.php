<?php

/**
 *
 */
class Permisons extends CI_Model
{

  public function GetPermisonsTypesList($value='')
  {

    // Build the query
    return $this->db->get('permisontypes');

  }
  // End function

}
// End class


 ?>
