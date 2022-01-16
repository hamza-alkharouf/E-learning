<?php
namespace App\Libraries;
use App\Models\SiteInfoModel;

class SiteInfoLibraries{
    public static function create(){
        $model = new SiteInfoModel();
            
        if(empty($model->getSiteinfo()) && empty($model->getSiteinfo()[1])){
        $logoWebSite = "favicon.ico";
        $data['image'] = $logoWebSite;
        $model->insertSiteInfo($data);
                
        $iconWebSite = "elearnIcon.PNG";
        $data['image'] = $iconWebSite;
        $model->insertSiteInfo($data);           
        }else{
            

        $data = [
            'logoWebSite' =>$model->getSiteinfo()[0]['image'],
            'iconWebSite' => $model->getSiteinfo()[1]['image'],
        ];
            return $data;
        }
    }
}
?>