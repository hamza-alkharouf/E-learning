<?php namespace App\Controllers\Admin;

use App\Models\socialMediaModel;
class SocialMedia extends BaseController{

/**
 * index page Social Media
 *
 * @param int $id
 * @return void
 */
public function index($id)
{
    $model = new socialMediaModel();
    $data = 
    [
        'contactId'=>$id,
        'socialMedias' => $model->getSocialMedia(6),
        'pager' => $model->pager,
    ];
    $this->loadTemplate('socialMedia/index','Social Media',$data,['socialMeadia/index.css']);
}
/**
 * add Social Media
 *
 * @param int $id contact info
 * @return void
 */
public function add($id)
{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if ($this->request->getPost('name')== 'other') 
        {
            $validate=$this->validate
            ([
                'link'   => 'required|valid_url|min_length[12]|max_length[250]',
                'name'   => 'is_unique[socialmedia.name]',
                'other'  => 'min_length[3]|max_length[20]',
            ]);
        }
        else
        {
            $validate=$this->validate
            ([
                'link'   => 'required|valid_url|min_length[12]|max_length[250]',
                'name'   => 'in_list[Facebook,Twitter,YouTube,Instagram,LinkedIn,other]|is_unique[socialmedia.name]',
            ]);
        }
    
        if (!$validate)
        {
            $this->loadTemplate('SocialMedia/add','Add Social Media',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css'],['socialMedia/SocialMedias.js']);
        }
        else
        {
            $model = new socialMediaModel();
            $data = 
            [
                'link' => $this->request->getPost('link'),
                'ContactInfoId'=>$id, 
            ];
            if ($this->request->getPost('name')== 'other') {
                $data['name'] = $this->request->getPost('other');
            } 
            else 
            {
                $data['name'] = $this->request->getPost('name');
            }  
            $model->insertSocialMedia($data);
            return redirect()->to('Admin/SocialMedia/index/'.$id);
        }
    }
    else 
    {
        $this->loadTemplate('SocialMedia/add','Add Social Media',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css'],['socialMedia/SocialMedias.js']);
    }
    
}

/**
 * delete Social Media
 *
 * @param int $contactId
 * @param int $id
 * @return void
 */
public function delete($contactId,$id)
{
        $model = new socialMediaModel();
        $model->deleteSocialMedia($id);
        return redirect()->to('Admin/SocialMedia/index/'.$contactId);
}

/**
 * update Social Media
 *
 * @param int $contactId
 * @param int $id
 * @return void
 */
public function update($contactId,$id)
{
    $model = new socialMediaModel();           
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if ($this->request->getPost('name')== 'other') 
        {
            $validate=$this->validate
            ([
                'link'   => 'required|valid_url|min_length[12]|max_length[250]',
                'name'   => "is_unique[socialmedia.name,id,$id]",
                'other'  => 'min_length[3]|max_length[20]',
            ]);
        }
        else
        {
            $validate=$this->validate
            ([
                'link'   => 'required|valid_url|min_length[12]|max_length[250]',
                'name'   => "in_list[Facebook,Twitter,YouTube,Instagram,LinkedIn,other]|is_unique[socialmedia.name,id,$id]",
            ]);
        }
        if (!$validate)
        {
            $data = $model->selectById($id);
            $medias = array("Facebook", "Twitter", "YouTube","Instagram","LinkedIn");
            if (($key = array_search($data['name'], $medias)) !== false) 
            {
                unset($medias[$key]);
            } 
            $this->loadTemplate('SocialMedia/update','Update Social Media',['validation'=>\config\Services::validation(),'socialMedias'=>$data, "medias"=>$medias],['admin/addAndUpdate.css'],['socialMedia/SocialMedias.js']);
        }
        else
        {
            $data['link'] = $this->request->getPost('link');
            if ($this->request->getPost('name')== 'other') {
                $data['name'] = $this->request->getPost('other');
            } 
            else 
            {
                $data['name'] = $this->request->getPost('name');
            }
            $model->updateSocialMedia($id,$data);
            return redirect()->to('Admin/SocialMedia/index/'.$contactId);
        }
        
    }
    else 
    {
        $data = $model->selectById($id);
        $medias = array("Facebook", "Twitter", "YouTube","Instagram","LinkedIn");
        if (($key = array_search($data['name'], $medias)) !== false) 
        {
            unset($medias[$key]);
        } 
        $this->loadTemplate('SocialMedia/update','Update Social Media',['validation'=>\config\Services::validation(),'socialMedias'=>$data, "medias"=>$medias],['admin/addAndUpdate.css'],['socialMedia/SocialMedias.js']);
    }
}

}