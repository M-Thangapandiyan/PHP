<?php

defined('BASEPATH') or exit('NO direct script access allow');
class CompanyController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('CompanyModel');
  }
  public function index()
    {
        $results['result'] = $this->CompanyModel->readData();
        $this->load->view('CompanyView', $results);
    }

  public function create()
  {
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[32]');
    $this->form_validation->set_rules('address', 'Address', 'required|min_length[5]|max_length[32]');
    $this->form_validation->set_rules('email', 'Email', 'regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
    $this->form_validation->set_rules('phonenumber', 'PhoneNumber', 'required|regex_match[/^[0-9]{10}$/]');
    if ($this->form_validation->run() === FALSE) {
      $this->load->view('CreateCompany');
    } else {
      $data = array(
       
        'name' => $this->input->post('name'),
        'address' => $this->input->post('address'),
        'email' => $this->input->post('email'),
        'phonenumber' => $this->input->post('phonenumber'),
      );
      $this->CompanyModel->storeData($data);
    }
  }

  public function delete($company_id )
  {
    $this->CompanyModel->deleteData($company_id );
  }
  public function update($company_id )
  {

    $updateData['data'] = $this->CompanyModel->displayDataById($company_id);
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('email', 'Email', 'required|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
    $this->form_validation->set_rules('phonenumber', 'PhoneNumber', 'required|regex_match[/^[0-9]{10}$/]');
    if ($this->form_validation->run() === FALSE) {
      $this->load->view('UpdateCompany', $updateData);
    } else {
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phonenumber' => $this->input->post('phonenumber'),
      );
      $this->CompanyModel->updateData($company_id, $data);
    }
  }

  // public function show($company_id)
  // {
  //     $company = $this->CompanyModel->find($company_id);
  //     $employee = $company->employee;
  
  //     $data['company'] = $company;
  //     $data['employee'] = $employee;
  //     $this->load->view('CompanyDetails', $data);
  // }

  public function valid_password($password = '')
	{
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The pasword field is required minimum 5 characters.');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The pasword field must be at least one lowercase letter minimum 5 characters.');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The pasword field must be at least one uppercase letter minimum 5 characters.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The pasword field must have at least one number and minimum 5 characters.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The pasword field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));

			return FALSE;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('valid_password', 'The pasword field must be at least 5 characters in length minimum 5 characters.');

			return FALSE;
		}

		if (strlen($password) > 20)
		{
			$this->form_validation->set_message('valid_password', 'The pasword field cannot exceed 20 characters in length and minimum 5 characters .');

			return FALSE;
		}

		return TRUE;
	} 
}


?>