<?php namespace App\Controllers\Admin;

use App\Models\ContactInfoModel;
use App\Models\socialMediaModel;
class ContactInfo extends BaseController{

/**
 * index page ContactInfo
 *
 * @return void
 */
public function index()
{
    $model = new ContactInfoModel();
    $data['contact'] = $model->getContact(); 
    $this->loadTemplate('contact/index','Contact Info',$data,['contact/index.css']);
}
/**
 * add ContactInfo
 *
 * @return void
 */
public function add()
{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $validate=$this->validate
        ([
            'Address'   => 'required|alpha_numeric|min_length[3]|max_length[200]',
            'Phone'     => 'is_natural|min_length[5]|max_length[25]',
            'email'     => 'valid_email|min_length[5]|max_length[150]'
        ]);
        if (!$validate)
        {
            $this->loadTemplate('contact/add','Add Contact',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css']);
        }
        else
        {
            $model = new ContactInfoModel();
            $data = 
            [
                'Address'   => $this->request->getPost('Address'),
                'Phone'     => $this->request->getPost('Phone'),
                'email'     => $this->request->getPost('email'),
            ];
            $model->insertContact($data);
            return redirect()->to('Admin/ContactInfo');
        }
    }
    else 
    {
        $this->loadTemplate('contact/add','Add Contact',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css']);
    }
    
}
/**
 * delete ContactInfo and Socil Media by id
 *
 * @param int $id
 * @return void
 */
public function delete($id)
{
        $model = new ContactInfoModel();
        $model->deleteContact($id);
        $modelMedia = new socialMediaModel();
        $modelMedia->deleteSocialMediaUseIdContact($id);
        return redirect()->to('Admin/ContactInfo');
}
/**
 * update ContactInfo by id
 *
 * @param int $id
 * @return void
 */
public function update($id)
{
    $model = new ContactInfoModel();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $validate=$this->validate
        ([
            'Address'   => 'required|alpha_numeric|min_length[3]|max_length[200]',
            'Phone'     => 'is_natural|min_length[5]|max_length[25]',
            'email'     => 'valid_email|min_length[5]|max_length[150]'
        ]);
        if (!$validate)
        {
            $data = $model->selectById($id);
            $this->loadTemplate('contact/update','Update Contact',['validation'=>\config\Services::validation(),'contact'=>$data],['admin/addAndUpdate.css']);
        }
        else
        {
            $data = 
            [
                'Address' => $this->request->getPost('Address'),
                'Phone'   => $this->request->getPost('Phone'),
                'email'   => $this->request->getPost('email'),
            ];
            $model->updateContact($id,$data);
            return redirect()->to('Admin/ContactInfo');
        }
    }
    else 
    {
        $data = $model->selectById($id);
        $this->loadTemplate('contact/update','Update Contact',['validation'=>\config\Services::validation(),'contact'=>$data],['admin/addAndUpdate.css']);
    }
}

}