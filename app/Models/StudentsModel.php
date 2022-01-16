<?php 
namespace App\Models;

use CodeIgniter\Model;


class StudentsModel extends Model{
    protected $table = 'Students';
    /**
     * Create a new student
     *
     * @param array $data
     * @return array
     */
    function insertStudents($data){
        $db = \Config\Database::connect();
        $builder = $db->table('Students');
        $builder->insert($data);
    }

 /**
  * get Row Students
  *
  *
  * @return int
  */
  function getRowStudents(){
    $db = \Config\Database::connect();
    $builder = $db->table('Students');         
    return $builder->countAll();
}
 /**
  * Return student lists
  *
  * @param int $nb_paginate
  * @return array
  */
  function getListStudents($nb_paginate){
    $db = \Config\Database::connect();
    return  $this->paginate($nb_paginate);
}


    /**
     * delete row in database Student
     *
     * @param int $id
     * @return void
     */
    function deleteStudent($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Students');
        $builder->where('id', $id)->delete();
    }
    /**
     * Return Student by id
     *
     * @param int $id
     * @return array
     */
    public function selectById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Students');
        return $builder->Where('id', $id)->get()->getResultArray()[0];
    }

    /**
     * Return Student by email
     *
     * @param int $email
     * @return array
     */
    public function selectByEmail($email)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Students');
        return $builder->Where('email', $email)->get()->getResultArray();
    }

 /**
     * RUpdate student  by email
     *
     * @param int $email
     * @param array $data
     * @return void
     */
    public function updateStudentByEmil($email,$data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Students');
        return $builder->Where('email', $email)->update($data);
    }

    /**
     * Update student data
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    function updateStudent($id,$data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Students');
        $builder->where('id', $id)->update($data);
    }

     /**
     * ban student 
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    function ban($id,$data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Students');
        $builder->where('id', $id)->update($data);
    }

}
?>