<?php 
namespace App\Models;

use CodeIgniter\Model;
class socialMediaModel extends Model{
    protected $table = 'socialmedia';
  /**
     * Create a new Social Media
     *
     * @param array $data
     * @return void
     */
    function insertSocialMedia($data){
        $db = \Config\Database::connect();
        $builder = $db->table('socialmedia');
        $builder->insert($data);
    }
 /**
     * Return Social Media
     *
     * @return array Students
     */
    function getSocialMedia($nb_paginate){
        $db = \Config\Database::connect();
        return  $this->paginate($nb_paginate);
    }
    /**
     * get Social in public webiste
     *
     * @return void
     */
    function getSocial(){
        $db = \Config\Database::connect();
        $builder = $db->table('socialmedia');
        return  $builder->get()->getResultArray();
    }


    /**
     * delete row in database Social Media
     *
     * @param int $id
     * @return void
     */
    function deleteSocialMedia($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('socialmedia');
        $builder->where('id', $id)->delete();
    }
    /**
     * delete row in Social Media use id Contact info
     *
     * @param int $id
     * @return void
     */
    function deleteSocialMediaUseIdContact($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('socialmedia');
        $builder->where('ContactInfoId', $id)->delete();
    }
    
        /**
     * Return Social Media by id
     *
     * @param int $id
     * @return array
     */
    public function SelectById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('socialmedia');
        return $builder->Where('id', $id)->get()->getResultArray()[0];
    }
 
    /**
     * update Social Media
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    function updateSocialMedia($id,$data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('socialmedia');
        $builder->where('id', $id)->update($data);
    }
}

?>