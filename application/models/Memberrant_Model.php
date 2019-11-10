<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Memberrant_Model extends CI_Model{
 	
  public function save_memberrant($data)
  {
   $this->db->insert('member_rant', $data);
  }

  public function showallmemberrant()
  {
    $this->db->select('*');
    $this->db->from('member_rant');
    $this->db->order_by('memrantid', 'DESC');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function editmemberrant($memrantid)
  {
    $this->db->select('*');
    $this->db->from('member_rant');
    $this->db->where('memrantid', $memrantid);
    $query  = $this->db->get();
    $result = $query->row();
    return $result;
  }

  public function updated_memberrant($memrantid, $data)
  {
    $this->db->where('memrantid', $memrantid);
    $this->db->update('member_rant', $data);
  }

  public function Deleted_memberrant($memrantid)
  {
     $this->db->where('memrantid', $memrantid);
    $this->db->delete('member_rant');
  }

  public function memberrantsearch($curentdate, $memberrantser)
  {
    $this->db->select('*');
    $this->db->from('member_rant');
    $this->db->like('curmbrdate', $curentdate);
    $this->db->or_like('fullname', $memberrantser);
    $this->db->order_by('memrantid', 'DESC');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
  }

}