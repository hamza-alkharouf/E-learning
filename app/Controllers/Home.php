<?php

namespace App\Controllers;
use App\Models\CoursesModel;

class Home extends BaseController
{
	/**
	 * home page of student
	 *
	 * @return void
	 */
	public function index()
	{

		$model = new CoursesModel();

		$data = [
			'courses' => $model->newCourses(8),
		];
		$this->loadTemplate('home','home',$data,['courses.css','home.css']);

	}
	/**
	 * search of courses 
	 *
	 * @return void
	 */
	public function search()
	{

		$model = new CoursesModel();
        if ($this->request->getGet('search')){
            $search = $this->request->getGet('search');
			$data = [
				'courses' => $model->searchCourses($search,8),
				'pager' => $model->pager,
			];
            $this->loadTemplate('search','Search',$data,['courses.css']);
        }else{
			$data = [
				'courses' => $model->joinBetweenCoursesAndCategory(8),
				'pager' => $model->pager,
			];
			$this->loadTemplate('search','Search',$data,['courses.css']);
        }


	}
}
