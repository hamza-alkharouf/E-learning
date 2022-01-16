<?php namespace App\Controllers\Admin;
use App\Models\AdminsModel;
use App\Models\StudentsModel;
use App\Models\CoursesModel;
use App\Models\CategoriesModel;
use App\Models\VideosModel;

class Home extends BaseController{

    public function index(){

        $modelAdmins = new AdminsModel();
        $modelStudents = new StudentsModel();
        $modelCourses = new CoursesModel();
        $modelCategories = new CategoriesModel();
        $modelVideos = new VideosModel();

        $data['numAdmin'] = $modelAdmins->getRowAdmins();
        $data['numStudents'] = $modelStudents->getRowStudents();
        $data['numCourses'] = $modelCourses->getRowCourses();
        $data['numCategories'] = $modelCategories->getRowCategories();
        $data['numVideos'] = $modelVideos->getRowVideos();


        $this->loadTemplate('home',lang('Home.page_title'),$data);
    }
    
}