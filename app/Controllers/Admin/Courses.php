<?php

namespace App\Controllers\Admin;

use App\Models\CoursesModel;
use App\Models\VideosModel;
use App\Models\CategoriesModel;

class Courses extends BaseController
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $model = new CoursesModel();

            $data = [
                'courses' => $model->joinBetweenCoursesAndCategory(10),
                'pager' => $model->pager,
            ];
        
        $this->loadTemplate('Courses/index', 'Courses', $data, ['admin/index.css']);
    }

    /**
     * add Courses
     *
     * @return void
     */
    public function addCourses()
    {
        $model = new CoursesModel();
        $modelCategoryes = new CategoriesModel();
        $data = $modelCategoryes->getCategories();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $validate = $this->validate([
                'namecourse'             => 'required|min_length[3]|max_length[100]|alpha_numeric_space|is_unique[courses.name]',
                'description'            => 'required|min_length[5]|max_length[200]|alpha_numeric_space',
                'Language'               => 'required',
                'id_category'               => 'required',
                'image' => [
                    'uploaded[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[image,4096]',
                ]
            ]);
            if (!$validate) {
                $this->loadTemplate('Courses/addCourses', 'Add Courses', ['validation' => \config\Services::validation(), 'categoryes' => $data], ['admin/addAndUpdate.css']);
            } else {



                if ($img = $this->request->getFile('image')) {

                    if ($img->isValid() && !$img->hasMoved()) {
                        $originalName = $img->getRandomName();
                        $img->move('assets/uploads/', $originalName);
                    }
                } else {
                    $this->loadTemplate('Courses/addCourses', 'Add Courses', ['validation' => \config\Services::validation(), 'categoryes' => $data], ['admin/addAndUpdate.css']);
                }


                $data =
                    [
                        'name' => $this->request->getPost('namecourse'),
                        'description'  => $this->request->getPost('description'),
                        'language_code'     => $this->request->getPost('Language'),
                        'id_category'     => $this->request->getPost('id_category'),

                        'image' => $originalName
                    ];

                $model->insertCourses($data);

                return redirect()->to('Admin/Courses');
            }
        } else {
            $this->loadTemplate('Courses/addCourses', 'Add Courses', ['validation' => \config\Services::validation(), 'categoryes' => $data], ['admin/addAndUpdate.css']);
        }
    }

    /**
     * view Course you ara choose between Courses
     *
     * @param [type] $id
     * @return void
     */
    public function view($id)
    {

        $model = new CoursesModel();
        $modelVideos = new VideosModel();
        $data = $model->selectByIdJoinCoursesAndCategory($id);

        $idVideos = $modelVideos->numerPaginateVideos($id, 6);
        $pager = $modelVideos->pager;

        $this->loadTemplate('Courses/view', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager, 'course' => $data, 'videos' => $idVideos], ['courses/Coursesview.css']);
    }

    /**
     * delete Course
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $model = new CoursesModel();
        $modelVideos = new VideosModel();
        $idVideos = $modelVideos->selectByIdVideos($id);
        $courses = $model->selectById($id);

        $model->deleteCourses($id);
        foreach ($idVideos as $idVideo) {

            $modelVideos->deletevideo($idVideo['id']);
            $path = $idVideo['path'];
            if (file_exists('assets/videos/' . $path)) {
                unlink('assets/videos/' . $path);
            }
        }
        if (file_exists('assets/uploads/' . $courses['image'])) {
            unlink('assets/uploads/' . $courses['image']);
        }


        return redirect()->to('Admin/Courses');
    }

    /**
     * edit Course
     *
     * @param [type] $id
     * @return void
     */
    public function editting($id)
    {
        $model = new CoursesModel();
        $data = $model->selectById($id);

        $modelCategoryes = new CategoriesModel();
        $dataOfCategory = $modelCategoryes->getCategories();
        $i = 0;
        $count = 0;
        foreach ($dataOfCategory as $Category) {
            if (($key = array_search($data['id_category'], $Category)) !== false) {
                $count = $dataOfCategory[$i]['id'];
            }
            $i++;
        }
        $dataOfCategoryById = $modelCategoryes->selectById($count);


        $lang = array("en", "ar");


        if (($key = array_search($data['language_code'], $lang)) !== false) {
            unset($lang[$key]);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($this->request->getPost('image'))) {
                $validate = $this->validate([
                    'image' => [
                        'uploaded[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[image,4096]',

                    ],
                    'namecourse'             => "required|min_length[3]|max_length[100]|alpha_numeric_space|is_unique[courses.name,id,$id]",
                    'description'            => 'required|min_length[5]|max_length[200]|alpha_numeric_space',
                    'Language'               => 'required',
                    'id_category'               => 'required'
                ]);
            } else {
                $validate = $this->validate([
                    'namecourse'             => "required|min_length[3]|max_length[100]|alpha_numeric_space|is_unique[courses.name,id,$id]",
                    'description'            => 'required|min_length[5]|max_length[200]|alpha_numeric_space',
                    'Language'               => 'required',
                    'id_category'               => 'required'
                ]);
            }


            if (!$validate) {
                $this->loadTemplate('Courses/update', 'update Courses', ['validation' => \config\Services::validation(), 'dataOfCategoryById' => $dataOfCategoryById, 'languages' => $lang, 'Categories' => $dataOfCategory, 'course' => $data], ['admin/addAndUpdate.css'], ['courses/update.js']);
            } else {



                $oldImage = $model->getImage($id);

                if ($img = $this->request->getFile('image')) {

                    if ($img->isValid() && !$img->hasMoved()) {
                        if (file_exists('assets/uploads/' . $oldImage)) {
                            unlink('assets/uploads/' . $oldImage);
                        }

                        $newName = $img->getRandomName();
                        $img->move('assets/uploads/', $newName);
                        $data['image'] = $newName;
                    }
                } else {
                    $data['image'] = $oldImage;
                }

                $data['name'] = $this->request->getPost('namecourse');
                $data['description'] = $this->request->getPost('description');
                $data['language_code'] = $this->request->getPost('Language');
                $data['id_category'] = $this->request->getPost('id_category');

                $model->updateCourses($id, $data);
                return redirect()->to('Admin/Courses');
            } //$validate

        } else {
            $this->loadTemplate('Courses/update', 'Update Courses', ['validation' => \config\Services::validation(), 'languages' => $lang, 'Categories' => $dataOfCategory, 'dataOfCategoryById' => $dataOfCategoryById, 'course' => $data], ['admin/addAndUpdate.css'], ['courses/update.js']);
        }
    }



    /**
     * insert Videos From Link to Course you ara choose 
     *
     * @param [type] $id
     * @return void
     */
    public function insertVideosFromLink($id)
    {
        $model = new CoursesModel();
        $modelVideos = new VideosModel();
        $data = $model->selectById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validate = $this->validate([
                'videoDuration' => 'decimal|greater_than[0]',
                'name' => 'is_unique[videos.name]',

            ]);
            if (!$validate) {
                $this->loadTemplate('Courses/insertVideos', 'insert Videos', ['validation' => \config\Services::validation(), 'video' => $data], ['courses/insertvideos.css'], ['courses/addvideos.js']);
            } else {

                $link = $this->request->getPost('url');

                $text = preg_replace("#.*youtube\.com/watch\?v=#", "", $link);

                $pathYoutube = "https://www.youtube.com/embed/" . $text;
                $name = $this->request->getPost('name');
                $idCourse = $model->selectById($id);
                $dataOfVideos['path'] = $pathYoutube;
                $dataOfVideos['name'] = $name;
                $dataOfVideos['id_course'] = $idCourse['id'];
                $dataOfVideos['videoDuration'] = $this->request->getPost('videoDuration');

                $modelVideos->insertVideos($dataOfVideos);

                return redirect()->to('Admin/Courses');
            }
        } else {
            $this->loadTemplate('Courses/insertVideos', 'Add Video', ['validation' => \config\Services::validation(), 'video' => $data], ['courses/insertvideos.css'], ['courses/addvideos.js']);
        }
    }




    /**
     * insert Videos to Course you ara choose 
     *
     * @param [type] $id
     * @return void
     */
    public function insertVideos($id)
    {
        $model = new CoursesModel();
        $modelVideos = new VideosModel();
        $data = $model->selectById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validate = $this->validate([
                'file' => [
                    'uploaded[file]',
                    'mime_in[file,video/mp4]',
                    'max_size[file,5242880]',
                ],

            ]);
            if (!$validate) {
                $this->loadTemplate('Courses/insertVideos', 'insert Videos', ['validation' => \config\Services::validation(), 'video' => $data], ['courses/insertvideos.css'], ['courses/addvideos.js']);
            } else {


                $Videosfiles = $this->request->getFiles('file');

                $count = 0;
                foreach ($Videosfiles['file'] as $Video) {
                    $int_as_string = "$count";
                    $textVideoDuration =  $int_as_string . 'videoDuration';


                    $dataOfVideos['videoDuration'] = $this->request->getPost($textVideoDuration);

                    $name = $Video->getName();
                    $path = $Video->getRandomName();


                    $Video->move('assets/videos/', $path);
                    $idCourse = $model->selectById($id);

                    $dataOfVideos['path'] = $path;
                    $newName =str_replace('.mp4', '', $name);

                    $dataOfVideos['name'] = $newName;
                    $dataOfVideos['id_course'] = $idCourse['id'];

                    $modelVideos->insertVideos($dataOfVideos);
                    $count++;
                }
                return redirect()->to('Admin/Courses');
            }
        } else {
            $this->loadTemplate('Courses/insertVideos', 'Add Video', ['validation' => \config\Services::validation(), 'video' => $data], ['courses/insertvideos.css'], ['courses/addvideos.js']);
        }
    }

    /**
     * delete Video to Course you ara choose 
     *
     * @param [type] $id
     * @return void
     */
    public function deleteVideo($id)
    {
        $modelVideos = new VideosModel();
        $pathVideo = $modelVideos->pathAndNameVideo($id);
        $modelVideos->deletevideo($id);
        $path = $pathVideo['path'];
        if (file_exists('assets/videos/' . $path)) {
            unlink('assets/videos/' . $path);
        }

        return redirect()->to('admin/Courses');
    }


    public function editVideo($id)
    {

        $modelVideos = new VideosModel();
        $dataArr = $modelVideos->getVideosFromPrimary($id);
        $data = $dataArr[0];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validate = $this->validate([

                'videoDuration' => 'decimal|greater_than[0]',
            ]);
            if (!$validate) {
                $this->loadTemplate('Courses/editVideos', 'edit Videos', ['validation' => \config\Services::validation(), 'video' => $data], ['courses/insertvideos.css'], ['courses/editVideos.js']);
            } else {



                $oldVideo = $modelVideos->pathAndNameVideo($id);
                $oldVideoPath = $oldVideo['path'];
                $oldVideoName = $oldVideo['name'];
                $file = $this->request->getFile('file');
                if (!empty($file->getName())) {
                    if (file_exists('assets/videos/' . $oldVideoPath)) {
                        unlink('assets/videos/' . $oldVideoPath);
                    }

                    $path = $file->getRandomName();
                    $data['name'] = $file->getName();
                    $file->move('assets/videos/', $path);
                    $data['path'] = $path;
                } else {

                    $data['path'] = $oldVideoPath;
                    $data['name'] = $oldVideoName;
                }

                $data['videoDuration'] = $this->request->getPost('videoDuration');
                $modelVideos->updateVideo($id, $data);
                return redirect()->to('Admin/Courses');
            }
        } else {
            $this->loadTemplate('Courses/editVideos', 'edit Videos', ['validation' => \config\Services::validation(), 'video' => $data], ['courses/insertvideos.css'], ['courses/editVideos.js']);
        }
    }

    /**
     *edit Video From Link to Course you ara choose 
     *
     * @param [type] $id
     * @return void
     */
    public function editVideoFromLink($id)
    {
        $modelVideos = new VideosModel();

        
        $dataArr = $modelVideos->getVideosFromPrimary($id);
        $data = $dataArr[0];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $validate = $this->validate([

                'videoDuration' => 'decimal|greater_than[0]',
                'name' => 'is_unique[videos.name]',
            ]);
            if (!$validate) {
                $this->loadTemplate('Courses/editVideos', 'edit Videos', ['validation' => \config\Services::validation(), 'video' => $data], ['courses/insertvideos.css'], ['courses/editVideos.js']);
            } else {

            $name = $this->request->getPost('name');
            $url = $this->request->getPost('url');
            $videoDuration = $this->request->getPost('videoDuration');

            $text = preg_replace("#.*youtube\.com/watch\?v=#", "", $url);

            $pathYoutube = "https://www.youtube.com/embed/" . $text;
            $newData['name'] = $name;
            $newData['path'] = $pathYoutube;
            $newData['videoDuration'] = $videoDuration;

            $modelVideos->updateVideo($id, $newData);
            return redirect()->to('Admin/Courses');
            }
        } else {

            $this->loadTemplate('Courses/editVideos', 'edit Videos', ['validation' => \config\Services::validation(), 'video' => $data], ['courses/insertvideos.css'], ['courses/editVideos.js']);
        }
    }
}
