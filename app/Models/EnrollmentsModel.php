<?php 
namespace App\Models;

use CodeIgniter\Model;
class EnrollmentsModel extends Model{

    protected $table = 'enrollment';
    /**
     * Return pending requests
     *
     * @return array
     */
    function getPending($nb_paginate){
        $db = \Config\Database::connect();
        $this->select('enrollment.id,courses.name,students.firstname,students.lastname');
        $this->join('courses', 'courses.id = enrollment.courseId');
        $this->join('students', 'students.id = enrollment.studentid');
        return $this->where('pending', 1)->paginate($nb_paginate);
    }


        /**
     * Return pending requests
     *
     * @return array
     */
    function getPendingbyId($id){
        $db = \Config\Database::connect();
        $builder = $db->table('enrollment');
        $builder->select('students.email,courses.name,students.firstname,students.lastname');
        $builder->join('courses', 'courses.id = enrollment.courseId');
        $builder->join('students', 'students.id = enrollment.studentid');
        return $builder->where('enrollment.id', $id)->get()->getResultArray()[0];
    }

    /**
     * number fo count pending 
     *
     * @return void
     */
    function countPending(){
        $db = \Config\Database::connect();
        $builder = $db->table('enrollment');
        $builder->selectCount('pending');
        $builder->Where(['pending'=> 1]);
        print_r($builder->get()->getResultArray()[0]['pending']);
    }
    /**
     * number fo count Reject 
     *
     * @return int
     */
    function countReject($id){
        $db = \Config\Database::connect();
        $builder = $db->table('enrollment');
        $builder->selectCount('pending');
        $builder->Where(['pending'=> 0,'enable'=>0,'studentId'=>$id]);
        return $builder->get()->getResultArray()[0]['pending'];
    }

   /**
    * select Enrollment by id Student and  id course
    *
    * @param int $idStudnt
    * @param int $idCourse
    * @return array
    */
    function selectEnrollmentbyIdStudentAndCourse($idStudnt,$idCourse){
        $db = \Config\Database::connect();
        $builder = $db->table('enrollment');
        $builder->select('enable');
        return $builder->Where(['studentId	'=> $idStudnt,'courseId'=>$idCourse])->get()->getResultArray();
    }

    /**
     * Return Reject requests
     *
     * @param int $id Student id
     * @param int $nb_paginate
     * @return array
     */
    function getReject($id,$nb_paginate){
        $db = \Config\Database::connect();
        $this->select('enrollment.id,enrollment.studentId,courses.name,students.firstname,students.lastname');
        $this->join('courses', 'courses.id = enrollment.courseId');
        $this->join('students', 'students.id = enrollment.studentid');
        return $this->Where(['pending'=> 0,'enable'=>0,'students.id'=>$id])->paginate($nb_paginate);
    }

  /**
     * Return Accept requests
     *
     * @param int $id Student id
     * @param int $nb_paginate
     * @return array
     */
    function getAccept($id,$nb_paginate){
        $db = \Config\Database::connect();
        $this->select('enrollment.id,enrollment.studentId,courses.name,students.firstname,students.lastname');
        $this->join('courses', 'courses.id = enrollment.courseId');
        $this->join('students', 'students.id = enrollment.studentid');
        return $this->Where(['pending'=> 0,'enable'=>1,'students.id'=>$id])->paginate($nb_paginate);
    }
    /**
     * Create a new Enrollment
     *
     * @param array $data
     * @return void
     */
    function insertEnrollment($data){
        $db = \Config\Database::connect();
        $builder = $db->table('enrollment');
        $builder->insert($data);
    }

        /**
     * Update Enrollment data
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    function updateEnrollment($id,$data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('enrollment');
        $builder->where('id', $id)->update($data);
    }

    /**
     * delete Enrollment
     *
     * @param int $id
     * @return void
     */
    function deleteEnrollment($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('enrollment');
        $builder->where('id', $id)->delete();
    }

    /**
     * delete Enrollment by Student id
     *
     * @param int $id Student id
     * @return void
     */
    function deleteEnrollmentbyStudentId($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('enrollment');
        $builder->where('studentId', $id)->delete();
    }
    
}
?>