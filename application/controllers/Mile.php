<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mile extends CI_Controller {

	 public function milelist()
	{	$data = array();
		$data['title'] = "Welcome To Mile List";
		$this->load->view('templates/master', $data);
		$data['totalmile'] = $this->Mile_Model->totalmile_list();
		$this->load->view('templates/home/milelist', $data);
		$this->load->view('templates/footer');	
	}

	public function save_mile()
	{
	 $data = array();
	$data['milefullnmae']  = $this->input->post('milefullnmae', true);
	$milefullnmae =  $data['milefullnmae'];
	if (empty($milefullnmae)) {
		$mdata['msg'] = "<span style='color:red'>Filed Can't be Empty !</span>";
 	  	$this->session->set_flashdata($mdata);
 	  	redirect("Mile/milelist");
	}
	$this->Mile_Model->save_mile($data);
	$mdata['msg'] = "<span style='color:blue'>Mile Added Successfully</span>";
    $this->session->set_flashdata($mdata);
    redirect('Mile/milelist');
	}


	// edit

	 public function EditMile($mile)
	 {
	 	 if (!isset($mile)) {
	 	 	redirect('Mile/milelist');
	 	 }
	 	$data = array();
	 	$data['title'] = "Welcome To Mile List Update";
		$this->load->view('templates/master', $data);
		$data['totalmile'] = $this->Mile_Model->totalmile_list();
		$data['editbyid'] = $this->Mile_Model->Edit_Mile($mile);
		$this->load->view('templates/home/editmile', $data);
		$this->load->view('templates/footer');	
	 }

	 public function Update_mile()
	 {
	 	$data = array();
		 $mile = $this->input->post('mile', true);
		$data['milefullnmae']  = $this->input->post('milefullnmae', true);
		$milefullnmae =  $data['milefullnmae'];
		if (empty($milefullnmae)) {
			$mdata['msg'] = "<span style='color:red'>Filed Can't be Empty !</span>";
			$this->session->set_flashdata($mdata);
		    redirect("Mile/milelist");
		}
	$this->Mile_Model->Updated_mile($mile, $data);
	$mdata['msg'] = "<span style='color:blue'>Mile Updated Successfully</span>";
    $this->session->set_flashdata($mdata);
    redirect('Mile/milelist');
	 }

	public function Deleted($mile)
	{
	 $this->Mile_Model->Deleted_mile($mile);
	 redirect('Mile/milelist');	
	} 

	// single mile

	public function singlemilelist($mile){
		if (!isset($mile)) {
			redirect("Mile/milelist");
		}
		$data = array();
		$data['title'] = "Welcome To Single Mile List";
		$this->load->view('templates/master', $data);
		$data['totalparmile'] = $this->Mile_Model->total_single_permile($mile);
		$data['singleparmilebyid'] = $this->Mile_Model->singleparmilebyid($mile);
		$this->load->view('templates/home/singlemilelist', $data);
		$this->load->view('templates/footer');	
	}

	public function save_single_mile(){
	$data = array();
	$data['mile']  = $this->input->post('mile', true);
	$data['milefullnmae']  = $this->input->post('milefullnmae', true);
	$data['miledate']  = $this->input->post('miledate', true);
	$data['parmile']  = $this->input->post('parmile', true);

	$miledate =  $data['miledate'];	
	$parmile =  $data['parmile'];	
	if (empty($miledate) OR empty($parmile)) {
		$mdata['msg'] = "<span style='color:red'>Filed Can't be Empty !</span>";
 	  	$this->session->set_flashdata($mdata);
 	  	redirect("Mile/milelist");	
		}else{
			$this->Mile_Model->save_single_mile($data);
			$mdata['msg'] = "<span style='color:blue'>Single Mile Added Successfully</span>";
		    $this->session->set_flashdata($mdata);
		    redirect('Mile/milelist');
		}	
	}

	//

	 // EditSingle

	 public function EditSingle($single_mileid, $mile=NULL)
	 {
	 	if (!isset($single_mileid)) {
			redirect("Mile/milelist");
		}

		$data = array();
		$data['title'] = "Welcome To Single Mile List Update";
		$this->load->view('templates/master', $data);
		$data['totalparmile'] = $this->Mile_Model->total_single_permile($mile);
		$data['singleparmilebyid'] = $this->Mile_Model->singleparmilebyid($mile);
		$data['editbyids'] = $this->Mile_Model->EditSingleBYID($single_mileid);
		$this->load->view('templates/home/editsinglemile', $data);
		$this->load->view('templates/footer');	

	 }


	 public function updated_single()
	 {
	 	$data = array();
	$single_mileid = $this->input->post('single_mileid', true);
	$data['mile']  = $this->input->post('mile', true);
	$data['milefullnmae']  = $this->input->post('milefullnmae', true);
	$data['miledate']  = $this->input->post('miledate', true);
	$data['parmile']  = $this->input->post('parmile', true);

	$miledate =  $data['miledate'];	
	$parmile =  $data['parmile'];	
	if (empty($miledate) OR empty($parmile)) {
		$mdata['msg'] = "<span style='color:red'>Filed Can't be Empty !</span>";
 	  	$this->session->set_flashdata($mdata);
 	  	redirect("Mile/milelist");	
		}else{
			$this->Mile_Model->Updated_single_mile($single_mileid, $data);
			$mdata['msg'] = "<span style='color:blue'>Single Mile Updated Successfully</span>";
		    $this->session->set_flashdata($mdata);
		    redirect('Mile/milelist');
		}
	 }

	 public function deleted_single($single_mileid)
	 {
	 	$this->Mile_Model->Deleted_single_mile($single_mileid);
	 	redirect('Mile/milelist');
	 }

	// total mile

	public function totalmile(){
		$data = array();
		$data['title'] = "Welcome To Total Mile List";
		$this->load->view('templates/master', $data);
		$data['totalmiles'] = $this->Mile_Model->total_mile();
		$this->load->view('templates/home/totalmile', $data);
		$this->load->view('templates/footer');	
	}


	public function totalmilesearch()
	{
		$data['title'] = "Welcome To Totalmile Search";
		$curentdate    = $this->input->post("curentdate", true);
		$endcurentdate = $this->input->post("endcurentdate", true);

		if (empty($curentdate) OR empty($endcurentdate)) {
			$this->load->view('templates/master', $data);
			$this->load->view('templates/home/404');
			$this->load->view('templates/footer');	
		}else{
			$this->load->view('templates/master', $data);
			$data['totalmiles'] = $this->Mile_Model->totalmilesearch($curentdate, $endcurentdate);
			$this->load->view('templates/search/totalmilesearch',$data);
			$this->load->view('templates/footer');	
		}
	}


	public function singlemilemember()
	{
		$data['title'] = "Welcome To Totalmile Search";
		$curenstdate  = $this->input->post("curenstdate", true);
		$enddates  = $this->input->post("enddates", true);
		if (empty($curenstdate) OR empty($enddates)) {
			$this->load->view('templates/master', $data);
			$this->load->view('templates/home/404');
			$this->load->view('templates/footer');	
		}else{
			$this->load->view('templates/master', $data);
			$data['singleparmilebyid'] = $this->Mile_Model->singlemilemembers($curenstdate, $enddates);
			$this->load->view('templates/search/singlemilemembers',$data);
			$this->load->view('templates/footer');	
		}
	}
}
