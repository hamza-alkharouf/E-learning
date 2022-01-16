<?php
namespace App\Libraries;

class CheckLogin{
    public static function checkLogin($content){

    
<<<<<<< HEAD
		if (!session()->get('loginAdmin')) {
			return redirect()->to('Users/login');
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
=======
		$session = session();
		print_r("<br><br><br><br>");
        print_r($session->get('loginAdmin'));
		if ($session->get('loginAdmin')==null or $session->get('loginAdmin')==false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
>>>>>>> 8bd1959752dcbfb07f47e1b5f105ceed752a2469
           
		}else{
			echo view('admin/layout/app', $content);

		 }

    }
<<<<<<< HEAD
	public static function checkLoginStudent($content){
		if (session()->get('loginAdmin')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}else{
			
			echo view('layout/app', $content);

		 }

    }

	
=======
>>>>>>> 8bd1959752dcbfb07f47e1b5f105ceed752a2469
}
?>