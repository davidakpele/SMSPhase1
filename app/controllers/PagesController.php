<?php
class PagesController extends Controller {
    /**
     * Class PageController
     * @var false|mixed
     * Author: David AkpELE <akpeledavid@hotmail.com>
     * FROM: MidTech Private Limited
     * @package category 
     */ 

    // =====================================================================================
    // This is like a namespace to accessing our model file that connect us to the database
    // =====================================================================================
    private $dataModel;
    public function __construct() {
       @$this->userModel = @$this->loadModel('Model');
    }
    
    // ==============================================================
    // First School Page That Will Display On THe Site (Index page)
    // =============================================================

    public function index(){
        @$data = [
                    'page_title' => 'Application Portal',
                    'meta_tag_content_Seo'=>'Mercy College Unversity Student Portal',
                    'meta_tag_description'=>'Mercy College University Online Student Portal For Undergraduate, Postgraduate and Distance Learning Part Time Students'
                ];
        @$this->view('index', @$data);    
    }
    // ==============================================================================
    // This is responder to Application type and then pass everything to faculty
    // ==============================================================================

      public function RenderRequirementData(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        ob_start();
        $jsonString = file_get_contents("php://input");
        $response = array();
        $phpObject = json_decode($jsonString);
        $getData=$phpObject->{'DataId'};
        $newJsonString = json_encode($phpObject);
        $___ApplicationType = strip_tags(trim(filter_var((int)$getData, FILTER_SANITIZE_STRING)));
        if(!empty($___ApplicationType) && (is_numeric($___ApplicationType))){
            if ($___ApplicationType ==   1 || $___ApplicationType == 2 || $___ApplicationType ==   3) {
                $crf= $this->userModel->FetchRender($___ApplicationType);
                if ($crf) {
                    $response['Status'] = '2001'; 
                    $response['result'] = $crf;
                }else {
                    $response['Status'] = 'Invalid Data requested.';
                }
            }
         }else { 
			header('location:' . ROOT . 'DeniedAccess');
        }
        ob_end_clean();
        echo json_encode($response); 
    }

    public function RenderProgrammeList(){
        ob_start();
        $jsonString = file_get_contents("php://input");
        $response= array();
        $phpObject = json_decode($jsonString);
        $getData=$phpObject->{'RestAPIDataId'};
        $getprogramid=$phpObject->{'ProgramId'};
        $newJsonString = json_encode($phpObject);
        $pid = strip_tags(trim(filter_var((int)$getprogramid, FILTER_VALIDATE_INT)));
        $id = strip_tags(trim(filter_var((int)$getData, FILTER_SANITIZE_STRING)));
            if(!empty($id) && (is_numeric($id))){
               $returnSql = $this->userModel->RenderProgrammeListSQL($id);
                if ($returnSql) {
                    $response['Status'] = '2001'; 
                    $response['result'] = $returnSql;
                }else {
                    $response['ErrorMessage']='Sorry This Course doest exists';
                } 
            }else { 
                header('location:' . ROOT . 'DeniedAccess');
                exit();
            }
        ob_end_clean();
        echo json_encode($response); 
    }


    public function EntryRequirements(){
        @$DC = @$this->userModel->SelectSpecial__ID();
        @$data = [
                    'page_title' => 'Mercy College Entry Requirement Portal',
                    'DisplayCateogries' => @$DC,
                ];
        @$this->view('Application/EntryRequirements', @$data); 
    }
    // ==============================================================
    // InitiateOnlinePayment Page for online payment process
    // =============================================================
 
    public function InitiateOnlinePayment(){
        $data=
        [
            'page_title'=> 'Mecry College University Portal :: Online Initiate Online Payment'
        ];
        $this->view('Application/InitiateOnlinePayment', $data);
    }

    public function InitiateOnlinePaymentController(){
        header("Access-Control-Allow-Origin: *"); 
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        ob_start();
        $jsonString = file_get_contents("php://input");
        $response = array();
        $i = json_decode($jsonString);
        $ReferenceNumber=$i->{'ReferenceNumber'};
        $newJsonString = json_encode($i);
        $refid = strip_tags(trim(filter_var($ReferenceNumber, FILTER_SANITIZE_STRING)));
        $fetch = @$this->userModel->sqlfetchstdreference($refid);
        if ($fetch) {
            $response['status'] =  '200';
            $response['message']= 'Reference Number Found.';
        }else {
            $response['message']= 'Your reference number is not valid..';
        }
        ob_end_clean();
        echo json_encode($response);
    }


// =================================================
// Register Method for New Fresher
// ================================================== 

    public function Registration(){
        @$DC = @$this->userModel->SelectSpecial__ID();
        @$throwprogram = @$this->userModel->SelectProgram();
        @$throwSession= @$this->userModel->Selectsession();
        @$throwEntrylevel = @$this->userModel->SelectEntryLevel();
        $stmt= $this->userModel->fetchId();
        /**
         * Generate Student Enrollment Number 
         */
        $length = 11;
        $number = '1234567890';
        $numberLength = strlen($number);
        $enrollNo = '';
        for ($i = 0; $i < $length; $i++) {
            $enrollNo .= $number[rand(0, $numberLength - 1)];
        }  
        $enrollNo = 'MCU'.$enrollNo;
         if (empty($stmt)) {
            $Studentid = '9001';
        }else {
            $AvaliableID = $stmt->student__Id;
            $stmtid = str_replace("900", "", $AvaliableID);
            $id =str_pad($stmtid + 1,1,0, STR_PAD_LEFT);
            $Studentid = '900'.  $id;
        }
        $parentid= md5(microtime(true).mt_Rand());
            @$data =
            [
                'page_title' => 'Application Form for Freshers',
                'DisplayCateogries' => $DC,
                'throw' => $throwprogram, 
                'StmtEntrylevel' => $throwEntrylevel,
                'StmtSession' => $throwSession, 
                'pid'=>$parentid,
                'StudentId'=>$Studentid,
                'EnrolNo'=>$enrollNo
                ];
                
            @$this->view('Application/Registration', @$data);      
    }


    // Checking if new Student email exist before.
    public function isExistStudentEmail(){
        header("Access-Control-Allow-Origin: *"); 
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        ob_start();
        $jsonString = file_get_contents("php://input");
        $response = array();
        $phpObject = json_decode($jsonString);
        $isCheckEmail = $phpObject->{'Email'};
        // This is jwt token is use to process student /parent data
        $isCheckjwt = $phpObject->{'JwtApi'};
        $newJsonString = json_encode($phpObject);
        $isFetchEmailexist = $this->userModel->isExistsEmail($isCheckEmail);
        if($isFetchEmailexist) {
            $response['status'] = '200';
            $response['message']= 'Sorry..! Email Already Been Used By Another Student.';
        }
        ob_end_clean();
        echo json_encode($response);
    }

  
    /**
     * Processing Student registration 
     *
     * @return void
     */
    public function ProcessNewStudentOnline(){

    header("Access-Control-Allow-Origin: *"); 
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    ob_start();
    $jsonString = file_get_contents("php://input");
    $response = array();
    $phpObject = json_decode($jsonString);

    $NewStudentIdTagNo = $phpObject->{'NewStudentId'};
    $NewStudentEnrollmentNo = $phpObject->{'EnrollmentNumber'};
    $App = $phpObject->{'Application'};
    $Dpt = $phpObject->{'Department'};
    $prg =$phpObject->{'Program'};
    $ninnumber = $phpObject->{'National Identification Number'};
    $Enty = $phpObject->{'Entry Level'};
    $sur =$phpObject->{'Surname'};
    $oda = $phpObject->{'Othername'};
    $Dobh = $phpObject->{'Date of birth'};
    $Gen =$phpObject->{'Gender'};
    $Stm =$phpObject->{'Student Email'};
    $ReS = $phpObject->{'Relationship Status'};
    $Tel = $phpObject->{'Telephone Number'};
    $Ses =$phpObject->{'Session'};
    $isJwtApi = $phpObject->{'JwtApi'};
    // Setting surname as the user default password
    $password = password_hash($sur, PASSWORD_ARGON2ID);
    $newJsonString = json_encode($phpObject);
    
    $Sender = 
        [
            'NewID'=>trim(filter_var($NewStudentIdTagNo, FILTER_SANITIZE_STRING)),
            'EnrollmentNumber' =>trim(filter_var($NewStudentEnrollmentNo, FILTER_SANITIZE_STRING)),
            'App'=> trim(filter_var($App, FILTER_SANITIZE_STRING)),
            'Dep'=> trim(filter_var($Dpt, FILTER_SANITIZE_STRING)),
            'Prog'=>trim(filter_var($prg, FILTER_SANITIZE_STRING)),
            'Nin'=>trim(filter_var($ninnumber, FILTER_SANITIZE_STRING)),
            'Entry'=>trim(filter_var($Enty, FILTER_SANITIZE_STRING)),
            'Surname'=>trim(filter_var($sur, FILTER_SANITIZE_STRING)),
            'Othername'=>trim(filter_var($oda, FILTER_SANITIZE_STRING)),
            'DBO'=>trim(filter_var($Dobh, FILTER_SANITIZE_STRING)),
            'Gender'=>trim(filter_var($Gen, FILTER_SANITIZE_STRING)),
            'Email'=>trim(filter_var($Stm, FILTER_SANITIZE_STRING)),
            'Relationship'=>trim(filter_var($ReS, FILTER_SANITIZE_STRING)),
            'Tel'=>trim(filter_var($Tel, FILTER_SANITIZE_STRING)),
            'Session'=>trim(filter_var($Ses, FILTER_SANITIZE_STRING)),
            'password'=>$password
        ];
        $insertingData = $this->userModel->processor($Sender);
         $_SESSION['api'] =$isJwtApi;
         $_SESSION['userID'] = $Sender['NewID'];
        if($insertingData){
            $response['api']= $_SESSION['api'];
            $response['userid']= $_SESSION['userID'];
            $response['status']= 3;
            $response['Successmessage']= 'Verification mail has been sent to the email you provided. Please verify email to continue application. If you have used a wrong email, please fill the form again with a valid email address. 
            <br/><br/><a class="buttonResendEmail" href="'.ROOT.'Application/Registration"><b>Continue Application</b></a> ';
        }else {
            $response['message']= 'Sorry.. Something went';
        }
        ob_end_clean();
        echo json_encode($response);
    }
    
    public function RandomToken($length = 32){
        if(!isset($length) || intval($length) <= 8 ){
            $length = 32;
        }
        if (function_exists('random_bytes')) {
            return bin2hex(random_bytes($length));
        }
        if (function_exists('mcrypt_create_iv')) {
            return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
        }
        if (function_exists('openssl_random_pseudo_bytes')) {
            return bin2hex(openssl_random_pseudo_bytes($length));
        }
    }
    public function Salt(){
        return substr(strtr(base64_encode(hex2bin($this->RandomToken(32))), '+', '.'), 0, 44);
    }
  

public function registerParentData(){
    $response = array();
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if (isset($_FILES['file']['name']) != '' && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['DOB']) && isset($_POST['Gender'])
        && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address']) 
        && isset($_POST['ChildId']) && isset($_POST['Fatherid'])){
        // validate file
        $photo = $_FILES['file'];
        $name = $photo['name'];
        $nameArray = explode('.', $name);
        $fileName = $nameArray[0];
        $fileExt = $nameArray[1];
        $mime = explode('/', $photo['type']);
        $mimeType = $mime[0];
        $mimeExt = $mime[1];
        $tmpLoc = $photo['tmp_name'];   
        $fileSize = $photo['size']; 
        // $allowed = array('jpg', 'jpeg', 'png');
        $uploadName = md5(microtime()).'.'.$fileExt;
        $uploadPath =  'Media/Parent/'.trim(filter_var($_POST['Fatherid'], FILTER_SANITIZE_STRING)).'/'.$uploadName; 
        $dbpath     =  'Media/Parent/'.trim(filter_var($_POST['Fatherid'], FILTER_SANITIZE_STRING)).'/'.$uploadName;
        $folder =  'Media/Parent/'.trim(filter_var($_POST['Fatherid'], FILTER_SANITIZE_STRING));
        if ($fileSize > 90000000000000) {
            $response['status'] = 300;
            $response['errormsg'] = '<b>ERROR:</b>Your file was larger than 50kb in file size.';
        }elseif ($fileSize < 90000000000000) {
            if(!file_exists($folder)){
                mkdir($folder,077,true);
            }
            move_uploaded_file($tmpLoc,$dbpath);
            $password = password_hash($_POST['fname'], PASSWORD_ARGON2ID);
            $data = 
            [
                'img'=>$uploadPath,
                'fname'=>trim(filter_var($_POST['fname'], FILTER_SANITIZE_STRING)),
                'lname'=>trim(filter_var($_POST['lname'], FILTER_SANITIZE_STRING)),
                'DOB'=>trim(filter_var($_POST['DOB'], FILTER_SANITIZE_STRING)),
                'Gender'=>trim(filter_var($_POST['Gender'], FILTER_SANITIZE_STRING)),
                'email'=>trim(filter_var($_POST['email'], FILTER_SANITIZE_STRING)),
                'featured'=>'1',
                'password'=>$password,
                'mobile'=>trim(filter_var($_POST['mobile'], FILTER_SANITIZE_STRING)),
                'address'=>trim(filter_var($_POST['address'], FILTER_SANITIZE_STRING)),
                'mobile'=>trim(filter_var($_POST['mobile'], FILTER_SANITIZE_STRING)),
                'ChildId'=>trim(filter_var($_POST['ChildId'], FILTER_SANITIZE_STRING)),
                'Fatherid'=>trim(filter_var($_POST['Fatherid'], FILTER_SANITIZE_STRING)),
            ];
    
            if ($this->userModel->isParentSQLstmt($data)){
                unset($_SESSION['api']);
                unset($_SESSION['userID']);
                $response['status'] = 200;
                $response['message'] = '<b>Application Has Successfully Completed..!</b><p>Your Matric number has also sent to your parent email.</p>';
            } 
        }
    }
        echo json_encode($response);
}
}

//https://fmovies.co/film/numb3rs-season-1-14556?play=13