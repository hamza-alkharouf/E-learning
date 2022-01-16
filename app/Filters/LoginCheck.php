<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('loginAdmin')) {
            
			return redirect()->to('Users/login');
		}
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

        if (session()->has('is_active')) {
            $session = session();
            $dataSession = array(
                'loginStudant' => false,
                'studentid'=>  null
        
            );
            $session->set($dataSession);
            $session->destroy();
            return redirect()->to('/');

		}
    }
}