<?php namespace App\Controllers\Admin;

use App\Models\SiteInfoModel;

class SiteInfo extends BaseController{


    /**
     * index
     *
     * @return void
     */
 
    public function index(){
        
        $model = new SiteInfoModel();
        $logoWebSite = $model->getSiteinfo()[0];
        $iconWebSite = $model->getSiteinfo()[1]; 
        $this->loadTemplate('SiteInfo/siteInfo','Site Info',['validation'=>\config\Services::validation(),'logoWebSite'=>$logoWebSite,'iconWebSite'=>$iconWebSite]);

    } 

    /**
     * edit Site info Icon
     *
     * @param [type] $id
     * @return void
     */

    public function editSiteinfoIcon($id){
        $model = new SiteInfoModel();
        $logoWebSite = $model->getSiteinfo()[0];
        $iconWebSite = $model->getSiteinfo()[1];

         if($_SERVER['REQUEST_METHOD']=='POST')
        {

            
            $validate=$this->validate
                ([
                     'image' => [
                         'uploaded[image]',
                         'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                         'max_size[image,4096]',
                         
                        ]
                    ]);
                    if (!$validate)
                    {
                        $this->loadTemplate('SiteInfo/siteInfo','Site Info',['validation'=>\config\Services::validation(),'logoWebSite'=>$logoWebSite,'iconWebSite'=>$iconWebSite]);
                    }else{
                        $id_editSiteInfo = $model->SelectById($id);
                        $oldImage = $id_editSiteInfo['image'];
                        if($img = $this->request->getFile('image')){
    
                            if ($img->isValid() && ! $img->hasMoved())
                            {
                                if(file_exists('assets/adminImage/'.$oldImage)){
                                    unlink('assets/adminImage/'.$oldImage);
            
                                }
        
                                $RandomName = $img->getRandomName();
                                $img->move('assets/adminImage/', $RandomName);
                                $data['image'] = $RandomName;
                            } 
                            
        
                        }else{
                            $data['image'] = $oldImage;
        
                        }
                        $model->updateSiteInfo($id,$data);
                        return redirect()->to('Admin/SiteInfo');
                        echo "ok";


         }       	
                    
            $this->loadTemplate('SiteInfo/siteInfo','Site Info',['validation'=>\config\Services::validation(),'logoWebSite'=>$logoWebSite,'iconWebSite'=>$iconWebSite]);

        }else{
            $this->loadTemplate('SiteInfo/siteInfo','Site Info',['validation'=>\config\Services::validation(),'logoWebSite'=>$logoWebSite,'iconWebSite'=>$iconWebSite]);
        }
    } 

}