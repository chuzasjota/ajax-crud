<?php
class PersonModel extends CI_Model{
  function __construct(){
    parent::__construct();
  }

  public function getPersons(){
    $this->db->from('person');
    $query=$this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  public function insertPerson($data){
    $query = $this->db->insert('person', $data);
    if($query == true){
      return $this->db->insert_id();
    }else{
      return false;
    }
  }

  public function getPersonId($id){
    $this->db->from('person');
    $this->db->where("idPerson",$id);
    $query=$this->db->get();
    if($query->num_rows() > 0){
      return $query->row(); 
    }else{
      return false;
    }
  }


  public function updatePerson($id, $data){
    $query = $this->db->set($data);
    $query = $this->db->where('idPerson', $id);
    $query = $this->db->update('person');
    $result = $this->db->affected_rows();
    if ($result == 1) {
      return true;
    }else{
      return false;
    }
  }

  public function deletePerson($id){
    $this->db->where('idPerson', $id);
    $query = $this->db->delete('person'); 
    if($query == true){
      return true;
    }else{
      return false;
    }
  }

  public function getGender(){
    $this->db->from('gender');
    $query=$this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }
  
}
?>