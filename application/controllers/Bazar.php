<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bazar extends CI_Controller {

	 public function memberbazarlist()
	{	$data = array();
		$data['title'] = "Welcome To Bazar";
		$this->load->view('templates/master', $data);
		$data['showallbazars'] = $this->Bazar_Model->memberbazarlist();
		$this->load->view('templates/home/memberbazarlist', $data);
		$this->load->view('templates/footer');	
	}

	public function save_member_bazar()
	{
	$data = array();
	$data['fullname']  = $this->input->post('fullname', true);
	$fullname =  $data['fullname'];
	if (empty($fullname)) {
		$mdata['msg'] = "<span style='color:red'>Filed Can't be Empty !</span>";
 	  	$this->session->set_flashdata($mdata);
 	  	redirect("Bazar/memberbazarlist");
	}
	$this->Bazar_Model->save_member_bazar($data);
	$mdata['msg'] = "<span style='color:blue'>Bazar Added Successfully</span>";
    $this->session->set_flashdata($mdata);
    redirect('Bazar/memberbazarlist');
	}

 // edit 

   public function editbazar($membzrid)
   {
   $data['title'] = "Welcome To Bazar";
   $this->load->view('templates/master', $data);
   	$data['showallbazars'] = $this->Bazar_Model->memberbazarlist();
   	$data['memberbyid'] = $this->Bazar_Model->MemberEditById($membzrid);
   	$this->load->view('templates/home/editbazar', $data);
   	$this->load->view('templates/footer');	
   }

   // update update_member_bazar

    public function update_member_bazar()
    {
	    $data = array();
	    $membzrid = $this->input->post('membzrid', true);
		$data['fullname']  = $this->input->post('fullname', true);
		$fullname =  $data['fullname'];
		if (empty($fullname)) {
			$mdata['msg'] = "<span style='color:red'>Filed Can't be Empty !</span>";
	 	  	$this->session->set_flashdata($mdata);
	 	  	redirect("Bazar/memberbazarlist");
		}
		$this->Bazar_Model->update_member_bazar($membzrid, $data);
		$mdata['msg'] = "<span style='color:blue'>Bazar Updated Successfully</span>";
	    $this->session->set_flashdata($mdata);
	    redirect('Bazar/memberbazarlist');
    }

     // deleted memeber

    public function Delete($membzrid)
    {
    	$this->Bazar_Model->deleted_member_bazar($membzrid);
    	redirect('Bazar/memberbazarlist');
    }

	// single bazar 

	public function singlebazarlist($membzrid)
	{	
		if (!isset($membzrid)) {
		redirect("Bazar/memberbazarlist");
	}
		$data['title'] = "Welcome To Bazar";
		$this->load->view('templates/master', $data);
		$data['showallbazarnames'] = $this->Bazar_Model->showallbazarnames($membzrid);
		$data['showallbazarlists'] = $this->Bazar_Model->showallbazarlist($membzrid);
		$this->load->view('templates/home/singlebazarlist', $data);
		$this->load->view('templates/footer');	
	}

	public function insert_single_bazar()
	{
	$data = array();
	$data['membzrid']  = $this->input->post('membzrid', true);
	$data['fullname']  = $this->input->post('fullname', true);
	$data['curdate']  = $this->input->post('curdate', true);
	$data['totaltk']  = $this->input->post('totaltk', true);
	$data['totalmill']  = $this->input->post('totalmill', true);
	$curdate =  $data['curdate'];
	$totaltk =  $data['totaltk'];
	$totalmill =  $data['totalmill'];
	if (empty($curdate) OR empty($totaltk) OR empty($totalmill)) {
		$mdata['msg'] = "<span style='color:red'>Filed Can't be Empty !</span>";
 	  	$this->session->set_flashdata($mdata);
 	  	redirect("Bazar/memberbazarlist");
	}else{

	$this->Bazar_Model->insert_single_bazar($data);
	$mdata['msg'] = "<span style='color:blue'>Single Bazar Added Successfully</span>";
    $this->session->set_flashdata($mdata);
    redirect('Bazar/memberbazarlist');
}
	}

   // singlememberedit

	public function singlememberedit($singid,$membzrid=NULL)
	{
	 if (!isset($singid)) {
		redirect("Bazar/singlebazarlist");
	}
		$data['title'] = "Welcome To Bazar";
		$this->load->view('templates/master', $data);
		$data['showallbazarnames'] = $this->Bazar_Model->showallbazarnames($membzrid);
		$data['showallbazarlists'] = $this->Bazar_Model->showallbazarlist($membzrid);
		$data['singbyId'] = $this->Bazar_Model->singlememberedit($singid);
		$this->load->view('templates/home/singlememberedit', $data);
		$this->load->view('templates/footer');	
	}

	// updated_single_bazar

	public function updated_single_bazar()
	{
	 $data = array();
	$singid = $this->input->post('singid', true);
	$data['membzrid']  = $this->input->post('membzrid', true);
	$data['fullname']  = $this->input->post('fullname', true);
	$data['curdate']  = $this->input->post('curdate', true);
	$data['totaltk']  = $this->input->post('totaltk', true);
	$data['totalmill']  = $this->input->post('totalmill', true);
	$curdate =  $data['curdate'];
	$totaltk =  $data['totaltk'];
	$totalmill =  $data['totalmill'];
	if (empty($curdate) OR empty($totaltk) OR empty($totalmill)) {
		$mdata['msg'] = "<span style='color:red'>Filed Can't be Empty !</span>";
 	  	$this->session->set_flashdata($mdata);
 	  	redirect("Bazar/memberbazarlist");
	}else{

	$this->Bazar_Model->updated_single_bazar($singid, $data);
	$mdata['msg'] = "<span style='color:blue'>Single Bazar Updated Successfully</span>";
    $this->session->set_flashdata($mdata);
    redirect('Bazar/memberbazarlist');
	}
	}

	public function Deleted($singid)
	{
		$this->Bazar_Model->Deleted_single_bazar($singid);
		redirect('Bazar/memberbazarlist');
	}

		// all bazar list
	public function allbazarlist(){
		$data = array();
		$data['title'] = "Welcome To Bazar";
		$this->load->view('templates/master', $data);
		$data['showallbazarslist'] = $this->Bazar_Model->showallbazarslist();
		$this->load->view('templates/home/allbazarlist', $data);
		$this->load->view('templates/footer');	
	}


	public function allbazarsearch()
	{	$data['title'] = "Welcome To Bazar";
		$startdate  = $this->input->post('startdate', true);
		$enddate  = $this->input->post('enddate', true);
		if (empty($startdate) OR empty($enddate)) {
			$this->load->view('templates/master', $data);
			$this->load->view('templates/home/404');
			$this->load->view('templates/footer');	

		}else{

		$this->load->view('templates/master', $data);
		$data['search'] = $this->Bazar_Model->allbazarsearch($startdate, $enddate);
		$this->load->view('templates/home/allbazarsearch',$data);
		$this->load->view('templates/footer');	
		}

	}


	public function singelbazarsearch()
	{
		$data['title'] = "Welcome To Bazar";
		$curentdate  = $this->input->post('curentdate', true);
		$membername  = $this->input->post('membername', true);
		if (empty($curentdate)) {
			$this->load->view('templates/master', $data);
			$this->load->view('templates/home/404');
		}else{
			$this->load->view('templates/master', $data);
			$data['search'] = $this->Bazar_Model->singelbazarsearch($curentdate, $membername);
			$this->load->view('templates/search/singelbazarsearch',$data);
		}

	}


	

}