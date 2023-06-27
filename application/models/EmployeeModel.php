<?php

class EmployeeModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function create($data)
    {
        $employee = 'EMP';
        $employeeId = $this->getLastId();
        $emp_id = $employee . $employeeId + 1;
        $data['emp_id'] = $emp_id;
        if ($this->db->insert('employee', $data)) {
            echo "Data stored successfully.";
            return $this->db->insert_id();
        } else {
            echo "Data not stored.";
        }
    }
    public function readData()
    {
        $readData = $this->db->select('e.employee_id, e.emp_id, e.firstname, e.lastname, e.DOB, e.email,  e.phonenumber, e.gender, b.branch, d.designation')
            ->from('employee e')
            ->join('branch b', 'e.branch_id = b.branch_id')
            ->join('designation d', 'd.designation_id = e.designation_id')
            ->group_by('e.employee_id')
            ->where('e.is_deleted', 0)
            ->order_by('e.employee_id', 'ASC')
            ->get();
        return $readData->result();
    }

    public function read($employee_id)
    {
        $readData = $this->db->select('e.employee_id, e.emp_id, e.firstname, e.lastname, e.DOB, e.email, e.phonenumber, e.gender, b.branch, d.designation, GROUP_CONCAT(t.technology) AS technologies')
            ->from('employee e')
            ->join('branch b', 'e.branch_id = b.branch_id')
            ->join('designation d', 'd.designation_id = e.designation_id')
            ->join('employee_technology et', 'e.employee_id = et.employee_id', 'left')
            ->join('technology t', 't.technology_id = et.technology_id', 'left')
            ->where('e.employee_id', $employee_id)
            ->where('e.is_deleted', 0)
            ->group_by('e.employee_id')
            ->get();
        return $readData->result();
    }
    public function deleteData($employee_id)
    {
        $data = array(
            'is_deleted' => 1
        );

        $this->db->where('employee_id', $employee_id);
        $this->db->update('employee', $data);

        if ($this->db->affected_rows() > 0) {
            $this->db->where('employee_id', $employee_id);
            $this->db->update('employee_technology', $data);
            echo "Deleted successfully.";
        } else {
            echo "Not deleted successfully.";
        }
    }

    function displayDataById($employee_id)
    {
        $readData = $this->db->select('e.employee_id, e.emp_id, e.firstname, e.lastname, e.DOB, e.email, e.phonenumber, e.gender, b.branch, d.designation, GROUP_CONCAT(t.technology) AS technologies')
            ->from('employee e')
            ->join('branch b', 'e.branch_id = b.branch_id')
            ->join('designation d', 'd.designation_id = e.designation_id')
            ->join('employee_technology et', 'e.employee_id = et.employee_id', 'left')
            ->join('technology t', 't.technology_id = et.technology_id', 'left')
            ->where('e.employee_id', $employee_id)
            ->where('e.is_deleted', 0)
            ->group_by('e.employee_id')
            ->get();
        return $readData->result();
    }

    public function updateData($employee_id, $data)
    {
        $this->db->where('employee_id', $employee_id);
        $this->db->update('employee', $data);

        if ($this->db->affected_rows() > 0) {
            echo "updated successfully.";
        } else {
            echo "Not updated successfully.";
        }
    }

    public function getLastId()
    {
           $readData = $this->db->query('SELECT * FROM employee ORDER BY employee_id DESC LIMIT 1');
            $result = $readData->row();
            return $result->employee_id;


    }

    public function storeEmployeeTechnology($employee_id, $technology_id)
    {
        $data = array(
            'employee_id' => $employee_id,
            'technology_id' => $technology_id
        );
        $this->db->insert('employee_technology', $data);
    }

    public function employeeTechnology($employee_id, $technology_id)
    {
        $data = array(
            'technology_id' => $technology_id
        );
        $this->db->where('employee_id', $employee_id);
        $this->db->update('employee_technology', $data);
    }

    public function getDesignation()
    {
        $readData = $this->db->get('designation');
        $result = $readData->result();
        return $result;
    }
    public function getTechnology()
    {
        $getReadData = $this->db->get('technology');
        $result = $getReadData->result();
        return $result;
    }
    public function getBranch()
    {
        $readData = $this->db->get('branch');
        $result = $readData->result();
        return $result;
    }

    // public function getSelectedTechnologies($id)
    // {

    //     $this->db->select('technology_id');
    //     $this->db->where('employee_id', $id);
    //     return $this->db->get('employee_technology')->result_array();
    // }
    // public function getSelectedBranch($id)
    // {
    //     $this->db->select('branch_id');
    //     $this->db->where('employee_id', $id);
    //     $result = $this->db->get('employee')->row();
    //         return $result->branch_id;

    // }
    // public function getSelectedDesignation($id)
    // {
    //     $this->db->select('designation_id');
    //     $this->db->where('employee_id', $id);
    //     $result = $this->db->get('employee')->row();
    //         return $result->Designation_id;

    // }

    // public function readData(){
    //    $getReadData = $this->db->select('employee_id,name,password,email,phonenumber')->get('employee');
    //    return $getReadData->result();
    // }

    // public function read($employee_id)
    // {
    //     $readData = $this->db->select('e.employee_id, e.emp_id, e.firstname, e.lastname, e.DOB, e.email, e.phonenumber, e.gender, b.branch, d.designation,t.technology')
    //         ->from('employee e')
    //         ->join('branch b', 'e.branch_id = b.branch_id')
    //         ->join('designation d', 'd.designation_id = e.designation_id')
    //         ->join('employee_technology et', 'e.employee_id = et.employee_id', 'left')
    //         ->join('technology t', 't.technology_id = et.technology_id', 'left')
    //         ->where('e.employee_id', $employee_id)
    //         ->where('e.is_deleted', 0)
    //         ->order_by('e.employee_id', 'ASC')
    //         -> GROUP_CONCAT(t.technology) AS technologies
    //         FROM employee e
    //         JOIN employee_technology et ON e.employee_id = et.employee_id
    //         JOIN technology t ON t.technology_id = et.technology_id
    //         GROUP BY e.employee_id;
    //     print_r('<pre>');
    //     print_r($readData->result());
    //     print_r('</pre>');
    //     return $readData->result();
    // }


    // function displayDataById($employee_id)
    // {
    //     $this->db->where('employee_id', $employee_id);
    //     $readData = $this->db->get('employee');
    //     return $readData->result();

        // $this->db->select('employee_id');
    // $this->db->order_by('employee_id', 'DESC');
    // $this->db->limit(1);
    // $readData = $this->db->get('employee');
    // $result = $readData->row();
    // return $result->employee_id;

    // }

}
?>