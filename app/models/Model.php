<?php 
Class Model {

	// =====================================================================
	// ALL VALIDATIONS PASS THROUGH HERE. READ, WRITE, POST, DELETE & UPDATA
	// =====================================================================

	/**
	 * Define my access to my database function
	 * Assigning $DB as the Default access to my database each time i need to read,write,post,delete data from the database
	 */

	private $DB;
	public function __construct(){
		$this->DB = new Database;
	}
	public function isExistsEmail($isCheckEmail){
		$this->DB->query("SELECT * FROM student__account WHERE email = :isCheckEmail");
		$this->DB->bind(':isCheckEmail', $isCheckEmail);
		if ($this->DB->single()) {
			return true;
		}else {
			return false;
		}
	}
	public function RenderProgrammeListSQL($id){
		$this->DB->query('SELECT Id, Duration, headerone, Subtext, UTME, WASSCE, NECO_SSCE, IGCSE, GCSE, Child_id, Child_name FROM `requirementoutlines`, `sublist` WHERE Child_id = Id AND Child_id = :id');
        $this->DB->bind(':id', $id);
		$sqlstmt = $this->DB->resultSet();
		if (!empty($sqlstmt)) {
			return $sqlstmt;
		}else {
			return false;
		}
	}
	// ===================================================
	// Selecting categories as array data
	// ===================================================

	public function SelectSpecial__ID(){
		$this->DB->query('SELECT * FROM `Categories`');
		$RunData__result = $this->DB->resultSet();
		return $RunData__result;
	}

	public function fetchId(){
		$this->DB->query('SELECT * FROM student__account ORDER BY student__Id DESC');
    	$row = $this->DB->single();
		 if (empty($row)){
			return false;
		}else {
			return $row;
		}
	}

	// ===================================================
	// Selecting program as array data
	// ===================================================

	public function SelectProgram(){
		$this->DB->query('SELECT * FROM `program` ');
		$stmtProgram = $this->DB->resultSet();
		return $stmtProgram;
	}

	// ===================================================
	// Selecting session for the session as array data
	// ===================================================

	public function Selectsession(){
		$this->DB->query('SELECT * FROM `Session`');
		$stmtsession = $this->DB->resultSet();
		return $stmtsession;
	}


	// ===================================================
	// Selecting entry level as array data
	// ===================================================

	public function SelectEntryLevel(){
		$this->DB->query('SELECT * FROM `entry__level__tb` ');
		$stmtentrylevel= $this->DB->resultSet();
		return $stmtentrylevel;
	}

	// ============================================================
	// Appointing Professor to a certain department
	// ============================================================

	public function AppointProfessor($sid, $nin, $role, $fty, $instructor, $Dsg){
		$this->DB->query('INSERT INTO management__role(ID, NIN, Role, Faculty__ref__id, Base, Designation) VALUES (:sid, :nin, :role, :fty, :instructor, :Dsg)');
        $this->DB->bind(':sid', $sid);
        $this->DB->bind(':nin', $nin);
        $this->DB->bind(':role', $role);
		$this->DB->bind(':fty', $fty);
		$this->DB->bind(':instructor', $instructor);
		$this->DB->bind(':Dsg', $Dsg);
		if($this->DB->execute()){
			return true;
		}else {
			return false;
		}
	}
	
	// ============================================================
	// Validating student method 
	// ============================================================
	
	public function processor($Sender){
		$this->DB->query('INSERT INTO student__account (student__id, Roll__No, Application__Type, Department__Type, Program__Type, NIN, Entrylevel, Surname, password, othername, Date__of__birth, gender, email, relationship, telephone, session) VALUES (:NewID, :EnrollmentNumber, :App, :Dep, :Prog, :Nin, :Entry, :Surname, :password, :Othername, :DBO, :Gender, :Email, :Relationship, :Tel, :Session)');
		// bind the values
		$this->DB->bind(':NewID', $Sender['NewID']);
		$this->DB->bind(':EnrollmentNumber', $Sender['EnrollmentNumber']);
		$this->DB->bind(':App', $Sender['App']);
		$this->DB->bind(':Dep', $Sender['Dep']);
		$this->DB->bind(':Prog', $Sender['Prog']);
		$this->DB->bind(':Nin', $Sender['Nin']);
		$this->DB->bind(':Entry', $Sender['Entry']);
		$this->DB->bind(':Surname', $Sender['Surname']);
		$this->DB->bind(':password', $Sender['password']);
		$this->DB->bind(':Othername', $Sender['Othername']);
		$this->DB->bind(':DBO', $Sender['DBO']);
		$this->DB->bind(':Gender', $Sender['Gender']);
		$this->DB->bind(':Email', $Sender['Email']);
		$this->DB->bind(':Relationship', $Sender['Relationship']);
		$this->DB->bind(':Tel', $Sender['Tel']);
		$this->DB->bind(':Session', $Sender['Session']);
		//Execute the function   
		if($this->DB->execute()){
			return true;
		}else {
			return false;
		}
	}

	// Student Registering parent details
	public function isParentSQLstmt($data){
		$this->DB->query('INSERT INTO parent__tb (Parent___id, child__id, First_name, Last_name, ParentEmail, Parentfeatured, 
		ParentPassword, ParentGender, ParentDOB, Mobile, Address, Profile___Picture)
		VALUES (:Fatherid, :ChildId, :fname, :lname, :email, :featured, :password, :Gender, :DOB, :mobile, :address, :img)');
		// bind the values
		$this->DB->bind(':Fatherid', $data['Fatherid']);
		$this->DB->bind(':ChildId', $data['ChildId']);
		$this->DB->bind(':fname', $data['fname']);
		$this->DB->bind(':lname', $data['lname']);
		$this->DB->bind(':email', $data['email']);
		$this->DB->bind(':featured', $data['featured']);
		$this->DB->bind(':password', $data['password']);
		$this->DB->bind(':Gender', $data['Gender']);
		$this->DB->bind(':DOB', $data['DOB']);
		$this->DB->bind(':mobile', $data['mobile']);
		$this->DB->bind(':address', $data['address']);
		$this->DB->bind(':img', $data['img']);
		//Execute the function   
		if($this->DB->execute()){
			return true;
		}else {
			return false;
		}
	}
	public function updateStudentLoginTime($id, $Active_login){
		$this->DB->query("UPDATE `student__account` SET active = :Active_login, Onlinestatus = '1' WHERE student__Id = :id");
		$this->DB->bind(':id', $id);
		$this->DB->bind(':Active_login', $Active_login);
		if($this->DB->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function updateStudentLogOutTime($id){
		$this->DB->query("UPDATE `student__account` SET Onlinestatus = '0' WHERE student__Id = :id");
		$this->DB->bind(':id', $id);
		if($this->DB->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function FetchRender($___ApplicationType){
		$this->DB->query('SELECT Category__ID, Category__name, Cat_id, Child_id, Child_name
		FROM `categories`, `sublist` 
		WHERE Cat_id = Category__ID AND Category__ID = :___ApplicationType');
		$this->DB->bind(':___ApplicationType', $___ApplicationType);
		$books = $this->DB->resultSet();
		if (!empty($books)) {
			return $books;
		}else {
			return false;
		}
	}

	public function sqlfetchstdreference($refid){
		$this->DB->query("SELECT * FROM student__account WHERE Roll__No = :refid");
		$this->DB->bind(':refid', $refid);
		$stmt = $this->DB->resultSet();
		if (!empty($stmt)){
			return $stmt;
		}else {
			return false;
		}
	}
}	