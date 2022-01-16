<?php

namespace App\Controllers;
use App\Models\CoursesModel;
use App\Models\VideosModel;
use App\Models\CategoriesModel;
use App\Models\EnrollmentsModel;
use App\Controllers\Admin\Enrollments;
class Categories extends BaseController
{
	/**
	 * index page (Categories)
	 *
	 * @return void
	 */
	public function index()
	{
		$model = new CategoriesModel();

		$data['Categories'] = $model-> getCategories();
	
		return $this->loadTemplate('categories','Categories',$data,['categories.css']);

	}
	/**
	 * view all courses have same categories
	 *
	 * @param int $id categories
	 * @return void
	 */
	public function courses($id)
	{
		$model = new CoursesModel();
		$CategoriesModel = new CategoriesModel();
		$data = [
			'courses' => $model->selectAllByIdJoinCoursesAndCategory($id,8),
			'pager' => $model->pager,
		];
		$data['nameCategory'] = $CategoriesModel-> selectById($id)['name'];
		return $this->loadTemplate('courses','Courses',$data,['courses.css']);

	}

	public function viewCourse($id)
	{
        $model = new CoursesModel();
        $modelVideos = new VideosModel();
		$modelEnrollment = new EnrollmentsModel();
		$Video = $modelVideos->selectFirstNameByIdVideos($id);
		$videoDuration =$modelVideos->selectNameByIdVideos($id);
		$data = $model->selectByIdJoinCoursesAndCategory($id);
		$idVideos = $modelVideos->numerPaginateVideos($id, 1);
		$errors = '';
		$enable =[];
		$pager = $modelVideos->pager;
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if (!session()->get('studentid')) {
				$errors = 'You must first login or create an account, then press the enrollment button again to watch the rest of the videos';
				$this->loadTemplate('viewCourse', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager,'videoDuration'=>$videoDuration,'allVideo'=>$Video ,'enable'=>$enable,'errors'=>$errors,'course' => $data, 'videos' => $idVideos]);
			} else {
				$enable = $modelEnrollment->selectEnrollmentbyIdStudentAndCourse(session()->get('studentid'),$id);
				if (empty($enable)) {
					$errors = 'Your request has been sent, please wait for the admin to approve it';
					$enrollment = new Enrollments();
					$enrollment->saveEnrollments(session()->get('studentid'),$id);
				    $this->loadTemplate('viewCourse', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager,'videoDuration'=>$videoDuration,'allVideo'=>$Video ,'enable'=>$enable,'errors'=>$errors,'course' => $data, 'videos' => $idVideos]);
				}
				$enable = $enable[0]['enable'];
				if ($enable) 
				{
					$Video = $modelVideos->selectNameByIdVideos($id);
				}
				$this->loadTemplate('viewCourse', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager,'videoDuration'=>$videoDuration,'allVideo'=>$Video ,'enable'=>$enable,'errors'=>$errors,'course' => $data, 'videos' => $idVideos]);	
			}
		}
		else
		{
			$enable = $modelEnrollment->selectEnrollmentbyIdStudentAndCourse(session()->get('studentid'),$id);
			if (!empty($enable)) {
				if ($enable[0]['enable']) {
					$Video = $modelVideos->selectNameByIdVideos($id);
				}
			}

			$this->loadTemplate('viewCourse', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager,'videoDuration'=>$videoDuration,'allVideo'=>$Video ,'enable'=>$enable,'errors'=>$errors,'course' => $data, 'videos' => $idVideos]);
		}
	}
	// /**
	//  * View the course you have choose
	//  *
	//  * @param int $id  courses you are choose
	//  * @return void
	//  */
	// public function viewCourse($id)
	// {
    //     $model = new CoursesModel();
    //     $modelVideos = new VideosModel();
	// 	$modelEnrollment = new EnrollmentsModel();
	// 	$Video = $modelVideos->selectFirstNameAndVideoDurationByIdVideos($id);
	// 	$videoDuration =$modelVideos->selectNameAndVideoDurationByIdVideos($id);
	// 	$data = $model->selectByIdJoinCoursesAndCategory($id);
	// 	$videosPaginated = $modelVideos->numberPaginateVideos($id, 1);
	// 	$errors = '';
	// 	$enable =[];
	// 	$pager = $modelVideos->pager;
	// 	if($_SERVER['REQUEST_METHOD']=='POST'){
	// 		if (!session()->get('studentid')) {
	// 			$errors = 'You must first login or create an account, then press the enrollment button again to watch the rest of the videos';
	// 			$this->loadTemplate('viewCourse', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager,'videoDuration'=>$videoDuration,'allVideo'=>$Video ,'enable'=>$enable,'errors'=>$errors,'course' => $data, 'videos' => $videosPaginated]);
	// 		} else {
	// 			$enable = $modelEnrollment->selectEnrollmentbyIdStudentAndCourse(session()->get('studentid'),$id);
	// 			if (empty($enable)) {
	// 				$errors = 'Your request has been sent, please wait for the admin to approve it';
	// 				$enrollment = new Enrollments();
	// 				$enrollment->saveEnrollments(session()->get('studentid'),$id);
	// 			    $this->loadTemplate('viewCourse', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager,'videoDuration'=>$videoDuration,'allVideo'=>$Video ,'enable'=>$enable,'errors'=>$errors,'course' => $data, 'videos' => $videosPaginated]);
	// 			}
	// 			$enable = $enable[0]['enable'];
	// 			if ($enable) 
	// 			{
	// 				$Video = $modelVideos->selectNameAndVideoDurationByIdVideos($id);
	// 			}
	// 			$this->loadTemplate('viewCourse', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager,'videoDuration'=>$videoDuration,'allVideo'=>$Video ,'enable'=>$enable,'errors'=>$errors,'course' => $data, 'videos' => $videosPaginated]);	
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$enable = $modelEnrollment->selectEnrollmentbyIdStudentAndCourse(session()->get('studentid'),$id);
	// 		if (!empty($enable)) {
	// 			if ($enable[0]['enable']) {
	// 				$Video = $modelVideos->selectNameAndVideoDurationByIdVideos($id);
	// 			}
	// 		}

	// 		$this->loadTemplate('viewCourse', 'view Course', ['validation' => \config\Services::validation(), 'pager' => $pager,'videoDuration'=>$videoDuration,'allVideo'=>$Video ,'enable'=>$enable,'errors'=>$errors,'course' => $data, 'videos' => $videosPaginated]);
	// 	}
	// }


}
