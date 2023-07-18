<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function addEmployee(){
		$data['operation'] = "insert";
		$this->load->view('addEmp',$data);
	}

	public function insertEmployee(){
		$data['name'] = $this->input->post('name');
		$data['sal'] = $this->input->post('sal');
		$data['dept'] = $this->input->post('dept');

		$this->empModel->insertEmployee($data);
		redirect('Welcome/showEmployee');
	}

	public function editEmployee($id){
		$data['operation'] = "update";
		$data['empData'] = $this->empModel->searchEmployee($id);
		$this->load->view('addEmp',$data);
	}

	public function updateEmployee(){
		$data['id'] = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['sal'] = $this->input->post('sal');
		$data['dept'] = $this->input->post('dept');

		$this->empModel->updateEmployee($data);
		redirect('Welcome/showEmployee');
	}

	public function deleteEmployee($id){
		$this->empModel->deleteEmployee($id);
		redirect('Welcome/showEmployee');
	}

	public function showEmployee(){
		$data['empData'] = $this->empModel->showEmployee();
		$this->load->view('showEmp',$data);
	}

}
