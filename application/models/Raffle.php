<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Raffle extends CI_Model {

  function get_all(){
 
    $response = array();
	$this->db->select('*');
    $q = $this->db->get('raffles');
    $response = $q->result_array();

    return $response;
  }
  
  function get($id){
 
    $response = array();
	$this->db->select('*');
    $q = $this->db->where(['raffle_event_id'=>$id])->get('raffles');;
    $response = $q->result_array();
	
	if(!empty($response ))
		
    return $response[0];
  }
  
  
  function save($id=false){
	  
	  echo $this->input->post('deadline');
	  echo "<br>";
	  
	  
			$data['raffle_event_name'] = $this->input->post('event_name');
			$data['raffle_mechanics'] = $this->input->post('mechanics');
			$data['raffle_deadline'] = date("Y-m-d H:i:s", strtotime($this->input->post('deadline')));
			
			
			if($id){
				$this->db->update('raffles', $data,['raffle_event_id'=>$id]);
				
			}else{
				
			$this->db->insert('raffles', $data);

			  return $this->db->insert_id();
				
			}
  }
  
  function remove($id){
	  $this->db->delete('raffles', array('raffle_event_id' => $id)); 
		
  }
  

}