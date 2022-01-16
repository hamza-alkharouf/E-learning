<?php namespace App\Controllers\Admin;
use App\Models\EnrollmentsModel;
use App\Models\StudentsModel;
class Enrollments extends BaseController{
/**
 * Receipt of the Request
 *
 * @param INT $StrudentId
 * @param INT $CourseId
 * @return void
 */
    function  saveEnrollments($StrudentId,$CourseId){
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $model = new EnrollmentsModel();
            $data = 
                [
                    'studentId'  => $StrudentId,
                    'courseId'   => $CourseId ,
                ];
            $model->insertEnrollment($data);
        }

    }
/**
 * index page Enrollments
 *
 * @return void
 */
public function index()
{
    
    $model = new EnrollmentsModel();
    $data = [
        'enrollments' => $model->getPending(8),
        'pager' => $model->pager,
    ];
    $this->loadTemplate('enrollments/index','Enrollments',$data,['enrollments/index.css']);
}
      
/**
 * accept Enrollment
 *
 * @param int $id
 * @return void
 */
public function accept($id){
    $model = new EnrollmentsModel();
    $data = 
    [
        'enable'  => 1,
        'Pending'   => 0 ,
    ];
    $model->updateEnrollment($id,$data);
    $nameCourse = $model ->getPendingbyId($id);
    $this->send($nameCourse['email'],'Your application to register for the '.$nameCourse['name'].' course has been accepted',$nameCourse['firstname'],$nameCourse['lastname']);
    return redirect()->to('Admin/Enrollments');
}



/**
 * reject Enrollments
 *
 * @param int $id
 * @return void
 */
public function reject($id){
    $model = new EnrollmentsModel();
    $data = 
    [
        'enable'  => 0,
        'Pending'   => 0 ,
    ];
    $model->updateEnrollment($id,$data);
    $nameCourse = $model ->getPendingbyId($id);
    $this->send($nameCourse['email'],'Your application to register for the '.$nameCourse['name'].' course has been denied',$nameCourse['firstname'],$nameCourse['lastname']);
    return redirect()->to('Admin/Enrollments');  
}

private function send($emailAddress,$message,$fname,$lname)
{
	$email = \Config\Services::email();
	$email->setTo($emailAddress);
	$message = 'Hello '.$fname.' '.$lname.','.$message;
	$email->setSubject('Enrollments');
	$email->setMessage($message);
	$email->send();
}

/**
 * accept Student  Enrollments
 *
 * @param int $id
 * @param int $Studentid
 * @return void
 */
public function acceptStudent($id,$Studentid){
    $model = new EnrollmentsModel();
    $data = 
    [
        'enable'  => 1,
        'Pending'   => 0 ,
    ];
    $model->updateEnrollment($id,$data);
    $nameCourse = $model ->getPendingbyId($id);
    $this->send($nameCourse['email'],'Your application to register for the '.$nameCourse['name'].' course has been accepted',$nameCourse['firstname'],$nameCourse['lastname']);
    return redirect()->to('Admin/Enrollments/Approvals/'.$Studentid);
}


/**
 * reject Student  Enrollments
 *
 * @param int $id
 * @param int $Studentid
 * @return void
 */
public function rejectStudent($id,$Studentid){
    $model = new EnrollmentsModel();
    $data = 
    [
        'enable'  => 0,
        'Pending'   => 0 ,
    ];
    $model->updateEnrollment($id,$data);
    $nameCourse = $model ->getPendingbyId($id);
    $this->send($nameCourse['email'],'Your application to register for the '.$nameCourse['name'].' course has been denied',$nameCourse['firstname'],$nameCourse['lastname']);
    return redirect()->to('Admin/Enrollments/Cancellation/'.$Studentid);
}

/**
 * accept page
 *
 * @param int $id Student
 * @return void
 */
public function Approvals($id){
    $model = new EnrollmentsModel();
    $data = 
    [
        'enrollments' => $model->getAccept($id,8),
        'pager' => $model->pager,
        'StudentId'=>$id
    ];
    $this->loadTemplate('enrollments/accept','Enrollments',$data,['enrollments/index.css']);

}

/**
 * reject page
 *
 * @param int $id Student
 * @return void
 */
public function Cancellation($id){
    $model = new EnrollmentsModel();
    $data = 
    [
        'enrollments' => $model->getReject($id,8),
        'pager' => $model->pager,
        'StudentId'=>$id,
    ];
    $rejectionLimit=$model->countReject($id);
    if($rejectionLimit>8){
        $modelStudent = new StudentsModel();
        $active['is_active'] = false;
        $modelStudent->ban($id,$active); 
    }
    $this->loadTemplate('enrollments/reject','Enrollments',$data,['enrollments/index.css']);
}


}

?>