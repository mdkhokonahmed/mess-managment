<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Houserant extends CI_Controller {

	 public function houserantelist()
	{	$data = array();
		$data['title'] = "Welcome To Houserant";
		$this->load->view('templates/master', $data);
		$data['houserantes'] = $this->Houserant_Model->showallhouserant();
		$this->load->view('templates/home/houserantelist', $data);
		$this->load->view('templates/footer');	
	}

	public function save_house_rant()
	{
        $data = array();
		$data['curdates']  = $this->input->post('curdates', true);
		$data['houserantetk']  = $this->input->post('houserantetk', true);
		$data['bsallary']   = $this->input->post('bsallary', true);
		$data['netbill']    = $this->input->post('netbill', true);
		$data['disbill']    = $this->input->post('disbill', true);
		$data['totalmember']  = $this->input->post('totalmember', true);

		$houserantetk = $data['houserantetk'];
		$bsallary = $data['bsallary'];
		$netbill = $data['netbill'];
		$curdates = $data['curdates'];
		$totalmember = $data['totalmember'];
		if (empty($houserantetk) OR empty($bsallary) OR empty($netbill) OR empty($curdates) OR empty($totalmember)) {
			$mdata['msg'] = "<span style='color:red'>Filed must be empty</span>";
	        $this->session->set_flashdata($mdata);
	        redirect('Houserant/houserantelist');
		}else{
			$this->Houserant_Model->save_house_rant($data);
    	    $mdata['msg'] = "<span style='color:blue'>House Rant Added Successfully</span>";
            $this->session->set_flashdata($mdata);
            redirect('Houserant/houserantelist');
		}
	}


		public function edithouserant($houseid)
		{	
			if (!isset($houseid)) {
				redirect('Houserant/houserantelist');
			}
		    $data = array();
			$this->load->view('templates/master');
			$data['houserantes'] = $this->Houserant_Model->showallhouserant();
			$data['houseids'] = $this->Houserant_Model->EditHouseRant($houseid);
			$this->load->view('templates/home/edithouserant', $data);
			$this->load->view('templates/footer');	
		}

		public function update_house_rant()
		{
	    $data = array();
	    $houseid = $this->input->post('houseid', true);
	    $data['curdates']  = $this->input->post('curdates', true);
		$data['houserantetk']  = $this->input->post('houserantetk', true);
		$data['bsallary']   = $this->input->post('bsallary', true);
		$data['netbill']      = $this->input->post('netbill', true);
		$data['disbill'] = $this->input->post('disbill', true);
		$data['totalmember']    = $this->input->post('totalmember', true);

		$houserantetk = $data['houserantetk'];
		$bsallary = $data['bsallary'];
		$netbill = $data['netbill'];
		$curdates = $data['curdates'];
		$totalmember = $data['totalmember'];
		if (empty($houserantetk) OR empty($bsallary) OR empty($netbill) OR empty($curdates) OR empty($totalmember)) {
			$mdata['msg'] = "<span style='color:red'>Filed must be empty</span>";
	        $this->session->set_flashdata($mdata);
	        redirect('Houserant/houserantelist');
		}else{
			$this->Houserant_Model->Updated_house_rant($houseid, $data);
    	    $mdata['msg'] = "<span style='color:blue'>House Rant Updated Successfully</span>";
            $this->session->set_flashdata($mdata);
            redirect('Houserant/houserantelist');
		}
		}

	public function deleted_houserant($houseid)
	{
	 $this->Houserant_Model->Deleted_house_rant($houseid);
	 redirect('Houserant/houserantelist');
	}

	public function houserantsearch()
	{
		$data['title'] = "Welcome To Houserant";
		$curentdate  = $this->input->post('curentdate', true);
		if (empty($curentdate)) {
			$this->load->view('templates/master', $data);
			$this->load->view('templates/home/404');
		}else{
			$this->load->view('templates/master', $data);
			$data['houserantes'] = $this->Houserant_Model->houserantsear($curentdate);
			$this->load->view('templates/search/houserantsearch',$data);
			$this->load->view('templates/footer');	
		}
	}

}	