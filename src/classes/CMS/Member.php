<?php
namespace MySite\CMS;                                   // Declare namespace

class Member {
protected $db;
public function __construct(Database $db)
{
    $this->db = $db;
}
	public function initialize($styleId, $vids) {
		$arguments['id'] = $styleId;
		$arguments['vBit'] = $vids;
		$sql = 'insert into site_default (style, disable_video) values (:id, :vBit)';
		return $this->db->runSql($sql, $arguments);
	}
	public function selectSiteDefaultSettings() {
		$sql = "select * from site_default where id like 1";
		return $this->db->runSql($sql)->fetch();
	}
	public function setSiteStyle($styleId) {
		$arguments['id'] = $styleId;
		$sql = "update site_default set style = :id where id like 1";
		return $this->db->runsql($sql, $arguments)->rowCount();
	}
	 public function updateUsers($email) {
        $arguments['email'] = $email;
        $arguments['timestamp'] = time();
        $sql = "UPDATE users SET time_stamp = :timestamp where email like :email";
        return $this->db->runsql($sql, $arguments)->rowCount();
    }
    public function updateLogin($failed_attempts, $email) {
      $arguments['failedA'] = $failed_attempts;
      $arguments['email'] = $email;

      $sql = "update users set failed_attempts = :failedA where email like :email";
      $this->db->runSql($sql, $arguments)->rowCount();
    }
	public function insertForm($user_pass, $user_email, $timestamp, $firstName, $middleName, $lastName, $phoneNumber)
	{
		$arguments = [];
		$arguments['user_pass'] =  $user_pass;
		$arguments['user_email'] =  $user_email;
		$arguments['timestamp'] = $timestamp;
		$arguments['firstName'] =  $firstName;
		$arguments['middleName'] =  $middleName;
		$arguments['lastName'] = $lastName;
		$arguments['phoneNumber'] = $phoneNumber;



		$sql = "INSERT INTO  users (pass, email, time_stamp_created,  first_name, middle_names, last_name, phone_number, admin) VALUES ( ";
		$sql .= ":user_pass, :user_email, :timestamp, :firstName, :middleName, :lastName, :phoneNumber, 0)";
		return $this->db->runSql($sql, $arguments);

	}
  public function insertFormAdmin($user_pass, $user_email, $timestamp, $firstName, $middleName, $lastName, $phoneNumber)
	{
		$arguments = [];
		$arguments['user_pass'] =  $user_pass;
		$arguments['user_email'] =  $user_email;
		$arguments['timestamp'] = $timestamp;
		$arguments['firstName'] =  $firstName;
		$arguments['middleName'] =  $middleName;
		$arguments['lastName'] = $lastName;
		$arguments['phoneNumber'] = $phoneNumber;



		$sql = "INSERT INTO  users (pass, email, time_stamp_created,  first_name, middle_names, last_name, phone_number, admin) VALUES ( ";
		$sql .= ":user_pass, :user_email, :timestamp, :firstName, :middleName, :lastName, :phoneNumber, 1)";
		return $this->db->runSql($sql, $arguments);

	}
	public function enterTerms($terms, $class, $mainSite) {
		$arguments['terms'] = $terms;
		$arguments['cId'] = $class;
		$arguments['mainSite'] = $mainSite;
		$sql = "insert into terms (terms, class_id, main_site) values (:terms, :cId, :mainSite)";
		return $this->db->runSql($sql, $arguments);
	}
	public function updateAcceptTerms($id) {
		$arguments['id'] = $id;
		$sql = "update users set accepted_terms = 1 where user_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	   public function getTermsMain()
		{
		$sql = "SELECT * from terms WHERE  main_site LIKE 1";
		return $this->db->runsql($sql)->fetch();
	}
	public function getTerms($id)
		{
			$arguments['id'] = $id;
		$sql = "SELECT * from terms WHERE  class_id LIKE :id";
		return $this->db->runsql($sql, $arguments)->fetch();
	}
    public function insertIntoClass($classDescription, $name, $administratorId) {
        $arguments['name'] = $name;
        $arguments['id'] = $administratorId;
        $arguments['descriptionOfClass'] = $classDescription;

        $sql = "INSERT INTO  classes (description_of_class, class_name, user_id, live) ";
        $sql .= " VALUES (:descriptionOfClass, :name, :id, 0)";
		$this->db->runsql($sql, $arguments);
		$args1['name'] = $name;
		$sql = "select * from classes where class_name like :name";
		$row = $this->db->runSql($sql, $args1)->fetch();
		$args2['cId'] = $row['class_id'];
		for($i = 1; $i < 31; $i++) {
			$sql = "insert into  tables (table_id, subject_information, class_id, live, version) values ($i, 'empty', :cId, 0, 1)";
			$this->db->runSql($sql, $args2);
		}
		return $args2['cId'];
	}
	public function deleteClassFromTable($classId) {
		$arguments['cId'] = $classId;
		$sql = "delete from tables where class_id like :cId";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function deleteClassFromClasses($classId) {
		$arguments['cId'] = $classId;
		$sql = "delete from classes where class_id like :cId";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
		public function selectClassRowViaName($className) {
			$arguments['name'] = $className;
			$sql = "select * from classes where class_name like :name";
			return $this->db->runSql($sql, $arguments)->fetch();
		}
		public function getClassRow($caseNum)
    {
        $arguments['caseNum'] = $caseNum;
        $sql = "SELECT * from classes WHERE  class_id LIKE :caseNum";
        return $this->db->runsql($sql, $arguments)->fetch();
    }
		public function getClassRowViaName($name)
    {
        $arguments['name'] = $name;
        $sql = "SELECT * from classes WHERE  class_name LIKE :name";
        return $this->db->runsql($sql, $arguments)->fetch();
    }
	public function selectAdministratorViaUserId($userId) {
		$arguments['userId'] = $userId;
		$sql = "select * from administrator WHERE  user_id LIKE :userId";
		return $this->db->runsql($sql, $arguments)->fetch();
	}
	 public function selectAdminViaUserId($userId) {
		$arguments['userId'] = $userId;
		$sql = "select * from administrator WHERE  user_id LIKE :userId";
		$row = $this->db->runsql($sql, $arguments)->fetch();

		$result = [ 'root' => 0,
					'can_add_and_delete' => 0,
					'can_delete_all' => 0,
					'can_remove_class' => 0,
					'admin' => 0,
					'viewer' => 0,

				];
		if ($row != false){
		$result['administrator_id'] = $row['administrator_id'];
		$result['admin'] = 1;
		if ($row['all_access_administrator'] == 1) {
			$result['root'] = 1;

		}
		if ($row['can_add_and_delete_questions_and_assign_names'] == 1) {
			$result['can_add_and_delete'] = 1;

		}
		if ($row['can_delete_all_from_subject'] == 1 ) {
			$result['can_delete_all'] = 1;

		}
		if ($row['can_remove_class'] == 1 ) {
			$result['can_remove_class'] = 1;

			}
		if ($row['viewer']) {
			$result['viewer'] = 1;

		}

		}
		if ($row = false) {

			$result = false;
		}

		return $result;

		}
	public function getViaId($id) {
        $arguments['id'] = $id;
        $sql = "SELECT * from users WHERE  user_id LIKE :id";
        return $this->db->runSql($sql, $arguments)->fetch();
    }
	public function selectViaEmail($email)
	{
		$arguments['email'] = $email;
		$sql = "SELECT *, concat(first_name, ', ', last_name) as concat_full_name from users WHERE  email LIKE :email";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectViaEmailArray($email)
	{
		$email = '%' . $email . '%';
		$arguments['email'] = $email;
		$sql = "SELECT *, concat(first_name, ', ', middle_names,', ', last_name) as concat_full_name from users WHERE  email LIKE :email";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
	public function updateQuestionName($questionIdsId, $name) {
		$arguments['questionIdsId'] = $questionIdsId;
		$arguments['name'] = $name;
		$sql = "update question_ids set description = :name where question_id like :questionIdsId";
		return $this->db->runSql($sql, $arguments)->rowCount();

	}
	public function selectClassViaName($name) {
		$arguments['name'] = $name;
		$sql = "select * from classes where class_name like :name";
		return $this->db->runSql($sql, $arguments)->fetch();

	}
	public function getRowViaEmail($email) {
		$arguments['email'] = $email;
		$sql = "select * from users where email like :email";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectViaFirstLastName($firstName, $lastName) {
		$arguments['firstName'] = $firstName;
		$arguments['lastName'] = $lastName;
		$sql = "select *, concat(first_name, ', ', middle_names, ', ', last_name) as concat_full_name ";
		$sql .= "from users where first_name like :firstName and last_name like :lastName";
		return $this->db->runSql($sql, $arguments)->fetchAll();

	}
	public function selectViaFirst($firstName) {
		$arguments['firstName'] = $firstName;
		$sql = "select *, concat(first_name, ', ', middle_names, ', ', last_name) as concat_full_name ";
		$sql .= "from users where first_name like :firstName";
		return $this->db->runSql($sql, $arguments)->fetchAll();

	}


public function selectAdminViaEmail($email) {
    $arguments['email'] = $email;
    $sql = "select *, a.root from administrator a left outer join users u on a.user_id = u.user_id ";
    $sql .= "where u.email like :email";
    return $this->db->runsql($sql, $arguments)->fetch();
}

 public function getAdministratorViaId($iD) {

		$arguments['iD'] = $iD;

        $sql = "SELECT * FROM (SELECT concat(us.first_name, ' ', us.last_name) as creator_name, ";
		$sql .= "a.user_id, u.email, u.phone_number, u.last_name, u.first_name, a.all_access_administrator, ";
		$sql .= "concat(u.first_name, ' ', u.last_name) as concat_full_name, ";
		$sql .= "a.administrator_id, a.creator, a.timestamp from administrator ";
		$sql .= "a LEFT OUTER JOIN users u ON a.user_id = u.user_id LEFT OUTER JOIN";
        $sql .= " users us on a.creator = us.user_id where a.administrator_id like :iD) t";
        $results = $this->db->runsql($sql, $arguments)->fetch();
		return $results;
	}
    public function getAllAdministrators($page, $limit) {


		$sql = "SELECT count(*) as count FROM administrator";
		$results[0] = $this->db->runSql($sql)->fetch();

		$offset = ($page - 1) * $limit;
		$limit = strval($limit);
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = preg_replace($patterns, $replacements, $limit);

        $sql = "SELECT * FROM (SELECT concat(us.first_name, ' ', us.last_name) as creator_name, ";
		$sql .= "a.user_id, a.viewer, u.email, u.phone_number, u.last_name, u.first_name, a.all_access_administrator, ";
		$sql .= "concat(u.first_name, ' ', u.last_name) as concat_full_name, ";
		$sql .= "a.administrator_id, a.creator, a.timestamp from administrator ";
		$sql .= "a LEFT OUTER JOIN users u ON ";
        $sql .= "a.user_id = u.user_id LEFT OUTER JOIN users us on a.creator = us.user_id) t ORDER BY last_name, first_name ";
		$sql .= "offset " . $offset . " rows fetch next " . $limit . " rows only";
        $results[1] = $this->db->runsql($sql)->fetchAll();
		return $results;
	}

	public function updatePassword($id, $password) {
		$arguments['password'] = $password;
		$arguments['id'] = $id;
		$sql = "update users set pass = :password where user_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
   }

   public function updateInfo($email, $phone, $id, $firstName, $middleNames, $sirName) {
		$arguments['email'] = $email;
		$arguments['phone'] = $phone;
		$arguments['firstName'] = $firstName;
		$arguments['middleNames'] = $middleNames;
		$arguments['sirName'] = $sirName;
		$arguments['id'] = $id;
		$sql = "update users set email = :email, phone_number = :phone, first_name = :firstName, middle_names = :middleNames, last_name = :sirName where user_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
   }
	public function selectAdminViaLastName($lastName) {
		$arguments['lastName'] = $lastName;
		$sql = "select *, concat(first_name, ', ', last_name) as concat_full_name from administrator a right outer join users u on a.user_id = u.user_id ";
		$sql .= "where last_name like :lastName order by last_name";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
	public function selectViaLast($lastName) {
		$arguments['lastName'] = $lastName;
		$sql = "select *, concat(first_name, ', ', middle_names, ', ', last_name) as concat_full_name from users ";
		$sql .= "where last_name like :lastName order by last_name";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
   public function createAdmin($administrator, $creator, $timestamp, $superUser, $viewer) {
	   $arguments['admin'] = $administrator;
	   $arguments['creator'] = $creator;
	   $arguments['timestamp'] = $timestamp;
	   $arguments['super'] = $superUser;
	   $arguments['viewer'] = $viewer;

			$sql = "insert into administrator (user_id, all_access_administrator, can_add_and_delete_questions_and_assign_names, ";
		    $sql .= "can_delete_all_from_subject, can_remove_class, creator, timestamp, viewer) values (:admin, :super, 0, 0, 0, ";
		    $sql .= ":creator, :timestamp, :viewer)";
		$args['userId'] = $administrator;
		$sqlTwo = "update users set admin = 1 where user_id like :userId";
		$arr[0] = $this->db->runSql($sqlTwo, $args)->rowCount();

		$arr[1] = $this->db->runSql($sql, $arguments)->rowCount();
		return $arr;

   }
   public function updateAdmin($administrator_id, $superUser, $viewer, $standard) {

		$arguments['adminId'] = $administrator_id;
$args['userId'] = $administrator_id;
	if ($standard == 0) {

		$arguments['superUser'] = $superUser;
		$arguments['viewer'] = $viewer;
		$sql = "update administrator set all_access_administrator = :superUser, viewer = :viewer where administrator_id like :adminId";

    $sqlTwo = "update users set admin = 1 where user_id like :userId";
    $arr[0] = $this->db->runSql($sqlTwo, $args)->rowCount();

    $arr[1] = $this->db->runSql($sql, $arguments)->rowCount();
  	return $arr;
	} else {

		$sql = "update administrator set all_access_administrator = 0, viewer = 0 where administrator_id like :adminId";
    $sqlTwo = "update users set admin = 1 where user_id like :userId";
    $arr[0] = $this->db->runSql($sqlTwo, $args)->rowCount();

    $arr[1] = $this->db->runSql($sql, $arguments)->rowCount();
  	return $arr;
  }


   }
		public function selectClassViaId($iD) {
		$arguments['iD'] = $iD;
		$sql = "select * from classes where class_id like :iD";
		return $this->db->runSql($sql, $arguments)->fetch();

		}
		public function deleteAdminViaId($iD) {
			$arguments['iD'] = $iD;
			$sql = "delete from administrator where user_id like :iD";

			$sqlTwo = "update users set admin = 0 where user_id like :iD";
			$one = $this->db->runSql($sqlTwo, $arguments)->rowCount();
			$two = $this->db->runSql($sql, $arguments)->rowCount();
			$three = $one + $two;
			if ($three == 2) {
				$result = 1;
			} else {
				$result = 0;
			}
			return $result;
		}
		public function saveChanges() {

$arguments['a0'] = $_SESSION['siteSettings']['soibip'] ;
$arguments['a1'] = $_SESSION['siteSettings']['solipip'];
$arguments['a2'] = $_SESSION['siteSettings']['soripip'];
$arguments['a3'] = $_SESSION['siteSettings']['pombw'];
$arguments['a4'] = $_SESSION['siteSettings']['polsw'];
$arguments['a5'] = $_SESSION['siteSettings']['porsw'];
$arguments['a6'] = $_SESSION['siteSettings']['hobbip'];
$arguments['a7'] = $_SESSION['siteSettings']['dfhb'];
$arguments['a8'] = $_SESSION['siteSettings']['efhb'];
$arguments['a9'] = $_SESSION['siteSettings']['enableMovingBars'];
$arguments['a10'] = $_SESSION['siteSettings']['disableMovingBars'];
$arguments['a11'] = $_SESSION['siteSettings']['dls'];
$arguments['a12'] = $_SESSION['siteSettings']['els'];
$arguments['a13'] = $_SESSION['siteSettings']['ers'];
$arguments['a14'] = $_SESSION['siteSettings']['drs'];
$arguments['a15'] = $_SESSION['siteSettings']['ecb'];
$arguments['a16'] = $_SESSION['siteSettings']['dcb'];
$arguments['a17'] = $_SESSION['siteSettings']['embpb'];
$arguments['a18'] = $_SESSION['siteSettings']['dmbpb'];
$arguments['a19'] = $_SESSION['siteSettings']['emapb'];
$arguments['a20'] = $_SESSION['siteSettings']['dmapb'];
$arguments['a21'] = $_SESSION['siteSettings']['enableBackgroundPicture'];
$arguments['a22'] = $_SESSION['siteSettings']['disableBackgroundPicture'];
$arguments['a23'] = $_SESSION['siteSettings']['cotisp'];
$arguments['a24'] = $_SESSION['siteSettings']['rSideColour'];
$arguments['a25'] = $_SESSION['siteSettings']['mbc'];
$arguments['a26'] = $_SESSION['siteSettings']['lBarc'];
$arguments['a27'] = $_SESSION['siteSettings']['tc'];
$arguments['a28'] = $_SESSION['siteSettings']['coib'];
$arguments['a29'] = $_SESSION['siteSettings']['siteH'];
$arguments['a30'] = $_SESSION['siteSettings']['cotiib'];
$arguments['a31'] = $_SESSION['siteSettings']['cospb'];
$arguments['a32'] = $_SESSION['siteSettings']['bc'];
$arguments['a33'] = $_SESSION['siteSettings']['cotiqp'];
$arguments['a34'] = $_SESSION['siteSettings']['coqaab'];
$arguments['a35'] = $_SESSION['siteSettings']['cotiqaab'];
$arguments['a36'] = $_SESSION['siteSettings']['coqb'];
$arguments['a37'] = $_SESSION['siteSettings']['qbc'];
$arguments['nam'] = $_SESSION['siteSettings']['info'];

$arguments['a38'] = $_SESSION['siteSettings']['mabp'];
$arguments['a39'] = $_SESSION['siteSettings']['cbp'];
$arguments['a40'] = $_SESSION['siteSettings']['mbp'];
$arguments['a41'] = $_SESSION['siteSettings']['bposa'];
$arguments['a42'] = $_SESSION['siteSettings']['bpota'];

$arguments['a43'] = $_SESSION['siteSettings']['tWritting'];
$arguments['a44'] = $_SESSION['siteSettings']['writting'];
$arguments['a45'] = $_SESSION['siteSettings']['soqipip'];
$arguments['a46'] = $_SESSION['siteSettings']['mboc'];
$sql = "insert into site_settings (profile_name, soibip, solipip, soripip, pombw, polsw, porsw, hobbip, dfhb, efhb, enableMovingBars, disableMovingBars, dls, els, ";
$sql .= "ers, drs, ecb, dcb, embpb, dmbpb, emapb, dmapb, enableBackgroundPicture, disableBackgroundPicture, cotisp, rSideColour, ";
$sql .= " mbc, lBarc, tc, coib, siteH, cotiib, cospb, bc, cotiqp, coqaab, cotiqaab, coqb, qbc, mabp, cbp, mbp, bposa, bpota, tWritting, writting, soqipip, mboc) values (:nam, :a0, :a1, :a2, :a3, :a4, :a5, :a6,";
$sql .= " :a7, :a8, :a9, :a10, :a11, :a12, :a13, :a14, :a15, :a16, :a17, :a18, :a19, :a20, :a21, :a22, :a23, :a24, :a25, :a26, :a27, :a28, :a29, :a30, :a31, ";
$sql .= ":a32, :a33, :a34, :a35, :a36, :a37, :a38, :a39, :a40, :a41, :a42, :a43, :a44, :a45, :a46)";
return $this->db->runSql($sql, $arguments);


}

	public function selectStyles() {
		$sql = "select id, profile_name from site_settings;";
		return $this->db->runSql($sql)->fetchAll();
	}

	public function selectStyle($id) {
		$arguments['id'] = $id;
		$sql = "select * from site_settings where id like :id";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function updateUserStyle() {
		$arguments['id'] = $_SESSION['layoutOfSite']['id'];
		$arguments['userId'] = $_SESSION['id'];
		$sql = "update users set style = :id where user_id like :userId";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function deleteStyle() {
		$arguments['id'] = $_SESSION['delStyle'];
		$sql = "delete from site_settings where id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function selectStyleFromUser($id) {
		$arguments['uId'] = $_SESSION['id'];
		$sql = "select * from site_settings where id like :uId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function saveUpdatedSiteSettings($id) {
		$arguments['a0'] = $_SESSION['siteSettings']['soibip'] ;
$arguments['a1'] = $_SESSION['siteSettings']['solipip'];
$arguments['a2'] = $_SESSION['siteSettings']['soripip'];
$arguments['a3'] = $_SESSION['siteSettings']['pombw'];
$arguments['a4'] = $_SESSION['siteSettings']['polsw'];
$arguments['a5'] = $_SESSION['siteSettings']['porsw'];
$arguments['a6'] = $_SESSION['siteSettings']['hobbip'];
$arguments['a7'] = $_SESSION['siteSettings']['dfhb'];
$arguments['a8'] = $_SESSION['siteSettings']['efhb'];
$arguments['a9'] = $_SESSION['siteSettings']['enableMovingBars'];
$arguments['a10'] = $_SESSION['siteSettings']['disableMovingBars'];
$arguments['a11'] = $_SESSION['siteSettings']['dls'];
$arguments['a12'] = $_SESSION['siteSettings']['els'];
$arguments['a13'] = $_SESSION['siteSettings']['ers'];
$arguments['a14'] = $_SESSION['siteSettings']['drs'];
$arguments['a15'] = $_SESSION['siteSettings']['ecb'];
$arguments['a16'] = $_SESSION['siteSettings']['dcb'];
$arguments['a17'] = $_SESSION['siteSettings']['embpb'];
$arguments['a18'] = $_SESSION['siteSettings']['dmbpb'];
$arguments['a19'] = $_SESSION['siteSettings']['emapb'];
$arguments['a20'] = $_SESSION['siteSettings']['dmapb'];
$arguments['a21'] = $_SESSION['siteSettings']['enableBackgroundPicture'];
$arguments['a22'] = $_SESSION['siteSettings']['disableBackgroundPicture'];
$arguments['a23'] = $_SESSION['siteSettings']['cotisp'];
$arguments['a24'] = $_SESSION['siteSettings']['rSideColour'];
$arguments['a25'] = $_SESSION['siteSettings']['mbc'];
$arguments['a26'] = $_SESSION['siteSettings']['lBarc'];
$arguments['a27'] = $_SESSION['siteSettings']['tc'];
$arguments['a28'] = $_SESSION['siteSettings']['coib'];
$arguments['a29'] = $_SESSION['siteSettings']['siteH'];
$arguments['a30'] = $_SESSION['siteSettings']['cotiib'];
$arguments['a31'] = $_SESSION['siteSettings']['cospb'];
$arguments['a32'] = $_SESSION['siteSettings']['bc'];
$arguments['a33'] = $_SESSION['siteSettings']['cotiqp'];
$arguments['a34'] = $_SESSION['siteSettings']['coqaab'];
$arguments['a35'] = $_SESSION['siteSettings']['cotiqaab'];
$arguments['a36'] = $_SESSION['siteSettings']['coqb'];
$arguments['a37'] = $_SESSION['siteSettings']['qbc'];
$arguments['nam'] = $_SESSION['siteSettings']['info'];

$arguments['a38'] = $_SESSION['siteSettings']['mabp'];
$arguments['a39'] = $_SESSION['siteSettings']['cbp'];
$arguments['a40'] = $_SESSION['siteSettings']['mbp'];
$arguments['a41'] = $_SESSION['siteSettings']['bposa'];
$arguments['a42'] = $_SESSION['siteSettings']['bpota'];

$arguments['a43'] = $_SESSION['siteSettings']['tWritting'];
$arguments['a44'] = $_SESSION['siteSettings']['writting'];
$arguments['a45'] = $_SESSION['siteSettings']['soqipip'];
$arguments['id'] = $id;

		$sql = "update site_settings set profile_name = :nam, soibip = :a0, solipip = :a1, soripip = :a2, pombw = :a3, polsw = :a4, porsw = :a5, hobbip = :a6, dfhb = :a7, efhb = :a8, enableMovingBars = :a9, disableMovingBars = :a10, dls = :a11, els = :a12, ";
		$sql .= "ers = :a13, drs = :a14, ecb = :a15, dcb = :a16, embpb = :a17, dmbpb = :a18, emapb = :a19, dmapb = :a20, enableBackgroundPicture = :a21, disableBackgroundPicture = :a22, cotisp = :a23, rSideColour = :a24, ";
		$sql .= " mbc = :a25, lBarc = :a26, tc = :a27, coib = :a28, siteH = :a29, cotiib = :a30, cospb = :a31, bc = :a32, cotiqp = :a33, coqaab = :a34, cotiqaab = :a35, coqb = :a36, qbc = :a37, mabp = :a38, cbp = :a39, mbp = :a40, ";
		$sql .= " bposa = :a41, bpota = :a42, tWritting = :a43, writting = :a44, soqipip = :a45";
		$sql .= " where id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();

	}
  public function deletePreviousUsers($date) {
    $arguments['date'] = $date;
    $sql1 = 'delete from users where time_stamp_created < :date and admin = 0';


    $arguments2['id'] = $_SESSION['id'];
    $arguments2['time'] = date('now');
    $sql = 'insert into usersDeletedBy (user_id, timestamp) values (:id, :time)';
    $this->db->runsql($sql, $arguments2);

    return $this->db->runSql($sql1, $arguments)->rowCount();


  }
}
