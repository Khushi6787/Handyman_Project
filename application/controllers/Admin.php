<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	function __construct()
	{
        parent::__construct();
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://mail.metanoiainfotech.com',
            'smtp_port' => 465,
            'smtp_user' => 'pruthvipatel@metanoiainfotech.com',
            'smtp_pass' => 'pruthvi@2022',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
    }

	public function index()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['auth']=$this->authModel->showauth($_SESSION['authIDPK']);

			$data['worker_count']=count($this->providerModel->showprovider());
			$data['client_count']=count($this->authModel->user_data_by_type("client"));
			
			if($_SESSION['usertype'] == "admin"){
				$data['request_count']=count($this->requestModel->showrequest());
			}else{
				$data['request_count']=count($this->requestModel->showrequestbyProvider($_SESSION['userIDFK']));
			}
			
			if($_SESSION['usertype'] == "admin"){
				$data['booking_count']=count($this->bookingModel->booking_data_by_status("0"));
			}else{
				$data['booking_count']=count($this->bookingModel->booking_data_by_status_provider("0",$_SESSION['userIDFK']));
			}
			
			if($_SESSION['usertype'] == "admin"){
				$data['complete_count']=count($this->bookingModel->booking_data_by_status("1"));
			}else{
				$data['complete_count']=count($this->bookingModel->complete_data_by_status_provider("1",$_SESSION['userIDFK']));
			}

			$data['feedback_count']=count($this->feedbackModel->showfeedback());
			
			$this->load->view('admin/index',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}
	
	//Category
	public function addCategory()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "insert";
			$this->load->view('Admin/addCategory',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function insertcategory()
	{
		$data['image'] = $this->photo_upload();
		$data['categoryName'] = $this->input->post('categoryName');
		
		$this->categoryModel->insertcategory($data);
		redirect('Admin/showcategory');
	}

	public function editcategory($categoryIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "update";
			$data['catData'] = $this->categoryModel->searchcategory($categoryIDPK);
			$this->load->view('Admin/addCategory',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function updatecategory()
	{
		$data['categoryIDPK'] = $this->input->post('categoryIDPK');
		if($_FILES['image']['name']!=null){
			$data['image'] = $this->photo_upload();
		}
		$data['categoryName'] = $this->input->post('categoryName');
		
		$this->categoryModel->updatecategory($data);
		redirect('Admin/showcategory');
	}

	public function deletecategory($categoryIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->categoryModel->deletecategory($categoryIDPK);
			redirect('Admin/showcategory');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}		
	}

	public function showcategory()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['catData'] = $this->categoryModel->showcategory();
			$this->load->view('Admin/showCategory',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function photo_upload()
    {
        $type = explode('.', $_FILES["image"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "upload/". rand(1, 999) . '.' . $type;
        if (in_array($type, array("jpeg", "jpg", "png", "gif"))) {
            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $url)) {
                    return $url;
                }
            }
        } else {
            echo "file not supported";
        }
    }



	//Inquiry
	public function editinquiry($inquiryIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "update";
			$data['inqData'] = $this->inquiryModel->searchinquiry($inquiryIDPK);		
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function deleteinquiry($inquiryIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->inquiryModel->deleteinquiry($inquiryIDPK);
			redirect('Admin/showinquiry');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}		
	}

	public function showinquiry()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['inqData'] = $this->inquiryModel->showinquiry();
			$this->load->view('Admin/showInquiry',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}



	//Request
	public function editrequest($requestIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "update";
			$data['reqData'] = $this->requestModel->searchrequest($requestIDPK);	
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function deleterequest($requestIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->requestModel->deleterequest($requestIDPK);
			redirect('Admin/showrequest');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function showrequest()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			if($_SESSION['usertype'] == "admin")
			{
				$data['reqData'] = $this->requestModel->showrequest();
			}else{
				$data['reqData'] = $this->requestModel->showrequestbyProvider($_SESSION['userIDFK']);
			}
			$this->load->view('Admin/showRequest',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function update_service_request_price($id)
	{
		$data['requestIDPK'] = $id;
		$data['estimate'] = $this->input->post('estimate');
		$data['status'] = "1";
		$this->requestModel->updaterequest($data);
		redirect('admin/showRequest');
	}
	public function update_service_request_status($id)
	{
		$data['date'] = $this->input->post('date');
		$data['time'] = $this->input->post('time');
		$data['requestIDFK'] = $id;
		$data['requestName'] = $this->input->post('userName');;
		$data['status'] = "0";
		$data1['status'] = "4";
		$data1['requestIDPK'] = $id;

		$this->requestModel->updaterequest($data1);
		$this->bookingModel->insertbooking($data);
				
		$request=$this->requestModel->searchrequest($id);
		$user=$this->userModel->searchuser($request['userIDFK']);
        
		$this->email->set_newline("\r\n");
        $this->email->from('pruthvipatel@metanoiainfotech.com'); // change it to yours
        $this->email->to($user['email']);// change it to yours
        $this->email->subject('Service Booking');
		$message = 'Your Booking is confirmed for Handy man services.';
		$message .= ' Provider will come on Date : '.$data['date'].' and Time: '.$data['time'].'.';
        $this->email->message($message);
        if($this->email->send())
        {
    		echo 'Email sent.';
        }		
		redirect('admin/showRequest');
	}

	//Last Photo Service
	public function addLastPhoto()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "insert";
			$data['providerData'] = $this->providerModel->showprovider();
			$this->load->view('Admin/addLastPhoto',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function insertlastphoto(){
		
		$data['providerIDFK'] = $this->input->post('providerIDFK');

		$providerData = $this->providerModel->searchprovider($data['providerIDFK']);
		$data['providerName'] = $providerData['providerName'];
		
		$this->photo_uploads($data['providerIDFK'],$data['providerName']);
		redirect('Admin/showlastphoto');
	}

	public function editlastphoto($lastphotoIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "update";
			$data['providerData'] = $this->providerModel->showprovider();
			$data['lpData'] = $this->lastphotoModel->searchlastphoto($lastphotoIDPK);
			$this->load->view('Admin/addLastPhoto',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function updatelastphoto(){
		$data['lastphotoIDPK'] = $this->input->post('lastphotoIDPK');
		if($_FILES['image']['name']!=null){
			$data['image'] = $this->photo_uploads();
		}
		$data['providerIDFK'] = $this->input->post('providerIDFK');

		$providerData = $this->providerModel->searchprovider($data['providerIDFK']);
		$data['providerName'] = $providerData['providerName'];
		
		$this->lastphotoModel->updatelastphoto($data);
		redirect('Admin/showlastphoto');
	}

	public function deletelastphoto($lastphotoIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->lastphotoModel->deletelastphoto($lastphotoIDPK);
			redirect('Admin/showlastphoto');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function showlastphoto()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			if($_SESSION['usertype'] == "admin"){
				$data['lpData'] = $this->lastphotoModel->showlastphoto();
			}
			else{
				$data['lpData'] = $this->lastphotoModel->showlastphotobyProvider($_SESSION['userIDFK']);
			}
			$this->load->view('Admin/showLastPhoto',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}
	
	public function photo_uploads($id,$name)
    {
		$url_array = array();
		if (count($_FILES["image"]['name']) > 0) 
		{
			for ($i = 0; $i < count($_FILES["image"]['name']); $i++)
			{	
				$type = explode('.', $_FILES["image"]["name"][$i]);
				$type = end($type);
	
				$j++;
				$url = "upload/". rand(1,999). '.' . $type;
	
				if (in_array($type, array("jpg", "jpeg", "gif", "png"))) 
				{
					if (is_uploaded_file($_FILES["image"]["tmp_name"][$i])) 
					{
						if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $url)) 
						{
							$da['providerIDFK'] = $id;
							$da['providerName'] = $name;
							$da['image'] = $url;
							$this->lastphotoModel->insertlastphoto($da);
						}
					}
				}
			}
		}
    }



	//Proof
	public function addproof()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "insert";
			$data['providerData'] = $this->providerModel->showprovider();
			$this->load->view('Admin/addProof',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function insertproof()
	{		
		$data['providerIDFK'] = $this->input->post('providerIDFK');

		$providerData = $this->providerModel->searchprovider($data['providerIDFK']);
		$data['providerName'] = $providerData['providerName'];
		
		$this->proof_photo_uploads($data['providerIDFK'],$data['providerName']);
		redirect('Admin/showProof');
	}

	public function editproof($proofIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "update";
			$data['proofData'] = $this->proofModel->searchproof($proofIDPK);
			$data['providerData'] = $this->providerModel->showprovider();
			$this->load->view('admin/addProof',$data);	
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function deleteproof($proofIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->proofModel->deleteproof($proofIDPK);
			redirect('Admin/showproof');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function showproof()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			if($_SESSION['usertype'] == "admin"){
				$data['proofData'] = $this->proofModel->showproof();
			}else{
				$data['proofData'] = $this->proofModel->showproofbyProvider($_SESSION['userIDFK']);
			}
			$this->load->view('Admin/showProof',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function proof_photo_uploads($id,$name)
    {
		$url_array = array();
		if (count($_FILES["image"]['name']) > 0) 
		{
			for ($i = 0; $i < count($_FILES["image"]['name']); $i++)
			{	
				$type = explode('.', $_FILES["image"]["name"][$i]);
				$type = end($type);
	
				$j++;
				$url = "upload/". rand(1,999). '.' . $type;
	
				if (in_array($type, array("jpg", "jpeg", "gif", "png"))) 
				{
					if (is_uploaded_file($_FILES["image"]["tmp_name"][$i])) 
					{
						if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $url)) 
						{
							$da['providerIDFK'] = $id;
							$da['providerName'] = $name;
							$da['image'] = $url;
							$this->proofModel->insertproof($da);
						}
					}
				}
			}
		}
    }
	


	//Provider
	public function addProvider()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "insert";
			$data['typeData'] = $this->ptypeModel->showptype();
			$data['categoryData'] = $this->categoryModel->showcategory();
			$data['areaData'] = $this->areaModel->showarea();
			$this->load->view('Admin/addProvider',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function insertprovider()
	{
		$data['image'] = $this->provider_photo_upload();
		$data['typeIDFK'] = $this->input->post('typeIDFK');
		$data['categoryIDFK'] = $this->input->post('categoryIDFK');
		$data['providerName'] = $this->input->post('providerName');
		$data['services'] = $this->input->post('services');
		$data['gender'] = $this->input->post('gender');
		$data['address'] = $this->input->post('address');
		$data['areaIDFK'] = $this->input->post('areaIDFK');
		$data['mobileNo'] = $this->input->post('mobileNo');
		$data['email'] = $this->input->post('email');
		$data['skill'] = $this->input->post('skill');
		$data['exprience'] = $this->input->post('exprience');
		$data['costperhour'] = $this->input->post('costperhour');
		$data['rating'] = $this->input->post('rating');
		
		$catData = $this->categoryModel->searchcategory($data['categoryIDFK']);
		$data['categoryName'] = $catData['categoryName'];

		$typeData = $this->ptypeModel->searchptype($data['typeIDFK']);
		$data['typeName'] = $typeData['typeName'];

		$areaData = $this->areaModel->searcharea($data['areaIDFK']);
		$data['areaName'] = $areaData['areaName'];

		$providerID = $this->providerModel->insertprovider($data);

		$da['userIDFK'] = $providerID;
		$da['userName'] = $data['providerName'];
		$da['email'] = $data['email'];
		$da['password'] = $data['mobileno'];
		$da['usertype'] = "provider";
		$this->authModel->insertauth($da);
		redirect('Admin/showprovider');
	}

	public function editprovider($providerIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "update";
			$data['typeData'] = $this->ptypeModel->showptype();
			$data['categoryData'] = $this->categoryModel->showcategory();
			$data['areaData'] = $this->areaModel->showarea();
			$data['providerData'] = $this->providerModel->searchprovider($providerIDPK);
			$this->load->view('Admin/addProvider',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function updateprovider(){
		$data['providerIDPK'] = $this->input->post('providerIDPK');
		if($_FILES['image']['name']!=null){
			$data['image'] = $this->provider_photo_upload();
		}
		$data['typeIDFK'] = $this->input->post('typeIDFK');
		$data['categoryIDFK'] = $this->input->post('categoryIDFK');
		$data['providerName'] = $this->input->post('providerName');
		$data['services'] = $this->input->post('services');
		$data['gender'] = $this->input->post('gender');
		$data['address'] = $this->input->post('address');
		$data['areaIDFK'] = $this->input->post('areaIDFK');
		$data['mobileNo'] = $this->input->post('mobileNo');
		$data['email'] = $this->input->post('email');
		$data['skill'] = $this->input->post('skill');
		$data['exprience'] = $this->input->post('exprience');
		$data['costperhour'] = $this->input->post('costperhour');
		$data['rating'] = $this->input->post('rating');

		$catData = $this->categoryModel->searchcategory($data['categoryIDFK']);
		$data['categoryName'] = $catData['categoryName'];

		$typeData = $this->ptypeModel->searchptype($data['typeIDFK']);
		$data['typeName'] = $typeData['typeName'];

		$areaData = $this->areaModel->searcharea($data['areaIDFK']);
		$data['areaName'] = $areaData['areaName'];
		
		$this->providerModel->updateprovider($data);
		redirect('Admin/showprovider');
	}

	public function deleteprovider($providerIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->providerModel->deleteprovider($providerIDPK);
			redirect('Admin/showprovider');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function showprovider()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['providerData'] = $this->providerModel->showprovider();
			$this->load->view('Admin/showProvider',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function viewlastphoto($id)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['lpData'] = $this->lastphotoModel->viewphoto($id);
			$this->load->view('Admin/gallery',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function provider_photo_upload()
    {
        $type = explode('.', $_FILES["image"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "upload/photo_uploads". rand(1, 999) . '.' . $type;
        if (in_array($type, array("jpeg", "jpg", "png", "gif"))) {
            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $url)) {
                    return $url;
                }
            }
        } else {
            echo "file not supported";
        }
    }



	//User
	public function deleteuser($userIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->userModel->deleteuser($userIDPK);
			redirect('Admin/showuser');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function showuser()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['userData'] = $this->userModel->showuser();
			$this->load->view('Admin/showUser',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}



	//Feedback
	public function editfeedback($feedbackIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['operation'] = "update";
			$data['feedData'] = $this->feedbackModel->searchfeedback($feedbackIDPK);	
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function deletefeedback($feedbackIDPK)
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->feedbackModel->deletefeedback($feedbackIDPK);
			redirect('Admin/showfeedback');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}

	public function showfeedback()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$data['feedData'] = $this->feedbackModel->showfeedback();
			$this->load->view('Admin/showFeedback',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}



	//Booking
	public function deletebooking($bookingIDPK){
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			$this->bookingModel->deletebooking($bookingIDPK);
			redirect('Admin/showbooking');
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
		
	}

	public function showbooking()
	{
		if(isset($_SESSION['authIDPK']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] != "client")
		{
			if($_SESSION['usertype'] == "admin")
			{
				$data['bookingData'] = $this->bookingModel->showbooking();
			}else{
				$data['bookingData'] = $this->bookingModel->showbookingbyProvider($_SESSION['userIDFK']);
			}			
			$this->load->view('Admin/showbooking',$data);
		}else{
			$data['operation']='login';
			$this->load->view('admin/adminLogin',$data);
		}
	}



	//Login
	public function adminLogin()
	{
		$this->load->view('admin/adminLogin');
	}
	
	public function login()
	{
		$data['email']=$this->input->post('email');
		$data['password']=$this->input->post('password');
		//print_r($this->input->post());die;
		$da = $this->authModel->user_data_email($data['email'],$data['password']);
		
		if($da!=null){
			$data['usertype']=$da['usertype'];
			//$sign_in = $this->input->post('rememberMe');
			$result = $this->authModel->searchauth($da['authIDPK']);
			
			$_SESSION['authIDPK'] = $result['authIDPK'];
			$_SESSION['userIDFK'] = $result['userIDFK'];
		    $_SESSION['usertype'] = $result['usertype'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['userName'] = $result['userName'];
			redirect('Admin');
		}else{
			$data['invalid']="Invalid Username Or Password";
			$data['operation']='login';
			$this->load->view('Admin/adminLogin',$data);
		}		
	}


	//Logout
	public function logout()
	{
		unset($_SESSION['authIDPK']);
		unset($_SESSION['usertype']);
		unset($_SESSION['userName']);
		unset($_SESSION['userIDFK']);
		unset($_SESSION['email']);		
		redirect('Admin');
	}
}
