<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Houserant_Model extends CI_Model{
 	
  public function save_house_rant($data)
  {
   $this->db->insert('house_rant', $data);
  }

  public function showallhouserant()
  {
    $this->db->select('*');
    $this->db->from('house_rant');
    $this->db->order_by('houseid', 'DESC');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function EditHouseRant($houseid){
    $this->db->select('*');
    $this->db->from('house_rant');
    $this->db->where('houseid', $houseid);
    $query  = $this->db->get();
    $result = $query->row();
    return $result;
  }

  public function Updated_house_rant($houseid, $data)
  {
      $this->db->where('houseid', $houseid);
      $this->db->update('house_rant', $data);
  }

   // Deleted_house_rant

    public function Deleted_house_rant($houseid)
    {
      $this->db->where('houseid', $houseid);
      $this->db->delete('house_rant'); 
    }

    public function houserantsear($curentdate)
    {
    $this->db->select('*');
    $this->db->from('house_rant');
    $this->db->like('curdates', $curentdate);
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
    }

}