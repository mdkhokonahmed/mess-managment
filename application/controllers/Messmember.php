<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messmember extends CI_Controller {

	public function memberlist()
	{	
		$data['title'] = "Welcome To Member";
		$this->load->view('templates/master',$data);
	    $data['showmembers'] = $this->Member_Model->showmemberlist();
		$this->load->view('templates/home/memberlist', $data);
		$this->load->view('templates/footer');	
	}

	public function save_member(){
		$data = array();
		$data['firstName']  = $this->input->post('firstName', true);
		$data['lastName']   = $this->input->post('lastName', true);
		$data['email']      = $this->input->post('email', true);
		$data['cellNumber'] = $this->input->post('cellNumber', true);
		$data['address']    = $this->input->post('address', true);

			
	   $this->form_validation->set_rules('firstName', 'First Name', 'required|min_length[5]|max_length[12]');

	   $this->form_validation->set_rules('lastName', 'Last Name', 'required|min_length[5]|max_length[12]');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

	$this->form_validation->set_rules('cellNumber', 'Cell Number', 'required|min_length[11]|max_length[14]');

	$this->form_validation->set_rules('address', 'Address', 'required');

	   if ($this->form_validation->run() == FALSE) {

         $data['title'] = "Welcome To Member";
		 $this->load->view('templates/master',$data);
	     $data['showmembers'] = $this->Member_Model->showmemberlist();
		 $this->load->view('templates/home/memberlist', $data);  
		}else{
			$this->Member_Model->member_check($data);
    	    $mdata['msg'] = "<span style='color:blue'>Member Added Successfully</span>";
            $this->session->set_flashdata($mdata);
            redirect('Messmember/memberlist');
		}
	}

	public function editmember($memberid)
	{	if (!isset($memberid)) {
		 redirect('Messmember/memberlist');
	}else{
		$data['title'] = "Welcome To Member Update";
		$this->load->view('templates/master', $data);
		$data['editbyids'] = $this->Member_Model->Showmemberedit($memberid);
		$data['showmembers'] = $this->Member_Model->showmemberlist();
	    $this->load->view('templates/home/editmember', $data);
	    $this->load->view('templates/footer');	
	}

	}

	public function updated_member()
	{
		$data = array();
		$memberid = $this->input->post('memberid', true);
		$data['firstName']  = $this->input->post('firstName', true);
		$data['lastName']   = $this->input->post('lastName', true);
		$data['email']      = $this->input->post('email', true);
		$data['cellNumber'] = $this->input->post('cellNumber', true);
		$data['address']    = $this->input->post('address', true);

		$firstName = $data['firstName'];
		$lastName = $data['lastName'];
		$email = $data['email'];
		$cellNumber = $data['cellNumber'];
		$address = $data['address'];
		if (empty($firstName) OR empty($lastName) OR empty($email) OR empty($cellNumber) OR empty($address)) {
			$mdata['msg'] = "<span style='color:red'>Filed must be empty</span>";
	        $this->session->set_flashdata($mdata);
	        redirect('Messmember/memberlist');
		}else{
			$this->Member_Model->member_update_check($memberid, $data);
    	    $mdata['msg'] = "<span style='color:blue'>Member Updated Successfully</span>";
            $this->session->set_flashdata($mdata);
            redirect('Messmember/memberlist');
		}
	}

	public function deleted($memberid)
	{
		if (!isset($memberid)) {
		 redirect('Messmember/memberlist');
		}

		$this->Member_Model->MessMember_deleted($memberid);
		redirect('Messmember/memberlist');

	}

	
}
