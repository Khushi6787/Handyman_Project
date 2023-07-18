<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function addEmployee(){
		$data['operation'] = "insert";
		$data['deptData'] = $this->deptModel->showDept();
		$this->load->view('addEmp',$data);
	}

	public function insertEmployee(){
		$data['name'] = $this->input->post('name');
		$data['sal'] = $this->input->post('sal');
		$data['emp_image'] = $this->photo_upload();
		$data['dept_id'] = $this->input->post('dept_id');

		$this->empModel->insertEmployee($data);
		redirect('Welcome/showEmployee');
	}

	public function editEmployee($id){
		$data['operation'] = "update";
		$data['deptData'] = $this->deptModel->showDept();
		$data['empData'] = $this->empModel->searchEmployee($id);
		$this->load->view('addEmp',$data);
	}

	public function updateEmployee(){
		$data['emp_id'] = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['sal'] = $this->input->post('sal');
		if($_FILES['emp_image']['name']!=null)
		{
			$data['emp_image'] = $this->photo_upload();
		}
		$data['dept_id'] = $this->input->post('dept_id');

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


	public function addDepartment(){
		$data['operation'] = "insert";
		$this->load->view('addDept',$data);
	}

	public function insertDepartment(){
		$data['dept_name'] = $this->input->post('dept_name');

		$this->deptModel->insertDept($data);
		redirect('Admin/showDepartment');
	}

	public function editDepartment($id){
		$data['operation'] = "update";
		$data['deptData'] = $this->deptModel->searchDept($id);
		$this->load->view('addDept',$data);
	}

	public function updateDepartment(){
		$data['dept_id'] = $this->input->post('dept_id');
		$data['dept_name'] = $this->input->post('dept_name');

		$this->deptModel->updateDept($data);
		redirect('Admin/showDepartment');
	}

	public function deleteDepartment($id){
		$this->deptModel->deleteDept($id);
		redirect('Admin/showDepartment');
	}

	public function showDepartment(){
		$data['deptData'] = $this->deptModel->showDept();
		$this->load->view('showDept',$data);
	}

	public function photo_upload()
    {
        $type = explode('.', $_FILES["emp_image"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "upload/". rand(1, 999) . '.' . $type;
        if (in_array($type, array("jpeg", "jpg", "png", "gif"))) {
            if (is_uploaded_file($_FILES["emp_image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["emp_image"]["tmp_name"], $url)) {
                    return $url;
                }
            }
        } else {
            echo "file not supported";
        }
    }

}
