<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Mile_Model extends CI_Model{
 	
  public function save_mile($data){
   	$this->db->insert('mile', $data);

  }

  public function totalmile_list()
  {
  	$this->db->select('*');
    $this->db->from('mile');
    $this->db->order_by('mile', 'DESC');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function Edit_Mile($mile)
  {
    $this->db->select('*');
    $this->db->from('mile');
    $this->db->where('mile', $mile);
    $query  = $this->db->get();
    $result = $query->row();
    return $result; 
  }

  public function Updated_mile($mile, $data){
    $this->db->where('mile', $mile);
    $this->db->update('mile', $data);
  }

  public function Deleted_mile($mile)
  {
    $this->db->where('mile', $mile);
    $this->db->delete('mile');
  }
  public function total_single_permile($mile){
    $this->db->select('mile, milefullnmae');
    $this->db->from('mile');
    $this->db->where('mile', $mile);
    $query  = $this->db->get();
    $result = $query->row();
    return $result;	
  }

  // single mile insert

   public function save_single_mile($data){
   	$this->db->insert('single_mile', $data);
   }

   public function singleparmilebyid($mile){
   	$this->db->select('*');
    $this->db->from('single_mile');
    $this->db->where('mile', $mile);
    $this->db->order_by('mile', 'DESC');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;	
   }

   public function total_mile(){
   	$this->db->select('*');
    $this->db->from('single_mile');
    $this->db->order_by('single_mileid', 'DESC');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;	
   }

   public function EditSingleBYID($single_mileid)
   {
    $this->db->select('*');
    $this->db->from('single_mile');
    $this->db->where('single_mileid', $single_mileid);
    $query  = $this->db->get();
    $result = $query->row();
    return $result; 
   }

   public function Updated_single_mile($single_mileid, $data)
   {
    $this->db->where('single_mileid', $single_mileid);
    $this->db->update('single_mile', $data);
   }

   public function Deleted_single_mile($single_mileid)
   {
    $this->db->where('single_mileid', $single_mileid);
    $this->db->delete('single_mile');
   }


   public function totalmilesearch($curentdate, $endcurentdate)
   {
      $this->db->select('*');
      $this->db->from('single_mile');
      $this->db->like('miledate', $curentdate);
      $this->db->or_like('miledate', $endcurentdate);
      $this->db->where('miledate >=', $curentdate);
      $this->db->or_where('miledate <=', $endcurentdate);
      $query  = $this->db->get();
      $result = $query->result();
      return $result;
   }

  public function singlemilemembers($curenstdate, $enddates)
  {
     $this->db->select('*');
      $this->db->from('single_mile');
      $this->db->like('miledate', $curenstdate);
      $this->db->or_like('miledate', $enddates);
      $query  = $this->db->get();
      $result = $query->result();
      return $result;
  }



 }