<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

     public function __construct(){
        parent::__construct();
		 $this->load->model('Raffle');
		 $this->load->model('Prize');
		 $this->load->model('Entry');
		 $this->load->model('Winner');
		
		
    }

	public function index(){

		$data['raffles'] = $this->Raffle->get_all();
		$this->load->view('raffleList',$data);
		
	}
	
	public function newRaffle($raffle_id=0){
		
		
		if($this->input->method() == 'post'){
				
				
			if($raffle_id){
				
				$this->Raffle->save($raffle_id);
			
				$this->Prize->remove($raffle_id);
				$this->Prize->save($raffle_id);
			
				
			}else{
				
				$raffle_id = $this->Raffle->save();
				
				$this->Prize->save($raffle_id);
			}	
			
			return redirect(base_url('/'));
			
		}
		
		$data['raffle'] = ['raffle_event_name'=>'', 'raffle_mechanics'=>'','raffle_deadline'=> date("d-m-Y H:i:s")];
		$data['prizes'] = [];
		if($raffle_id){
			$data['raffle'] = $this->Raffle->get($raffle_id);
			
			$data['prizes'] = $this->Prize->get($raffle_id);
			
		}
		
		
		$this->load->view('newRaffle',$data);
	}
	
	public function removeRaffle($id){
		
		
		
			$this->Raffle->remove($id);
			$this->Prize->remove($id);
			
			return redirect(base_url('/'));
	}
	
	
	public function entryForm($id){
		
		$data['error'] = false;
		if($this->input->method() == 'post'){
			
			
			if($this->Entry->save($id)){
				
			
			return redirect(base_url('/admin/thanks/'.$id));
			}else{
				
				$data['error'] = 'Phone Number is already registered for this Raffle';
			}
			
		}
		
		
		$this->load->view('entryForm',$data);
	}
	
	public function thanks($id){
		
		$this->load->view('thankyou',['id'=>$id]);
	}
	
	
	public function raffleCreated($id){
		
		
		$data['raffle'] =  $this->Raffle->get($id);
		$data['prizes'] = $this->Prize->get($id);
		$data['id'] = $id;

		
		
			 $winners = $this->Entry->all_winners($id);
			 foreach($winners as $winner){
				 unset($winner['entry_photo']);
				$data['winners'][$winner['prize_id']][] = $winner;
			 }
		
			
		
		
		$this->load->view('raffleCreated', $data);
	}
	
	
	function draw($prize_id){
	
		$out = [];
		$out['html'] = '';
		$prize = $this->Prize->get_by_prize($prize_id);
		if($prize){
	
			$raffle = $this->Raffle->get($prize['raffle_id']);
			if($raffle){
					
			
					$winner = $this->Entry->winner($prize['raffle_id'],$prize_id);
					if($winner){
						
						unset($winner['entry_photo']);
						
						$out['data'] = $winner;
					}else{
						
						$out['error'] = 'Winner  is not valid.';	
					}
					
			}else{
				$out['error'] = 'Event ID is not valid.';	
				
			}
			
			$winners = $this->Entry->all_winners($prize['raffle_id']);
			
			$html = '';
			if($winner){
				foreach($winners as $winner){
					$html .= "<p>{$winner['entry_firstname']} {$winner['entry_lastname']}</p>";
					
				}

			$out['html'] = 	$html;		
			}
			
		}else{
			$out['error'] = 'Prize ID is not valid.';	
		}
		
		echo json_encode($out);
		exit();
		
	}
	
	

}

?>
