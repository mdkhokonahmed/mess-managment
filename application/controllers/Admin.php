<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	  
  public function __construct(){
       parent::__construct();
        $userId = $this->session->userdata('userId');
        if ($userId != NULL) {
        redirect('SupperAdmin');
        }

	  }

	public function login()
	{
		$this->load->view('templates/login');
	}

    public function dashboard()
	{
	    $data  = array();
      $mdata = array();
      $data['email'] = $this->input->post('email', true);
      $data['password'] = md5($this->input->post('password', true));
      $email = $data['email'];
      $password      = $data['password'];
      $result = $this->Admin_Model->admin_login_check($email, $password);
      if (empty($email) OR empty($password)) {
      	 $mdata['msg'] = "<span style='color:red;font-size:20px;'>Email & Password Can't be Empty!</span>";
         $this->session->set_userdata($mdata);
         redirect('Admin/login');
      } else {
      	 if ($result) {
      	   $mdata['userId'] = $result->userId;
 	 	      $mdata['username'] = $result->username;
      //$mdata['userType'] = $result->userType;
 	 	    $this->session->set_userdata($mdata);
 	 	    redirect('SupperAdmin');	
      	 } else {
      	 	$mdata['msg'] = "<span style='color:red;font-size:20px;'>Incorrect Password or Email Address</span>";
           $this->session->set_userdata($mdata);
           redirect('Admin/login');	
      	 }
      	 
      }
      
	}

}
