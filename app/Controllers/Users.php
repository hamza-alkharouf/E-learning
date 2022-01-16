<?php

namespace App\Controllers;
use App\Models\StudentsModel;
use App\Models\AdminsModel;
class Users extends BaseController
{
/**
 * registration page to registration new student
 *
 * @return void
 */
public function registration()
{
	$session = session();
	if ($session->get('loginAdmin')) {
		return redirect()->to('Admin/home');
	}else if ($session->get('loginStudant')) {
		return redirect()->to('Home');
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$session = session();
		$validate=$this->validate
		([
			'lastname'             => 'required|alpha_numeric|min_length[3]|max_length[16]',
			'firstname'            => 'required|alpha_numeric|min_length[3]|max_length[16]',
			'password'             => 'required|min_length[8]|max_length[16]',
			'passwordConfirmation' => 'required|matches[password]',
			'email'                => 'valid_email|is_unique[Students.email]|is_unique[Admins.email]|min_length[5]|max_length[30]'
		]);
		if (!$validate)
		{
			return $this->loadTemplate('registration','Registration',['validation'=>\config\Services::validation()],['user/user.css']);
		}
		else
		{
			$model = new StudentsModel();
			$passwordHash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
			$data = 
			[
				'firstname' => $this->request->getPost('firstname'),
				'lastname'  => $this->request->getPost('lastname'),
				'email'     => $this->request->getPost('email'),
				'password'  => $passwordHash,
				'is_active' => 0,
			];

			$dataSession = array(
				'send' => false
			);
			$session->set($dataSession);
			$model->insertStudents($data);
			$this->verifyEmail($this->request->getPost('email'),$this->request->getPost('firstname'),$this->request->getPost('lastname'));
		}
	}
	else 
	{
		return $this->loadTemplate('registration','Registration',['validation'=>\config\Services::validation()],['user/user.css']);
	}	
}
/**
 * send Email to verify the authenticity of the email
 *
 * @param string $emailAddress
 * @param string $fname
 * @param string $lname
 * @return void
 */
private function verifyEmail($emailAddress,$fname,$lname)
{

	$session = session();
	$email = \Config\Services::email();
	$email->setTo($emailAddress);
	$message = 'Hello '.$fname.' '.$lname.', click <a href="'.base_url('/Users/verify').'">here</a> to confirm your account';
	$email->setSubject('Account Verification');
	$email->setMessage($message);
	
	if ($email->send()) {
		$data = array(			
			'emailAddress'=> $emailAddress,
			'send' => true
		);
		$session->set($data);
		$this->verify();
	} else {
		return redirect()->to('Registration');
	}
}

/**
 * verify ,
 *  Confirmation of the message ,
 * If the user confirms his account.
 *
 * @return void
 */
function verify()
{		
	$session = session();

	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		if ($session->get('send')) {
			$model = new StudentsModel();
			$data['is_active']=1;
			$dataSession = array(
				'verifyEmail' => false
			);
			$session->set($dataSession);
			$model->updateStudentByEmil($session->get('emailAddress'),$data);
			return redirect()->to('Users/Login');
		}else{
			return redirect()->to('Registration');

		}
		

	}else{
		return $this->loadTemplate('verifyAccount','Registration',['validation'=>\config\Services::validation()],['user/user.css']);

	}


}
/**
 * login page of student and admin
 *
 * @return void
 */
public function login()
{
	$session = session();
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$validate=$this->validate
		([
			'password'             => 'required|min_length[8]|max_length[16]',
			'email'                => 'valid_email|min_length[5]|max_length[30]'
		]);
		if (!$validate)
		{
			return $this->loadTemplate('login','Login',['validation'=>\config\Services::validation()],['user/user.css']);
		}
		else
		{
			$modelSrudent = new StudentsModel();
			$modelAdmin = new AdminsModel();
			$data = 
			[
				'email'     => $this->request->getPost('email'),
			];
			$student=$modelSrudent->selectByEmail($data);
			$admin=$modelAdmin->selectByEmail($data);
			if (empty($student) and empty($admin)) 
			{
				$dataSession = array(
					'loginStudant' => false,
					'loginAdmin' => false
				);
				$session->set($dataSession);
				return $this->loadTemplate('login','Login',['validation'=>\config\Services::validation()],['user/user.css']);
			} else 
			{
				if (!empty($student)) 
				{
					if ($student[0]['is_active']==0) 
					{
						$dataSession = array(
							'loginStudant' => false
						);
						$session->set($dataSession);

						return $this->loadTemplate('login','Login',['validation'=>\config\Services::validation()],['user/user.css']);
					} 
					else if(password_verify( $this->request->getPost('password'),$student[0]['password']) and $student[0]['is_active']==1)
					{
						$dataSession = array(
							'loginStudant' => true,
							'studentid'=>  $student[0]['id']
						);

						$session->set($dataSession);
						return redirect()->to('Home/index');
					}
					else
					{
						$dataSession = array(
							'loginStudant' => false
						);
						$session->set($dataSession);
						return $this->loadTemplate('login','Login',['validation'=>\config\Services::validation()],['user/user.css']);
					}
				} 
				else if(!empty($admin)) 
				{
					
					if(password_verify( $this->request->getPost('password'),$admin[0]['password']))
					{
						$dataSession = array(
							'loginAdmin' => true,
							'Adminid'=>  $admin[0]['id'],
							'firstname'=>  $admin[0]['firstname'],
							'lastname'=>  $admin[0]['lastname']

						);
						$session->set($dataSession);
						return redirect()->to('/Admin/Home');

					} 
				}
				

			}
		}
	}
	else 
	{
		return $this->loadTemplate('login','Login',['validation'=>\config\Services::validation()],['user/user.css']);

	}
}

/**
 * logout of student and admin
 *
 * @return void
 */
function logout(){
	$session = session();
	$dataSession = array(
		'loginAdmin' => false,
		'loginStudant' => false,
		'Adminid'=>  null,
		'studentid'=>  null

	);
	$session->set($dataSession);
	// session_write_close();
	$session->destroy();
	return redirect()->to('/');
}


	/**
	 *  ForgotPassword to reset password
	 *
	 * @return void
	 */
function forgotPassword(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$session = session();
		$data = array(
			'changePassword'=>false,
			'addSymbol'=>false,
			'checkEmail'=>false
		);
		$session->set($data);
		$validate=$this->validate
		([
            'email' => 'valid_email|min_length[5]|max_length[30]'
		]);
		if (!$validate)
		{
			return $this->loadTemplate('forgotPassword','Forgot Password',['validation'=>\config\Services::validation()],['user/user.css']);
		}
		else
		{
			$model = new StudentsModel();
			$data = 
			[
				'email'=> $this->request->getPost('email'),
			];
			$result=$model->selectByEmail($data);
			if (empty($result)) {
				return $this->loadTemplate('forgotPassword','Forgot Password',['validation'=>\config\Services::validation()],['user/user.css']);
			} else {
				if ($result[0]['is_active']==0) {
					return $this->loadTemplate('forgotPassword','Forgot Password',['validation'=>\config\Services::validation()],['user/user.css']);
				} else {
					$data = array(
						'checkEmail'=>true,
						'email' => $result[0]['email'],
						'fname' =>$result[0]['firstname'],
						'lname'=>$result[0]['lastname']
					);
					$session->set($data);
                    return redirect()->to('Users/sendEmail');
					// return redirect()->to('Admin/Students');
				}
			}
			
		}
	}
	else 
	{
		return $this->loadTemplate('forgotPassword','Forgot Password',['validation'=>\config\Services::validation()],['user/user.css']);
	}	
}


/**
 * to send email to reset password 
 *
 * @return void
 */
 function sendEmail()
{
	$session = session();
	if (!$session->get('checkEmail')) {
		return redirect()->to('Users/forgotPassword');
	}
	$email = \Config\Services::email();
	$email->setTo($session->get('email'));
	$symbol = random_int(100000,999999);
	$message = 'Hello '.$session->get('fname').' '.$session->get('lname').', enter this symbol <label>'."$symbol".'</label> in ordar to change the password';
	$email->setSubject('Check Email');
	$email->setMessage($message);
	if ($email->send()) {
		$data = array(
			'symbol'=>$symbol,
			'changePassword'=>true,
			'checkEmail'=>false

		);
		$session->set($data);
		return redirect()->to('Users/checksymbol');
	} else {
		return redirect()->to('Users/forgotPassword');
	}
}

 function checksymbol(){
	$session = session();
	if (!$session->get('changePassword')) {
		return redirect()->to('Users/forgotPassword');
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$validate=$this->validate
		([
            'symbol' => 'is_natural_no_zero|min_length[6]|max_length[6]'
		]);
		if (!$validate)
		{
			return $this->loadTemplate('addSymbol','Forgot Password',['validation'=>\config\Services::validation()],['user/user.css']);
		}
		else
		{
			$addsymbol =  $this->request->getPost('symbol');
			if ($addsymbol==$session->get('symbol')) {
				$data = array(
					'addSymbol'=>true,
					'changePassword'=>false
				);

				$session->set($data);
				return redirect()->to('Users/newPassword');

			} else {
				return $this->loadTemplate('addSymbol','Forgot Password',['validation'=>\config\Services::validation()],['user/user.css']);
			}
			
		}
	}
	else 
	{
		return $this->loadTemplate('addSymbol','Forgot Password',['validation'=>\config\Services::validation()],['user/user.css']);
	}
}
/**
 * create new Password
 *
 * @return void
 */
 function newPassword(){

	$session = session();
	if (!$session->get('addSymbol')) {
		return redirect()->to('Users/forgotPassword');
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$validate=$this->validate
		([
			'password'             => 'required|min_length[8]|max_length[16]',
			'passwordConfirmation' => 'required|matches[password]',
		]);
		if (!$validate)
		{
			return $this->loadTemplate('changePassword','Change Password',['validation'=>\config\Services::validation()],['user/user.css']);
		}
		else
		{

			$model = new StudentsModel();
			$passwordHash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
			$data = 
			[
				'password'  => $passwordHash,
			];
			$model->updateStudentByEmil($session->get('email'),$data);	
			$data = array(
				'addSymbol'=>false,
			);
			$session->set($data);
			return redirect()->to('Users/login');
		}
	}
	else 
	{
		return $this->loadTemplate('changePassword','Change Password',['validation'=>\config\Services::validation()],['user/user.css']);
	}
}
}


