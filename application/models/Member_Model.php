<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Member_Model extends CI_Model{
 	
  public function member_check($data){
   	$this->db->insert('member', $data);

  }
  public function showmemberlist(){
   $this->db->select('*');
   $this->db->from('member');
   $query = $this->db->get();
   $result = $query->result();
   return $result;
	
  }

  public function Showmemberedit($memberid){
  	$this->db->select('*');
  	$this->db->from('member');
  	$this->db->where('memberid', $memberid);
  	$query  = $this->db->get();
	  $result = $query->row();
	   return $result;
  }

  public function member_update_check($memberid, $data){
  	$this->db->where('memberid', $memberid);
    $this->db->update('member', $data);
  }

  public function MessMember_deleted($memberid)
  {
     $this->db->where('memberid', $memberid);
     $this->db->delete('member');
  }
 }

?>