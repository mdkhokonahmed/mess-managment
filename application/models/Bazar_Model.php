<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Bazar_Model extends CI_Model{
 	
  public function save_member_bazar($data)
  {
   $this->db->insert('member_bazar', $data);
  }

  public function memberbazarlist()
  {
    $this->db->select('*');
    $this->db->from('member_bazar');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function showallbazarnames($membzrid)
  {
    $this->db->select('membzrid,fullname');
    $this->db->from('member_bazar');
    $this->db->where('membzrid', $membzrid);
    $query  = $this->db->get();
    $result = $query->row();
    return $result;
  }

  // edit member

   public function MemberEditById($membzrid)
   {
    $this->db->select('*');
    $this->db->from('single_bazar');
    $this->db->where('membzrid', $membzrid);
    $query  = $this->db->get();
    $result = $query->row();
    return $result;
   }

   // updated bazar

   public function update_member_bazar($membzrid, $data){
    $this->db->where('membzrid', $membzrid);
    $this->db->update('member_bazar', $data);
   }

   // deleted_member_bazar($membzrid)

    public function deleted_member_bazar($membzrid)
    {
      $this->db->where('membzrid', $membzrid);
      $this->db->delete('member_bazar'); 
    }
  //single bazar
  public function insert_single_bazar($data)
  {
    $this->db->insert('single_bazar', $data);
  }

    // single bazar list 
  public function showallbazarlist($membzrid){
    $this->db->select('*');
    $this->db->from('single_bazar');
    $this->db->where('membzrid', $membzrid);
    $this->db->order_by('singid', 'DESC');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
  }

   // singlememberedit

    public function singlememberedit($singid)
    {
    $this->db->select('*');
    $this->db->from('single_bazar');
    $this->db->where('singid', $singid);
    $query  = $this->db->get();
    $result = $query->row();
    return $result; 
    }

    //updated_single_bazar

    public function updated_single_bazar($singid, $data){
      $this->db->where('singid', $singid);
      $this->db->update('single_bazar', $data);
    }

    public function Deleted_single_bazar($singid)
    {
      $this->db->where('singid', $singid);
      $this->db->delete('single_bazar'); 
    }
    // all bazar list
  public function showallbazarslist(){
    $this->db->select('*');
    $this->db->from('single_bazar');
    $this->db->order_by('singid', 'DESC');
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function allbazarsearch($startdate, $enddate){
   // $startdate = (int) date('n', strtotime('-1 months'));
   // $enddate = (int) date('Y', strtotime('-1 months')); 
    $this->db->select('*');
    $this->db->from('single_bazar');
    $this->db->like('curdate', $startdate);
    $this->db->or_like('curdate', $enddate);
    $this->db->where('curdate >=', $startdate);
    $this->db->or_where('curdate <=', $enddate);
    $query  = $this->db->get();
    $result = $query->result();
    return $result;

   
  }


  public function singelbazarsearch($curentdate, $membername)
  {
    $this->db->select('*');
    $this->db->from('single_bazar');
    $this->db->like('curdate', $curentdate);
    $this->db->like('fullname', $membername);
    $query  = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
 }

?>