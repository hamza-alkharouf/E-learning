<?php
namespace App\Controllers\Admin;
use App\Models\StudentsModel;
use App\Models\EnrollmentsModel;
class Students extends BaseController{

/**
 * index page Students
 *
 * @return void
 */
public function index()
{
    $model = new StudentsModel();
    $data = [
        'Students' => $model->getListStudents(15),
        'pager' => $model->pager,
    ];
    $this->loadTemplate('students/index','Students',$data,['admin/index.css']);
}

/**
 * add Students
 *
 * @return void
 */
public function add()
{
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $validate=$this->validate
        ([
            'lastname'             => 'required|alpha_numeric|min_length[3]|max_length[30]',
            'firstname'            => 'required|alpha_numeric|min_length[3]|max_length[30]',
            'password'             => 'required|min_length[8]|max_length[16]',
            'passwordConfirmation' => 'required|matches[password]',
            'email'                => 'valid_email|is_unique[Students.email]|is_unique[Admins.email]|min_length[5]|max_length[30]'
        ]);
        if (!$validate)
        {
            $this->loadTemplate('students/add','Add Student',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css']);
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
            ];
            $model->insertStudents($data);
            return redirect()->to('Admin/Students');
        }
    }
    else 
    {
        $this->loadTemplate('students/add','Add Student',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css']);
    }
    
}
/**
 * ban Student
 *
 * @param int $id
 * @return void
 */
public function ban($id){
    $model = new StudentsModel();
    $data = $model->selectById($id);
    if ($data['is_active']==1) {
        $active['is_active']=0;
        session()->set($active);
        $data = $model->ban($id,$active);
    } 
    else 
    {
        $active['is_active']=1;
        $data = $model->ban($id,$active);    
    }
    return redirect()->to('Admin/Students');
    
}
/**
 * delete Students
 *
 * @param int $id
 * @return void
 */
public function delete($id)
{
        $model = new StudentsModel();
        $model->deleteStudent($id);
        $modelEnrollment = new EnrollmentsModel();
        $modelEnrollment->deleteEnrollmentbyStudentId($id);
        return redirect()->to('Admin/Students');
}

/**
 * update Students
 *
 * @param int $id
 * @return void
 */
public function update($id)
{                
    $model = new StudentsModel();
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
                    'email'                => "valid_email|is_unique[Students.email,id,$id]|is_unique[Admins.email]|min_length[5]|max_length[30]"
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
                    'email'       => "valid_email|is_unique[Students.email,id,$id]|is_unique[Admins.email]|min_length[5]|max_length[30]",
                ]);
                    
            }
            if (!$validate)
            {
                $data = $model->selectById($id);
                $this->loadTemplate('students/update','Update Student',['validation'=>\config\Services::validation(),'student'=>$data],['admin/addAndUpdate.css']);
            }
            else
            {                
                $data['firstname'] = $this->request->getPost('firstname');
                $data['lastname'] = $this->request->getPost('lastname');
                $data['email'] = $this->request->getPost('email');
                $model->updateStudent($id,$data);
                return redirect()->to('Admin/Students');
            }
    }
    else 
    {
        $data = $model->selectById($id);
        $this->loadTemplate('students/update','Update Student',['validation'=>\config\Services::validation(),'student'=>$data],['admin/addAndUpdate.css']);
    }
}
}

?>