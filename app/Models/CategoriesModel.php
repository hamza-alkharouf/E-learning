<?php 
namespace App\Models;

use CodeIgniter\Model;


class CategoriesModel extends Model{
    protected $table = 'Categories';
    /**
     * Create a new category
     *
     * @param array $data
     * @return void
     */
    function insertCategory($data){
        $db = \Config\Database::connect();
        $builder = $db->table('Categories');
        $builder->insert($data);
    }

     /**
  * get Row Categories
  *
  *
  * @return int
  */
  function getRowCategories(){
    $db = \Config\Database::connect();
    $builder = $db->table('Categories');         
    return $builder->countAll();
}
    /**
     * get List Categories
     *
     * @param int $nb_paginate
     * @return array
     */
    function getListCategories($nb_paginate)
    {
        $db = \Config\Database::connect();
        return  $this->paginate($nb_paginate);
    }

    /**
     * get Categories
     *
     * @return array
     */
    function getCategories()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Categories');
        return $builder->get()->getResultArray();
    }

    /**
     * delete Category
     *
     * @param int $id
     * @return void
     */
    function deleteCategory($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Categories');
        $builder->where('id', $id)->delete();
    }
    
    /**
     * Return category by id
     *
     * @param int $id
     * @return array
     */
    public function selectById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Categories');
        return $builder->Where('id', $id)->get()->getResultArray()[0];
    }
    /**
     * Update categorydata
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    function updatecategory($id,$data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Categories');
        $builder->where('id', $id)->update($data);
    }
}
?>