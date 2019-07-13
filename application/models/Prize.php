<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prize extends CI_Model {


  
  
  function save($raffle_id){
			
			$prizes = $this->input->post('prize');
			
			foreach($prizes as $prize){
				if(!$prize['name'])
					continue;
				
				$data['raffle_id'] = $raffle_id;
				$data['prize_name'] = $prize['name'];
				$data['prize_quantitiy'] = $prize['quantity'];
				
				$this->db->insert('prizes', $data);
			}			
  }
  
   function remove($id){
	  
		$this->db->delete('prizes', array('raffle_id' => $id)); 
		

  }
 
function get($id){
 
    $response = array();
	$this->db->select('*');
    $q = $this->db->where(['raffle_id'=>$id])->get('prizes');;
    $response = $q->result_array();
	
    return $response;
  }	
  
  
  function get_by_prize($prize_id){
 
    $response = array();
	$this->db->select('*');
    $q = $this->db->where(['prize_id'=>$prize_id])->get('prizes');;
    $response = $q->result_array();
	
	if(!empty($response ))
		
    return $response[0];
  }
  

}