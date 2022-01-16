<?php
namespace App\Controllers\Admin;

use App\Models\CategoriesModel;
use App\Models\CoursesModel;
use App\Models\VideosModel;
class categories extends BaseController{
/**
 * index page categories
 *
 * @return void
 */
  public function index()
{
        $model = new CategoriesModel();
        $data = 
        [
            'categories' => $model->getListCategories(15),
            'pager' => $model->pager,
        ];
        $this->loadTemplate('categories/index','category',$data,['admin/index.css']);
}
/**
 * add Categories
 *
 * @return void
 */
    public function add()
    {     
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $validate=$this->validate
            ([
                'name'             => 'required|alpha_numeric_space|min_length[3]|max_length[100]|is_unique[categories.name]',
                'descrption'      => 'required|alpha_numeric_space|min_length[6]|max_length[250]'
            ]);
            if (!$validate)
            {
                $this->loadTemplate('categories/add','Add category',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css']);
            }
            else
            {
                $model = new CategoriesModel();
                $data = 
                [
                    'name' => $this->request->getPost('name'),
                    'descrption' => $this->request->getPost('descrption'),
                ];
                $model->insertCategory($data);
                return redirect()->to('Admin/Categories');
            }
        }
        else 
        {
            $this->loadTemplate('categories/add','Add category',['validation'=>\config\Services::validation()],['admin/addAndUpdate.css']);
        }       
    }

/**
 * delete Categories by id
 *
 * @param int $id
 * @return void
 */
public function delete($id)
{
        $model = new CategoriesModel();
        $model->deleteCategory($id);

        $modelCourses = new CoursesModel();
        $modelVideos = new VideosModel();
        $courses = $modelCourses->selectByCategoryId($id);
        foreach ($courses as $course) {
            if (file_exists('assets/uploads/' . $course['image'])) {
                unlink('assets/uploads/' . $course['image']);
            }
            $idVideos = $modelVideos->selectByIdVideos($course['id']);
            foreach ($idVideos as $idVideo) {
                $path = $idVideo['path'];
                if (file_exists('assets/videos/' . $path)) {
                    unlink('assets/videos/' . $path);
                }
                $modelVideos->deletevideo($idVideo['id']);
            }
            $modelCourses->deleteCourses($course['id']);
        }
        return redirect()->to('Admin/Categories');
}
/**
 * update Categories by id
 *
 * @param [type] $id
 * @return void
 */
public function update($id)
{ 
    $model = new CategoriesModel();               
    if($_SERVER['REQUEST_METHOD']=='POST'){            
        $validate=$this->validate
        ([
            'name'             => "required|alpha_numeric_space|min_length[3]|max_length[100]|is_unique[categories.name,id,$id]",
            'descrption'       => 'required|alpha_numeric_space|min_length[6]|max_length[250]',
        ]);
        if (!$validate)
        {
            $data = $model->selectById($id);
            $this->loadTemplate('categories/update','Update category',['validation'=>\config\Services::validation(),'categories'=>$data],['admin/addAndUpdate.css']);
        }
        else
        {            
            $data['name'] = $this->request->getPost('name');
            $data['descrption'] = $this->request->getPost('descrption');
            $model->updatecategory($id,$data);
            return redirect()->to('Admin/Categories');
        }
    }
    else 
    {
        $data = $model->selectById($id);
        $this->loadTemplate('categories/update','Update category',['validation'=>\config\Services::validation(),'categories'=>$data],['admin/addAndUpdate.css']);
    }
}

}
?>







