<?php 
namespace App\Models;
use CodeIgniter\Model;
class ContactInfoModel extends Model{
    
    public function __construct(){
        $db= \Config\Database::connect();
        $this->builder = $db->table('contactinfo');
    }

/**
 * Create a new Contact
 *
 * @param array $data
 * @return void
 */
    function insertContact($data){   
        $this->builder->insert($data);
    }
    
    /**
     * return Contact
     *
     * @return array
     */
    function getContact(){
        return $this->builder->get()->getResultArray();
    }
    
    /**
     * delete row Contact by id
     *
     * @param int $id
     * @return void
     */
    function deleteContact($id)
    {
        $this->builder->where('id', $id)->delete();
    }

    /**
     * Return Contact by id
     *
     * @param int $id
     * @return array
     */
    public function selectById($id)
    {
        return $this->builder->Where('id', $id)->get()->getResultArray()[0];
    }
 
    /**
     * update Contact
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    function updateContact($id,$data)
    {
        $this->builder->where('id', $id)->update($data);
    }
}

?>