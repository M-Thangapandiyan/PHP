<?php

defined('BASEPATH') or exit('NO direct script access allow');
class EmployeeController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('EmployeeModel');
  }
  public function index()
  {
    $this->load->view('EmployeeIndex');
  }

  public function employeeDetails()
  {
    $results['result'] = $this->EmployeeModel->readData();
    $this->load->view('EmployeeView', $results);
  }
  public function create()
  {
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('firstname', 'FirstName', 'required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('lastname', 'LastName', 'required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('email', 'Email', 'required|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]|is_unique[employee.email]');
    $this->form_validation->set_rules('phonenumber', 'PhoneNumber', 'required');
    $this->form_validation->set_rules('dob', 'DOB', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required|in_list[Male,Female,Other]');
    $this->form_validation->set_rules('designationid', 'Designation', 'required');
    $this->form_validation->set_rules('branchid', 'Branch', 'required');
    $this->form_validation->set_rules('technologyid', 'Technology', 'required');
    if ($this->form_validation->run() === FALSE) {
      $data['designation'] = $this->EmployeeModel->getDesignation();
      $data['technology'] = $this->EmployeeModel->getTechnology();
      $data['branch'] = $this->EmployeeModel->getBranch();
      $this->load->view('CreateEmployee', $data);
    } else {
      $data = array(
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'dob' => $this->input->post('dob'),
        'email' => $this->input->post('email'),
        'phonenumber' => $this->input->post('phonenumber'),
        'gender' => $this->input->post('gender'),
        'branch_id' => $this->input->post('branchid'),
        'designation_id' => $this->input->post('designationid'),
      );
      $employee_id = $this->EmployeeModel->create($data);
      $technologyIds = $this->input->post('technologyid');
      foreach ($technologyIds as $technology_id) {
        $this->EmployeeModel->storeEmployeeTechnology($employee_id, $technology_id);
      }
    }
  }
  public function delete($employee_id)
  {
    $this->EmployeeModel->deleteData($employee_id);
  }
  public function view($employee_id)
  {
    $results['result'] = $this->EmployeeModel->read($employee_id);
    $this->load->view('EmployeeDetails', $results);
  }

  public function edit($id)
  {
    $updateData['updatedata'] = $this->EmployeeModel->displayDataById($id);
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('firstname', 'FirstName', 'required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('lastname', 'LastName', 'required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('email', 'Email', 'regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
    $this->form_validation->set_rules('phonenumber', 'PhoneNumber', 'required|regex_match[/^[0-9]{10}$/]');
    $this->form_validation->set_rules('dob', 'DOB', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required|in_list[Male,Female,Other]');
    $this->form_validation->set_rules('designationid', 'Designation', 'required');
    $this->form_validation->set_rules('branchid', 'Branch', 'required');
    $this->form_validation->set_rules('technologyid', 'Technology', 'required');

    if ($this->form_validation->run() === FALSE) {
      $updateData['designation'] = $this->EmployeeModel->getDesignation();
      $updateData['technology'] = $this->EmployeeModel->getTechnology();
      $updateData['branch'] = $this->EmployeeModel->getBranch();
      $this->load->view('UpdateEmployee', $updateData);
    } else {
      $data = array(
        'firstname' => ucfirst($this->input->post('firstname')),
        'lastname' => ucfirst($this->input->post('lastname')),
        'dob' => $this->input->post('dob'),
        'email' => $this->input->post('email'),
        'phonenumber' => $this->input->post('phonenumber'),
        'gender' => $this->input->post('gender'),
        'branch_id' => $this->input->post('branchid'),
        'designation_id' => $this->input->post('designationid'),
      );
      $employee_id = $this->EmployeeModel->updateData($id, $data);
      $technologyIds = $this->input->post('technologyid');
      foreach ($technologyIds as $technology_id) {
        $this->EmployeeModel->employeeTechnology($employee_id, $technology_id);
      }
    }
  }
}
?>