<?php 
namespace App\Models;

use CodeIgniter\Model;

class SiteInfoModel extends Model{
    /**
     * insert Courses
     *
     * @param  $data
     * @return void
     */
    function insertSiteInfo($data){
        $db = \Config\Database::connect();
        $db->table('siteinfo')->insert($data);
    }


    /**
     * get Site info
     *
     * @return array
     */
    function getSiteinfo(){
        $db = \Config\Database::connect();
        $builder = $db->table('siteinfo');
        return $builder->get()->getResultArray();
    }

    /**
     * Select By Id
     *
     * @param int $id
     * @return array
     */
    public function selectById($id)
    {
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('siteinfo');

        return $builder->Where('id', $id)->get()->getResultArray()[0];
    }






    /**
     * update Courses
     *
     * @param int $id
     * @param  $data
     * @return void
     */
    function updateSiteInfo($id,$data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('siteinfo');
        $builder->where('id', $id);
        $builder->update($data);
    }

}
?>