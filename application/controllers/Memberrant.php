<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memberrant extends CI_Controller {

	 public function memberrantlist()
	{	$data = array();
		$data['title'] = "Welcome To Member Rant";
		$this->load->view('templates/master', $data);
		$data['memberrantlist'] = $this->Memberrant_Model->showallmemberrant();
		$this->load->view('templates/home/memberrantlist', $data);
		$this->load->view('templates/footer');	
	}

	public function save_memberrant()
	{
		$data = array();
		$data['curmbrdate']  = $this->input->post('curmbrdate', true);
		$data['fullname']  = $this->input->post('fullname', true);
		$data['memberhouserant'] = $this->input->post('memberhouserant', true);
		$data['memberbazartk']   = $this->input->post('memberbazartk', true);
		$data['membermile']  = $this->input->post('membermile', true);
		$data['milerate']    = $this->input->post('milerate', true);

			$curmbrdate = $data['curmbrdate'];
			$fullname = $data['fullname'];
			$memberhouserant = $data['memberhouserant'];
			$memberbazartk = $data['memberbazartk'];
			$membermile = $data['membermile'];
			$milerate = $data['milerate'];
		if (empty($curmbrdate) OR empty($fullname) OR empty($memberhouserant) OR empty($memberbazartk) OR empty($membermile) OR empty($milerate)) {
			$mdata['msg'] = "<span style='color:red'>Filed must be empty</span>";
	        $this->session->set_flashdata($mdata);
	        redirect('Memberrant/memberrantlist');
		}else{
			$this->Memberrant_Model->save_memberrant($data);
    	    $mdata['msg'] = "<span style='color:blue'>Member Rant Added Successfully</span>";
            $this->session->set_flashdata($mdata);
            redirect('Memberrant/memberrantlist');
		}
	}

	public function editmemberrant($memrantid)
	{	
		 if (!isset($memrantid)) {
		 	 redirect('Memberrant/memberrantlist');
		 }
	    $data = array();
	    $data['title'] = "Welcome To Member Rant Update";
		$this->load->view('templates/master', $data);
		$data['memberrantlist'] = $this->Memberrant_Model->showallmemberrant();
		$data['editbyIds'] = $this->Memberrant_Model->editmemberrant($memrantid);
		$this->load->view('templates/home/editmemberrant', $data);	
		$this->load->view('templates/footer');	
	}

	public function updated_memberrant()
	{
		$data = array();
		$memrantid = $this->input->post('memrantid', true);
		$data['curmbrdate']  = $this->input->post('curmbrdate', true);
		$data['fullname']  = $this->input->post('fullname', true);
		$data['memberhouserant']   = $this->input->post('memberhouserant', true);
		$data['memberbazartk']      = $this->input->post('memberbazartk', true);
		$data['membermile'] = $this->input->post('membermile', true);
		$data['milerate']    = $this->input->post('milerate', true);

			$curmbrdate = $data['curmbrdate'];
			$fullname = $data['fullname'];
			$memberhouserant = $data['memberhouserant'];
			$memberbazartk = $data['memberbazartk'];
			$membermile = $data['membermile'];
			$milerate = $data['milerate'];
		if (empty($curmbrdate) OR empty($fullname) OR empty($memberhouserant) OR empty($memberbazartk) OR empty($membermile) OR empty($milerate)) {
			$mdata['msg'] = "<span style='color:red'>Filed must be empty</span>";
	        $this->session->set_flashdata($mdata);
	        redirect('Memberrant/memberrantlist');
		}else{
			$this->Memberrant_Model->updated_memberrant($memrantid, $data);
    	    $mdata['msg'] = "<span style='color:blue'>Member Rant Updated Successfully</span>";
            $this->session->set_flashdata($mdata);
            redirect('Memberrant/memberrantlist');
		}
	}

	public function Deletedmember($memrantid)
	{
		$this->Memberrant_Model->Deleted_memberrant($memrantid);	
		redirect('Memberrant/memberrantlist');
	}

	public function memberrantsearch()
	{
		$data['title'] = "Welcome To Member Rant Search";
		$curentdate = $this->input->post("curentdate", true);
		$memberrantser = $this->input->post("memberrantser", true);

		if (empty($curentdate)) {
			$this->load->view('templates/master', $data);
			$this->load->view('templates/home/404');
			$this->load->view('templates/footer');	
		}else{
			 $this->load->view('templates/master', $data);
			$data['memberrantlist'] = $this->Memberrant_Model->memberrantsearch($curentdate, $memberrantser);
			$this->load->view('templates/search/memberrantsearch', $data);
			$this->load->view('templates/footer');	
		}
	}

}