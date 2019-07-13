<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entry extends CI_Model {


  function save($raffle_id){
	  
			 $photo = file_get_contents($_FILES['image']['tmp_name']);
        
		$this->db->select('*');

		$q = $this->db->where(['raffle_event_id'=>$raffle_id, 'entry_phone_no'=> $this->input->post('phone_no')])->get('raffle_entries');;
		$response = $q->result_array();
		
		if(empty($response)){
			
			$data['raffle_event_id'] = $raffle_id;
			$data['entry_phone_no'] = $this->input->post('phone_no');
			$data['entry_email'] = $this->input->post('email');
			$data['entry_firstname'] = $this->input->post('first_name');
			$data['entry_lastname'] = $this->input->post('last_name');
			$data['entry_photo'] = $photo;
		
			$this->db->insert('raffle_entries', $data);

			  return $this->db->insert_id();
		}
		return false;
		
  }
  
  function remove($id){
	  
		$this->db->delete('raffle_entries', array('raffle_event_id' => $id)); 
		

  }
  
  function winner($raffle_id,$prize_id){
	  
		$response = array();
		$this->db->select('*');

		$this->db->order_by('rand()');
		$this->db->limit(1);

		$q = $this->db->where(['raffle_event_id'=>$raffle_id, 'prize_id'=>0])->get('raffle_entries');;
		$response = $q->result_array();
		
	
	if(!empty($response )){
		
		$this->db->update('raffle_entries',['prize_id'=>$prize_id],['entry'=>$response[0]['entry']]);
		
    return $response[0];
	}
		

  }
  
  function all_winners($raffle_id){
	  
		$response = array();
		$this->db->select('*');

		
		$q = $this->db->where(['raffle_event_id'=>$raffle_id, 'prize_id>'=>0])->get('raffle_entries');;
		$response = $q->result_array();
		
	
		
    return $response;
	
		

  }
  

}


