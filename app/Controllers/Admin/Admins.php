<?php
namespace App\Controllers\Admin;
use App\Models\AdminsModel;
class Admins extends BaseController{
/**
 * index page admin
 *
 * @return void
 */
public function index()
{

    $model = new AdminsModel();
    $data = [
        'admins' => $model->getListAdmins(15),
        'pager' => $model->pager,
    ];
    $this->loadTemplate('admins/index','Admin',$data,['admin/index.css']);
}

/**
 * add admin
 *
 * @return void
 */
public function add()
{
     if($_SERVER['REQUEST_METHOD']=='POST')
     {
        $validate=$this->validate 
        ([
          'lastname'             => 'required|alpha_numeric|min_length[3]|max_length[30]',
          'firstname'            => 'required|alpha_numeric|min_length[3]|max_length[30]',
          'password'             => 'required|min_length[8]|max_length[16]',
          'passwordConfirmation' => 'matches[password]',
          'email'  => 'valid_email|is_unique[Admins.email]|is_unique[students.email]|min_length[5]|max_length[30]'
        ]);

        if (!$validate)
        {
            $this->loadTemplate('admins/add','Add Admin',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css']);
        }
        else 
        {
          $model = new AdminsModel();
          $passwordHash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
          $data = 
          [
            'firstname' => $this->request->getPost('firstname'),
            'lastname'  => $this->request->getPost('lastname'),
            'email'     => $this->request->getPost('email'),
            'password'  => $passwordHash,
          ];
              $model->insertAdmins($data);
              return redirect()->to('Admin/Admins');
        }
     }
     else 
     {
         $this->loadTemplate('admins/add','Add Admin',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css']);
     }
}
/**
 * delete admin
 *
 * @param int $id
 * @return void
 */
public function delete($id)
{
    $model = new AdminsModel();
    $model->deleteAdmins($id);
    return redirect()->to('Admin/Admins');
}

/**
 * update admin by id
 *
 * @param  int $id
 * @return void
 */
public function update($id)
{                
    $model = new AdminsModel();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(!empty($this->request->getPost('password'))) 
            {                   
                $validate=$this->validate
                ([
                    'lastname'             => 'required|alpha_numeric|min_length[3]|max_length[30]',
                    'firstname'            => 'required|alpha_numeric|min_length[3]|max_length[30]',
                    'password'             => 'required|min_length[8]|max_length[16]',
                    'passwordConfirmation' => 'matches[password]',
                    'email'                => "valid_email|is_unique[Admins.email,id,$id]|is_unique[students.email]|min_length[5]|max_length[30]"
                ]);
                $passwordHash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
                $data['password'] = $passwordHash;  
            }
            else 
            {
                $validate=$this->validate
                ([
                    'lastname'    => 'required|alpha_numeric|min_length[3]|max_length[30]',
                    'firstname'   => 'required|alpha_numeric|min_length[3]|max_length[30]',
                    'email'       => "valid_email|is_unique[Admins.email,id,$id]|is_unique[students.email]|min_length[5]|max_length[30]",
                ]);
                    
            }
            if (!$validate)
            {
                $data = $model->selectById($id);
                $this->loadTemplate('admins/update','Update Admin',['validation'=>\config\Services::validation(),'admins'=>$data],['admin/addAndUpdate.css']);
            }
            else
            {                
                $data['firstname'] = $this->request->getPost('firstname');
                $data['lastname'] = $this->request->getPost('lastname');
                $data['email'] = $this->request->getPost('email');
                $model->updateAdmins($id,$data);
                return redirect()->to('Admin/Admins');
            }
    }
    else 
    {
        $data = $model->selectById($id);
        $this->loadTemplate('admins/update','Update Admin',['validation'=>\config\Services::validation(),'admins'=>$data],['admin/addAndUpdate.css']);
    }
}
}



?>