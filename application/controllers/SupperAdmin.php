<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupperAdmin extends CI_Controller {

	  public function __construct(){

       parent::__construct();
        $userId = $this->session->userdata('userId');
        if ($userId == NULL) {
        redirect('Admin/login');
        }

	  }
	public function index(){
	$data['title'] = "Welcome To Home";
	$this->load->view('templates/master', $data);	
	$this->load->view('templates/textmess');	
	$this->load->view('templates/footer');	
	}

	public function logout(){
	 $this->session->unset_userdata('userId');
	 $this->session->unset_userdata('username');
	  redirect('Admin/login');
	}

}
