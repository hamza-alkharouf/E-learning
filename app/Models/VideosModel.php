<?php 
namespace App\Models;

use CodeIgniter\Model;
class VideosModel extends Model{
    protected $table = 'videos';
    /**
     * select  videos by id Course
     *
     * @param [type] $id
     * @return array
     */
     /**
  * get Row Videos
  *
  *
  * @return int
  */
  function getRowVideos(){
    $db = \Config\Database::connect();
    $builder = $db->table('videos');         
    return $builder->countAll();
}

/**
 * select By Id Videos
 *
 * @param int $id
 * @return void
 */
    function selectByIdVideos($id)
    {
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('videos');
        $data = $builder->Where('id_course', $id)->get()->getResultArray();
        return $data;
    }
    /**
     * select Name And Video Duration By Id Videos
     *
     * @param [type] $id
     * @return void
     */
    function selectNameByIdVideos($id)
    {
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('videos');
        $builder->select('name,videoDuration');
        $data = $builder->Where('id_course', $id)->get()->getResultArray();
        return $data;
    }
    //selectFirstNameByIdVideos

    function selectFirstNameByIdVideos($id)
    {
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('videos');
        $builder->select('name,videoDuration');
        $data = $builder->Where('id_course', $id)->get()->getFirstRow('array');
        return $data;
    }

    /**
     * select  videos by id Course
     *
     * @param int $id
     * @return array
     */

    function numerPaginateVideos($id,$numerPaginate)
    {
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        return $this->Where('id_course', $id)->paginate($numerPaginate);
    }


  /**
     *delete video by Course id
     *
     * @param int $id Course
     * @return void
     */
    function deletevideobyCourseId($id)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('videos');
        $builder->where('id_course', $id)->delete();
    }

    /**
     *delete video by id
     *
     * @param int $id
     * @return void
     */
    function deletevideo($id)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('videos');
        $builder->where('id', $id);
        $builder->delete();
    }

    /**
     *get  path Video by id
     *
     * @param int $id
     * @return array path
     */
    function pathAndNameVideo($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('videos');
        $builder->select('path,name');
        $builder->where('id', $id);
        $pathVideo = $builder->get()->getResultArray()[0];
        return $pathVideo;
    }
    
    /**
     * Create a new  Videos
     *
     * @param  array $data
     * @return void
     */
    //Videos model
    function insertVideos($data)
    {     
        $db = \Config\Database::connect();
        $db->table('videos')->insert($data);
    }
    /**
     * get Videos From Primary
     *
     * @param int $id
     * @return array
     */
    function getVideosFromPrimary ($id)
    {     
        $db = \Config\Database::connect();
        
        // Set the table property

        $builder = $this->db->table("videos");
        $builder->where('id', $id);
        $data = $builder->get()->getResultArray();
        return $data;

    }
       /**
     * update Video by id
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    function updateVideo($id,$data)
    {
       
        //Connection object
        $db = \Config\Database::connect();
        // Set the table property
        $builder = $db->table('videos');
        $builder->where('id', $id);
        $builder->update($data);
    }
    /**
     * get videos by id course
     *
     * @param int $id
     * @return array
     */
    function getvideos($id)
    {     
        $db = \Config\Database::connect();
        
        // Set the table property

        $builder = $this->db->table("videos");
        $builder->where('id_course', $id);
        $data = $builder->get()->getResultArray();
        return $data;

    }

}
    
?>