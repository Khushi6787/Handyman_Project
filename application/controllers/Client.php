<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller 
{
	public function index()
	{
		$this->load->view('Client/index');
	}

	public function submit(){
		
		//$data['category_data']=$this->category_model->category_list();
		$data['bookingIDPK']=$this->input->post('bookingID');
		$data['status'] = "1";
		$d['status']="5";
		$d['payment']="paid";
		//$d['paymentMethod']=$this->input->post('paymentMethod');
		$d['requestIDPK']=$this->input->post('requestID');
		
		$this->bookingModel->updatebooking($data);
		$this->requestModel->updaterequest($d);
		$this->load->view('Client/submit');
	}
	
    //Category
    public function showcategory(){
		$data['catData'] = $this->categoryModel->showcategory();
		$this->load->view('Client/showCategory',$data);
	}

	//Provider
	public function showprovider($id)
	{
		$data['providerData'] = $this->providerModel->showproviderbyID($id);
		$this->load->view('Client/showProvider',$data);
	}

	//Provider details
	public function showproviderdetails($id)
	{		
			$data['userData'] = $this->userModel->searchuser($id);
			$data['providerData'] = $this->providerModel->searchprovider($id);
			$data['areaData'] = $this->areaModel->showarea();
			$data['lpData'] = $this->lastphotoModel->showlastphoto();
			$data['proofData'] = $this->proofModel->showproof();
			$this->load->view('Client/showProviderdetails',$data);				
	}

	//Booking
	public function addbooking()
	{
		$data['userData'] = $this->userModel->showuser();
		$data['catData'] = $this->categoryModel->showcategory();
		$data['areaData'] = $this->areaModel->showarea();
		$data['providerData'] = $this->providerModel->showprovider();
		$this->load->view('Client/showProviderdetails',$data);
	}

	public function insertbooking()
	{
		if(isset($_SESSION['userID']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] == "client")
		{
			$data['userIDFK'] = $this->input->post('userID');
			$data['userName'] = $this->input->post('userName');
			$data['areaIDFK'] = $this->input->post('areaIDFK');
			$data['request'] = $this->input->post('service');
			$data['providerIDFK'] = $this->input->post('providerID');
			$data['providerName'] = $this->input->post('providerName');
			$data['categoryIDFK'] = $this->input->post('categoryID');
			$data['categoryName'] = $this->input->post('categoryName');
			$data['status'] = "0";
		
			$areaData = $this->areaModel->searcharea($data['areaIDFK']);
			$data['areaName'] = $areaData['areaName'];

			$this->requestModel->insertrequest($data);
			redirect('Client/showThanksBooking');
		}else{
			$data['operation']='login';
			$this->load->view('Client/showUser',$data);
		}
	}

	//Thank You For Booking
	public function showthanksbooking()
	{
		$this->load->view('Client/showThanksBooking');
	}

	//Contact US
	public function showContactus()
	{		
		$this->load->view('Client/showContactus');
	}

	//About US
	public function showaboutus()
	{
		$this->load->view('Client/showAboutus');
	}

	//User
	public function edituser($userIDPK)
	{
		$data['operation'] = "update";
		$data['userData'] = $this->userModel->searchuser($userIDPK);
		$this->load->view('Client/showProfile',$data);
	}

	public function updateuser(){
		$data['userIDPK'] = $_SESSION['userID'];	
		$data['userName'] = $this->input->post('userName');
		$data['email'] = $this->input->post('email');
		$data['address'] = $this->input->post('address');
		$data['mobileno'] = $this->input->post('mobileno');
		$data['gender'] = $this->input->post('gender');
		
		$this->userModel->updateuser($data);
		redirect('Client/showProfile');
	}

	public function showUser()
	{
		$data['userData'] = $this->userModel->showUser();
		$this->load->view('Client/showUser',$data);
	}

	//Inquiry
	public function addinquiry()
	{	
		$this->load->view('Client/showContactus');
	}

	public function insertinquiry(){
		$data['inquiryName'] = $this->input->post('inquiryName');
		$data['email'] = $this->input->post('email');
		$data['mobileno'] = $this->input->post('mobileno');
		$data['subject'] = $this->input->post('subject');
		$data['message'] = $this->input->post('message');
		
		$this->inquiryModel->insertinquiry($data);
		redirect('Client/showThanks');
	}

	//Thank You
	public function showthanks()
	{
		$this->load->view('Client/showThanks');
	}

	//Show Profile
	public function showProfile()
	{
		$this->load->view('Client/showProfile');
	}

	//Feedback
	public function addfeedback()
	{
		$data['operation'] = "insert";
		$data['feedbackData'] = $this->userModel->showuser();
		$data['providerData'] = $this->providerModel->showprovider();
		
		$this->load->view('Client/showProfile',$data);
	}

	public function insertfeedback(){
		$data['ratings'] = $this->input->post('ratings');
		$data['comment'] = $this->input->post('comment');
		$data['providerIDFK'] = $this->input->post('providerID');
		$data['providerName'] = $this->input->post('providerName');
		$data['userIDFK'] = $_SESSION['userID'];
		$data['userName'] = $_SESSION['userName'];
			
		$this->feedbackModel->insertfeedback($data);
		redirect('Client/showProfile');
	}

	public function deletefeedback($feedbackIDPK)
	{
		$this->feedbackModel->deletefeedback($feedbackIDPK);
		redirect('Client/showProfile');
	}

	//Service
	public function deleteservice($requestIDPK)
	{
		$this->requestModel->deleterequest($requestIDPK);
		redirect('Client/showProfile');
	}

	public function update_service_request_status($id,$status)
	{
		$data['status'] = $status;
		$data['requestIDPK'] = $id;
		//print_r($data);die;
		$this->requestModel->updaterequest($data);
		redirect('Client/showProfile');
	}

	//Privacy Policy
	public function privacyPolicy()
	{
		$this->load->view('Client/privacyPolicy');
	}

	//Terms of Services
	public function termsofservice()
	{
		$this->load->view('Client/termsofservice');
	}

	//Login
	public function login()
	{
		$data['email']=$this->input->post('email');
		$data['password']=$this->input->post('password');
		$da = $this->authModel->user_data_email($data['email'],$data['password']);
		
		if($da!=null)
		{
			$data['usertype']=$da['usertype'];
			$result = $this->userModel->searchuser($da['userIDFK']);
			$_SESSION['userID'] = $result['userIDPK'];
			$_SESSION['usertype'] = $da['usertype'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['userName'] = $result['userName'];
			redirect('Client');
		}else{
			$data['invalid']="Invalid Username Or Password";
			$data['operation']='login';
			$this->load->view('Client/showUser',$data);
		}		
	}

	//Logout
	public function logout()
	{
		unset($_SESSION['userID']);
		unset($_SESSION['usertype']);
		unset($_SESSION['email']);		
		unset($_SESSION['userName']);		
		redirect('Client');
	}
	
	
	//Register
	public function addregister()
	{
		$data['operation'] = "insert";
		$this->load->view('Client/addregister',$data);
	}

	public function insertregister()
	{
		$data['userName'] = $this->input->post('userName');
		$data['email'] = $this->input->post('email');
		$data['mobileno'] = $this->input->post('mobileno');
		$data['gender'] = $this->input->post('gender');
		$data['address'] = $this->input->post('address');
		$userID = $this->userModel->insertuser($data);
		
		$da['userIDFK'] = $userID;
		$da['userName'] = $data['userName'];
		$da['email'] = $data['email'];
		$da['password'] = $this->input->post('password');
		$da['usertype'] = "client";

		$this->authModel->insertauth($da);

		redirect('Client/showThanksRegister');
	}

	public function showRegister()
	{
		$data['userData'] = $this->userModel->showuser();
		$this->load->view('Client/showThanksRegister',$data);
	}

	//Thank You
	public function showthanksRegister()
	{
		$this->load->view('Client/showThanksRegister');
	}
}