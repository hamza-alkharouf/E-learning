<?php 
namespace App\Models;
use CodeIgniter\Model;

class AdminsModel extends Model{
    protected $table = 'Admins';

 /**
  * Return admin lists
  *
  * @param int $nb_paginate
  * @return array
  */
  function getListAdmins($nb_paginate){
    $db = \Config\Database::connect();
    return  $this->paginate($nb_paginate);
}

    /**
     * Create a new admin
     *
     * @param array $data
     * @return void
     */
    function insertAdmins($data){
        $db = \Config\Database::connect();
        $builder = $db->table('Admins');
        $builder->insert($data);

    }

     /**
  * get Row Admins
  *
  *
  * @return int
  */
  function getRowAdmins(){
    $db = \Config\Database::connect();
    $builder = $db->table('Admins');         
    return $builder->countAll();
}
    /**
     *  Delete Admins
     *
     * @param int $id
     * @return void
     */
    function deleteAdmins($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Admins');         
        $builder->where('id', $id)->delete();
    }

    /**
     * Return Admin by email
     *
     * @param int $email
     * @return array
     */
    public function selectByEmail($email)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Admins');
        return $builder->Where('email', $email)->get()->getResultArray();
    }
    /**
     * Return Admins by id
     *
     * @param int $id
     * @return array
     */
    public function selectById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Admins');       
        return  $builder->Where('id', $id)->get()->getResultArray()[0];
    }
    
    /**
     * Update Admins data
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    function updateAdmins($id,$data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Admins');        
        $builder->where('id', $id)->update($data);
    }
}
?>