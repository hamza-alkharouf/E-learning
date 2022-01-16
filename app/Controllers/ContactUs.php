<?php

namespace App\Controllers;
use App\Models\ContactInfoModel;
use App\Models\socialMediaModel;

class ContactUs extends BaseController
{
	/**
	 * show ContactUs
	 *
	 * @return void
	 */
	public function index()
	{
		$ContactInfomodel = new ContactInfoModel();
		$socialMediamodel = new socialMediaModel();
		$socialMedia = $socialMediamodel->getSocial(); 

		$contact = $ContactInfomodel->getContact(); 
		if($_SERVER['REQUEST_METHOD']=='POST'){

			$validate=$this->validate
			([
				'fullName'             => 'required|alpha_numeric_space|min_length[3]|max_length[30]',
				'message'            => 'required|alpha_numeric_space|min_length[3]|max_length[30]',
				'email'                => 'valid_email|min_length[5]|max_length[30]'
			]);
			if (!$validate)
			{
				$this->loadTemplate('contactUs','Contact us',['validation'=>\config\Services::validation(),'contact' =>$contact,'socialMedia' =>$socialMedia]);
			}
			else
			{
				$email = \Config\Services::email();
				$email->setFrom($this->request->getPost('email'));
				$email->setTo('mhomad@gmail.com');
				$email->setSubject('Contact us');
				$email->setMessage($this->request->getPost('message'));
				$email->send();
			}
		}
		else 
		{
			$this->loadTemplate('contactUs','Contact us',['validation'=>\config\Services::validation(),'contact' =>$contact,'socialMedia' =>$socialMedia]);
		}

	

	}
}
