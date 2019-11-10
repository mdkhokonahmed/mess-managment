<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Admin_Model extends CI_Model{
 	
  public function admin_login_check($email, $password){
   
   $this->db->select('*');
   $this->db->from('user');
   $this->db->where('email', $email);
   $this->db->where('password', $password);
   $query = $this->db->get();
   $result = $query->row();
   return $result;
  }

 }

?>