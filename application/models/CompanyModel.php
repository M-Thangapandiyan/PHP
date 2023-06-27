<?php

class CompanyModel extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }   

    public function storeData($data)
    {
        if ($this->db->insert('company', $data)) {
            echo "Data stored successfully.";
        } else {
            echo "Error occurred while storing data.";
        }
    }
    public function readData(){
       $getReadData = $this->db->select('company_id,name,address,email,phonenumber')->get('company');
       return $getReadData->result();
    }
    function displayDataById($company_id)
	{
        $this->db->where('company_id', $company_id);
        $getReadData = $this->db->get('company');
	    return $getReadData->result();
	}

    public function deleteData($company_id)
    {
        $this->db->where('id', $company_id);
        $this->db->delete('company');
   
        if ($this->db->affected_rows() > 0) {
            echo "Deleted successfully.";
            return true;
            
        } else {
            echo "Not deleted successfully.";
            return false;
        }
    }
  

    public function updateData($company_id,$data)
    {
            $this->db->where('company_id', $company_id);
            $this->db->update('company', $data);
        if ($this->db->affected_rows() > 0) {
            echo "updated successfully.";
            return true;
            
        } else {
            echo "Not updated successfully.";
            return false;
        }
    }

}

?>