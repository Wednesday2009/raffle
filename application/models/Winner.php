<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Winner extends CI_Model {


  function save($entry_id){

	$data['entry_id'] = $entry_id;

	$this->db->insert('winners', $data);

	return $this->db->insert_id();
  }
  
  

}


