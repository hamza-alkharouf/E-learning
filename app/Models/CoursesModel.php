<?php 
namespace App\Models;

use CodeIgniter\Model;
class CoursesModel extends Model{
    protected $table = 'courses';

    /**
     * Create a new Courses
     *
     * @param  array $data
     * @return void
     */
    function insertCourses($data){
        $db = \Config\Database::connect();
        $db->table('courses')->insert($data);
    }
     /**
  * get Row Courses
  *
  *
  * @return int
  */
  function getRowCourses(){
    $db = \Config\Database::connect();
    $builder = $db->table('courses');         
    return $builder->countAll();
}
/**
 * return courses order by created_at // DESC
 *
 * @param int $numerPaginate
 * @return void
 */
    function newCourses($numerPaginate){
        $db = \Config\Database::connect();
        $this->select('categories.name as categories_name ,courses.name as courses_name,courses.id as courses_id ,courses.description as courses_description ,
        courses.language_code as courses_language_code ,courses.image as courses_image');
        $this->join('categories', 'categories.id = courses.id_category');
        
        $this->orderBy('courses.created_at', 'DESC');
        $this->limit($numerPaginate); 
        return $this->get()->getResultArray();
    }

    /**
     * search of Course
     *
     * @param int $data
     * @param string $numerPaginate
     * @return void
     */
    function searchCourses($data,$numerPaginate){
        
        $db = \Config\Database::connect();
        $this->select('categories.name as categories_name ,courses.name as courses_name,courses.id as courses_id ,courses.description as courses_description ,
        courses.language_code as courses_language_code ,courses.image as courses_image');
        $this->join('categories', 'categories.id = courses.id_category');


        return $this->like('courses.name',$data, 'both')->paginate($numerPaginate);
    }

    /**
     * Select Courses By Id
     *
     * @param int $id
     * @return array
     */

     function selectById($id)
    {
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('courses');

        return $builder->Where('id', $id)->get()->getResultArray()[0];
    }

    
    /**
     * Select Courses By Category Id
     *
     * @param int $id
     * @return array
     */

    function selectByCategoryId($id)
    {
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('courses');
        $builder->select('id,image');
        return $builder->Where('id_category', $id)->get()->getResultArray();
    }

 

    /**
     * delete Courses by id
     *
     * @param int $id
     * @return void
     */
    function deleteCourses($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $builder->where('id', $id);
        $builder->delete();
    }

    /**
     * get Image
     *
     * @param int $id
     * @return string image
     */
    function getImage($id){
        //Connection object
        $db = \Config\Database::connect();

        // Set the table property
        $builder = $db->table('courses');
        $builder->where('id', $id);
        
        return $builder->select('image')->get()->getResultArray()[0]['image'];
    }
    /**
     * update Courses
     *
     * @param int $id
     * @param  array $data
     * @return void
     */
    function updateCourses($id,$data)
    {
       
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('courses');
        $builder->where('id', $id);
        $builder->update($data);
    }
    

    /**
     * Select By Idtow this is same above 
     *
     * @param int $id
     * @return array
     */
    function SelectByIdJoinCoursesAndCategory($id){
        
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('categories');
        $builder->select('categories.name as categories_name ,categories.id as categories_id,courses.name as courses_name,courses.id as courses_id ,courses.description as courses_description ,
        courses.language_code as courses_language_code ,courses.image as courses_image');
        $builder->join('courses', 'categories.id = courses.id_category');

        // SELECT * FROM users
        $reuslt = $builder->Where('courses.id', $id)->get()->getResultArray()[0];

        return $reuslt;
    }
/**
 * Select All By Id Join Courses And Category
 *
 * @param int $id
 * @param int $nb_paginate
 * @return void
 */
    function SelectAllByIdJoinCoursesAndCategory($id,$nb_paginate){
        $db = \Config\Database::connect();
        $this->select('categories.name as categories_name ,courses.name as courses_name,courses.id as courses_id ,courses.description as courses_description ,
        courses.language_code as courses_language_code ,courses.image as courses_image');
        $this->join('categories', 'categories.id = courses.id_category');

        return $this->Where('categories.id', $id)->paginate($nb_paginate);
    }
    
/**
 * join Between Courses And Category
 * @return array
 */
    function joinBetweenCoursesAndCategory($numerPaginate){
        $db = \Config\Database::connect();
        $this->select('categories.name as categories_name ,courses.name as courses_name,courses.id as courses_id ,courses.description as courses_description ,
        courses.language_code as courses_language_code ,courses.image as courses_image');
        $this->join('categories', 'categories.id = courses.id_category');

        return $this->paginate($numerPaginate);
    }

   



}

?>