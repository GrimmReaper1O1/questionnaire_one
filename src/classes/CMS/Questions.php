<?php
namespace MySite\CMS;                                   // Declare namespace

class Questions
{
protected $db;
public function __construct(Database $db)
{
    $this->db = $db;
}

// Do this below preg replace to ensure people cant add strings $subjectId * 1; will throw error instead of allowing intrusion.

	public function updateClassName($id, $name){
		$arguments['id'] = $id;
		$arguments['name'] = $name;
		$sql = "update classes set class_name = :name where class_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function updateClassMakeLive($id) {
		$arguments['id'] = $id;
		$sql = "update classes set live = 1 where class_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function updateClassNotLive($id) {
		$arguments['id'] = $id;
		$sql = "update classes set live = 0 where class_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function updateSubjectMakeLive($id) {
		$arguments['id'] = $id;
		$sql = "update tables set live = 1, version = version + 1 where id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function updateSubjectNotLive($id) {
		$arguments['id'] = $id;
		$sql = "update tables set live = 0 where id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}


	public function selectAllClasses($page, $limit) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = $limit * 1;



		$sql = "select count(*) as count from (select * from classes";
		$sql .= ") t";
		$results[0] = $this->db->runSql($sql)->fetch();
		$offset = ($page - 1) * $limit;


		$limit = preg_replace($patterns, $replacements, $limit);
		$sql = "select * from (select c.live, c.class_name, c.description_of_class, c.user_id, c.class_id, ";
		$sql .= "concat(u.first_name, ', ', u.last_name) as author from classes c left outer join ";
		$sql .= "users u on c.user_id = u.user_id) t order by class_name offset " . $offset;
		$sql .= " rows fetch next " . $limit . " rows only";
		$results[1] = $this->db->runSql($sql)->fetchAll();
		return $results;
	}
		public function selectAllClassesLive($page, $limit) {
			$patterns[0] = '/;/';
			$patterns[1] = '/go/';
			$replacements[0] = '';
			$replacements[1] = '';
			$limit = strval($limit);



		$sql = "select count(*) as count from (select * from classes where live like 1";
		$sql .= ") t";
		$results[0] = $this->db->runSql($sql)->fetch();
		$offset = ($page - 1) * $limit;



		$limit = preg_replace($patterns, $replacements, $limit);
		$sql = "select * from (select c.live, c.class_name, c.description_of_class, c.user_id, c.class_id, ";
		$sql .= "concat(u.first_name, ', ', u.last_name) as author from classes c left outer join ";
		$sql .= "users u on c.user_id = u.user_id where live like 1) t order by class_name offset " . $offset;
		$sql .= " rows fetch next " . $limit . " rows only";
		$results[1] = $this->db->runSql($sql)->fetchAll();
		return $results;
	}
	public function selectAllClassesViaLetter($page, $limit, $letter) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = strval($limit);
		$letter = preg_replace($patterns, $replacements, $letter);


		$sql = "select count(*) as count from (select * from classes where left(class_name, 1) like '" . $letter . "' ";
		$sql .=  ") t";
		$results[0] = $this->db->runSql($sql)->fetch();
		$offset = ($page - 1) * $limit;



		$limit = preg_replace($patterns, $replacements, $limit);
		$sql = "select c.live, c.class_name, c.description_of_class, c.user_id, c.class_id, ";
		$sql .= "concat(u.first_name, ', ', u.last_name) as author from Classes c left outer join ";
		$sql .= "users u on c.user_id = u.user_id where left(c.class_name, 1) like '" . $letter . "' ";
		$sql .= "order by c.class_name offset " . $offset;
		$sql .= " rows fetch next " . $limit . " rows only";
		$results[1] = $this->db->runSql($sql)->fetchAll();
		return $results;
	}
	public function selectAllClassesViaLetterLive($page, $limit, $letter) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = strval($limit);
		$letter = preg_replace($patterns, $replacements, $letter);


		$sql = "select count(*) as count from (select * from classes where left(class_name, 1) like '" . $letter . "' ";
		$sql .=  "and live like 1) t";
		$results[0] = $this->db->runSql($sql)->fetch();
		$offset = ($page - 1) * $limit;



		$limit = preg_replace($patterns, $replacements, $limit);
		$sql = "select c.live, c.class_name, c.description_of_class, c.user_id, c.class_id, ";
		$sql .= "concat(u.first_name, ', ', u.last_name) as author from Classes c left outer join ";
		$sql .= "users u on c.user_id = u.user_id where live like 1 and left(c.class_name, 1) like '" . $letter . "' ";
		$sql .= "order by c.class_name offset " . $offset;
		$sql .= " rows fetch next " . $limit . " rows only";
		$results[1] = $this->db->runSql($sql)->fetchAll();
		return $results;
	}
	public function deleteQuestion($id) {
		$arguments['id'] = $id;
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$subjectId = preg_replace($patterns, $replacements, $_SESSION['subject']);
		$subjectId = $subjectId * 1;


		$sql = "delete from question_information" . $subjectId . " where id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}

	public function updateClassDescription($classId, $description) {
		$arguments['cId'] = $classId;
		$arguments['description'] = $description;
		$sql = "update classes set description_of_class = :description where class_id like :cId";
		return $this->db->runSql($sql, $arguments)->rowCount();

	}



	public function deleteFromSubjectsTableViaClassId($classId) {

		$arguments['cId'] = $classId;
		$sql = "delete from tables where class_id like :cId";
		return $this->db->runSql($sql, $arguments)->rowCount();

	}
	public function deleteFromQuestionDescriptionViaClassId($classId) {
		$arguments['cId'] = $classId;

		$sql = "delete from question_ids where class_id like :cId";
		$result = $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function getQuestionInformaitonByQuestionIdtest($id) {
		$arguments['id'] = $id;
		$sql = " select * from question_information1 where question_id like :id";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
	public function deleteFromQuestionInformationViaClassIdAndSubject($subject, $classId) {
			$arguments['cId'] = $classId;
			$patterns[0] = '/;/';
			$patterns[1] = '/go/';
			$replacements[0] = '';
			$replacements[1] = '';
			$subject = preg_replace($patterns, $replacements, $subject);

			$sql = "delete from question_information" . $subject . " where class_id like :cId";
			return $this->db->runSql($sql, $arguments)->rowCount();
		}
	public function deleteFromUsersOfClassesViaClassId($classId) {
			$arguments['cId'] = $classId;
			$sql = "delete from attached_users_to_classes where class_id like :cId";
			return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function selectAllFromLibraryViaClassId($classId) {
			$arguments['cId'] = $classId;
			$sql = "select * from library where class_id like :cId";
			return $this->db->runSql($sql, $arguments)->fetchAll();

		}
		public function deleteFromLibraryViaClassId($classId) {
			$arguments['cId'] = $classId;
			$sql = "delete from library where class_id like :cId";
			return $this->db->runSql($sql, $arguments)->rowCount();

		}
	public function deleteFromTermsViaClassId($classId) {
		$arguments['cId'] = $classId;
		$sql = "delete from terms where class_id like :cId";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function deleteFromClassesViaClassId($classId) {
		$arguments['cId'] = $classId;
		$sql = "delete from classes where class_id like :cId";
		return $this->db->runSql($sql, $arguments)->rowCount();

	}
	public function updateSubjectNameAndNumberOfQuestions($id, $name, $number) {
		$arguments['id'] = $id;
		$arguments['name'] = $name;
		$arguments['number'] = $number;
		$sql = "update tables set subject_information = :name, number_of_questions = :number where id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}

	public function selectAllFromSubjectsAdmin($classId) {
		$arguments['cId'] = $classId;
		$sql = "select * from (select  t.id, t.live, t.table_id, t.subject_information, t.number_of_questions, t.class_id, c.class_name, c.description_of_class ";
		$sql .= " from tables t inner join classes c on t.class_id = c.class_id where t.class_id like :cId ) t ";
		$sql .= "";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
	public function selectAllFromSubjects($classId) {
		$arguments['cId'] = $classId;
		$sql = "select * from (select t.live, t.id, t.table_id, t.subject_information, t.number_of_questions, t.class_id, c.class_name, c.description_of_class ";
		$sql .= " from tables t inner join classes c on t.class_id = c.class_id where t.class_id like :cId ) t ";
		$sql .= "order by subject_information";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
	public function selectAllFromSubjectsLive($classId) {
		$arguments['cId'] = $classId;
		$sql = "select * from (select t.live, t.id, t.table_id, t.subject_information, t.number_of_removal, t.class_id, c.class_name, c.description_of_class ";
		$sql .= " from tables t inner join classes c on t.class_id = c.class_id where t.class_id like :cId and t.live like 1) t ";
		$sql .= "order by subject_information";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
	public function selectSubjectViaTableId($tableId) {
		$arguments['tableId'] = $tableId;
		$sql = "select * from tables where table_id like :tableId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectSubjectViaSubjectId($sId) {
		$arguments['sId'] = $sId;
		$sql = "select * from tables where id like :sId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectSubjectViaTableIdAndClassId() {
		$arguments['tableId'] = $_SESSION['subject'];
		$arguments['cId'] = $_SESSION['site']['cId'];
		$sql = "select * from tables where table_id like :tableId and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectSubjectViaTableIdAndClassIdMan($subject, $class) {
		$arguments['tableId'] = $subject;
		$arguments['cId'] = $class;
		$sql = "select * from tables where table_id like :tableId and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectSubjectViaTableIdNSAndClassId($subjectId) {
		$arguments['tableId'] = $subjectId;
		$arguments['cId'] = $_SESSION['site']['cId'];
		$sql = "select * from tables where table_id like :tableId and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectSubjectViaId($subjectId) {
		$arguments['id'] = $subjectId;
		$sql = "select * from tables where id like :id";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectMaxNumberFromSubject() {
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['subject'] = $_SESSION['subject'];
		$sql = "select max(question_number) as max from question_ids ";
		$sql .= "where table_id like :subject and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->fetch();

	}
	public function updateSubjectRemoveQuestion($removeNumber){
		$arguments['subject'] = $_SESSION['subject'];
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['removeNumber'] = $removeNumber;
		$sql = "update tables set number_of_removal = :removeNumber where ";
		$sql .= "class_id like :cId and table_id like :subject";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function selectSubjectViaSubjectName($name) {
		$arguments['name'] = $name;
		$sql = "select * from tables where subject_information like :name";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function updateSubjects($subject, $id) {

		$arguments['entry'] = $subject;
		$arguments['id'] = $_SESSION['subject'];
		$arguments['cId'] = $_SESSION['site']['cId'];
		$sql = "update tables set subject_information = :entry ";
		$sql .= "where table_id like :id and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function updateSubjectsInitial($subject, $numeralOfRemoval, $numberOfQuestions,
		$l1, $l2, $l3, $l4, $l5, $l6, $l7, $l8,
		$l9, $l10, $d1, $d2, $d3, $d4,
		$d5, $d6, $d7, $d8, $d9, $d10,
		$sD) {
		$arguments['sD'] = $sD;
		$arguments['l1'] = $l1;
		$arguments['d1'] = $d1;
		$arguments['l2'] = $l2;
		$arguments['d2'] = $d2;
		$arguments['l3'] = $l3;
		$arguments['d3'] = $d3;
		$arguments['l4'] = $l4;
		$arguments['d4'] = $d4;
		$arguments['l5'] = $l5;
		$arguments['d5'] = $d5;
		$arguments['l6'] = $l6;
		$arguments['d6'] = $d6;
		$arguments['l7'] = $l7;
		$arguments['d7'] = $d7;
		$arguments['l8'] = $l8;
		$arguments['d8'] = $d8;
		$arguments['l9'] = $l9;
		$arguments['d9'] = $d9;
		$arguments['l10'] = $l10;
		$arguments['d10'] = $d10;
		$arguments['entry'] = $subject;
		$arguments['id'] = $_SESSION['subject'];
		$arguments['num'] = $numberOfQuestions;
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['numeralOfRemoval'] = $numeralOfRemoval;
		$sql = "update tables set version = 1, subject_information = :entry, number_of_removal = :numeralOfRemoval, number_of_questions = :num,";
		$sql .= "link1 = :l1, link_description1 = :d1, link2 = :l2, link_description2 = :d2, ";
		$sql .= "link3 = :l3, link_description3 = :d3, link4 = :l4, link_description4 = :d4, ";
		$sql .= "link5 = :l5, link_description5 = :d5, link6 = :l6, link_description6 = :d6, ";
		$sql .= "link7 = :l7, link_description7 = :d7, link8 = :l8, link_description8 = :d8, ";
		$sql .= "link9 = :l9, link_description9 = :d9, link10 = :l10, link_description10 = :d10, ";
		$sql .= "introduction = :sD ";
		$sql .= "where table_id like :id and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function selectQuestionViaDescription($description) {
		$arguments['description'] = $description;
		$arguments['id'] = $_SESSION['subject'];
		$sql = "select * from question_ids where table_id like :id and description like :description";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function insertQuestionDescription($description, $questionPositionNumber){
		$arguments['id'] = $_SESSION['subject'];
		$arguments['description'] = $description;
		$arguments['position'] = $questionPositionNumber;
		$arguments['cId'] = $_SESSION['site']['cId'];
		$sql = "insert into question_ids (table_id, description, question_number, class_id) ";
		$sql .= "values (:id, :description, :position, :cId)";
		return $this->db->runSql($sql, $arguments);
	}
	public function selectQuestions($id, $page, $limit) {
		$arguments['id'] = $id;
		$arguments['cId'] = $_SESSION['site']['cId'];
		$sql = "select count(*) as count from question_ids  ";
		$sql .= "where table_id like :id and class_id like :cId";
		$results[0] = $this->db->runSql($sql, $arguments)->fetch();
		$offset = ($page - 1) * $limit;

		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = preg_replace($patterns, $replacements, $limit);
		$sql = "select * from (select q.question_id, q.table_id, q.description, ";
		$sql .= "t.live, q.question_number from question_ids q ";
		$sql .= "inner join tables t on q.table_id = t.table_id and q.class_id = t.class_id ";
		$sql .= "where t.table_id = :id and q.class_id = :cId) c  order by question_number ";
		$sql .= "offset " . $offset . " rows fetch next " . $limit . " rows only";
		$results[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		return $results;
	}

	public function insertQuestion($question, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8,
	$answ1, $answ2, $answ3, $answ4, $answ5, $answ6, $answ7, $answ8, $correctAnsw, $questionId,
	$hint1, $hint2, $hint3, $hint4, $hint5, $hint6, $hint7, $hint8) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$tableNumber = $_SESSION['subject'];
		$tableNumber = $tableNumber * 1;
		$tableNumber = preg_replace($patterns, $replacements, $tableNumber);
		$arguments['question'] = $question;
		$arguments['pa1'] = $pa1;
		$arguments['pa2'] = $pa2;
		$arguments['pa3'] = $pa3;
		$arguments['pa4'] = $pa4;
		$arguments['pa5'] = $pa5;
		$arguments['pa6'] = $pa6;
		$arguments['pa7'] = $pa7;
		$arguments['pa8'] = $pa8;
		$arguments['answ1'] = $answ1;
		$arguments['answ2'] = $answ2;
		$arguments['answ3'] = $answ3;
		$arguments['answ4'] = $answ4;
		$arguments['answ5'] = $answ5;
		$arguments['answ6'] = $answ6;
		$arguments['answ7'] = $answ7;
		$arguments['answ8'] = $answ8;
		$arguments['correct'] = $correctAnsw;
		$arguments['questionId'] = $questionId;
		$arguments['hint1'] = $hint1;
		$arguments['hint2'] = $hint2;
		$arguments['hint3'] = $hint3;
		$arguments['hint4'] = $hint4;
		$arguments['hint5'] = $hint5;
		$arguments['hint6'] = $hint6;
		$arguments['hint7'] = $hint7;
		$arguments['hint8'] = $hint8;
		$arguments['cId'] = $_SESSION['site']['cId'];
		$sql = "insert into question_information$tableNumber  (class_id, question, pa1, pa2, pa3, pa4, pa5, pa6, pa7, pa8, ";
		$sql .= "answ1, answ2, answ3, answ4, answ5, answ6, answ7, answ8, correct, question_id, hint1, hint2, hint3, ";
		$sql .= " hint4, hint5, hint6, hint7, hint8) values ";
		$sql .= "(:cId, :question, :pa1, :pa2, :pa3, :pa4, :pa5, :pa6, :pa7, :pa8, :answ1, :answ2, :answ3, :answ4, :answ5, ";
		$sql .= ":answ6, :answ7, :answ8, :correct, :questionId, :hint1, :hint2, :hint3, :hint4, :hint5, :hint6, :hint7, :hint8)";
		return $this->db->runSql($sql, $arguments);
	}
	public function updateQuestion($id, $question, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8,
	$answ1, $answ2, $answ3, $answ4, $answ5, $answ6, $answ7, $answ8, $correctAnsw, $questionId,
	$hint1, $hint2, $hint3, $hint4, $hint5, $hint6, $hint7, $hint8) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$tableNumber = preg_replace($patterns, $replacements, $_SESSION['subject']);
		$arguments['question'] = $question;
		$arguments['id'] = $id;
		$arguments['pa1'] = $pa1;
		$arguments['pa2'] = $pa2;
		$arguments['pa3'] = $pa3;
		$arguments['pa4'] = $pa4;
		$arguments['pa5'] = $pa5;
		$arguments['pa6'] = $pa6;
		$arguments['pa7'] = $pa7;
		$arguments['pa8'] = $pa8;
		$arguments['answ1'] = $answ1;
		$arguments['answ2'] = $answ2;
		$arguments['answ3'] = $answ3;
		$arguments['answ4'] = $answ4;
		$arguments['answ5'] = $answ5;
		$arguments['answ6'] = $answ6;
		$arguments['answ7'] = $answ7;
		$arguments['answ8'] = $answ8;
		$arguments['correct'] = $correctAnsw;
		$arguments['questionId'] = $questionId;
		$arguments['hint1'] = $hint1;
		$arguments['hint2'] = $hint2;
		$arguments['hint3'] = $hint3;
		$arguments['hint4'] = $hint4;
		$arguments['hint5'] = $hint5;
		$arguments['hint6'] = $hint6;
		$arguments['hint7'] = $hint7;
		$arguments['hint8'] = $hint8;
		$sql = "update question_information" . $tableNumber . " set question = :question, pa1 = :pa1, pa2 = :pa2, pa3 = :pa3, ";
		$sql .= "pa4 = :pa4, pa5 = :pa5, pa6 = :pa6, pa7 = :pa7, pa8 = :pa8, answ1 = :answ1, answ2 = :answ2, answ3 = :answ3, ";
		$sql .= "answ4 = :answ4, answ5 = :answ5, answ6 = :answ6, answ7 = :answ7, answ8 = :answ8, correct = :correct, ";
		$sql .= "question_id = :questionId, hint1 = :hint1, hint2 = :hint2, hint3 = :hint3, hint4 = :hint4, hint5 = :hint5, ";
		$sql .= "hint6 = :hint6, hint7 = :hint7, hint8 = :hint8 where id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}

	public function countNumberOfQuestions($questionNumber) {
		$arguments['questionId'] = $questionNumber;
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$_SESSION['subject'] = preg_replace($patterns, $replacements, $_SESSION['subject']);
		$sql = "select count(*) as count from question_information" . $_SESSION['subject'];
		$sql .= " where question_id like :questionId";
		return $this->db->runSql($sql, $arguments)->fetch();

	}

	public function countQuestionIds() {
		$arguments['cId'] = $_SESSION['site']['cId'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$_SESSION['subject'] = preg_replace($patterns, $replacements, $_SESSION['subject']);

		$sql = "select count(*) as count from (select q.question_id from question_ids q right outer join question_information" .$_SESSION['subject'] ." i on q.question_id = i.question_id where q.class_Id like :cId";
		$sql .= "  group by q.question_id) t";
		return $this->db->runSql($sql, $arguments)->fetch();
	}

	public function selectQuestionIdsPagination($page, $limit) {
		$arguments['cId'] = $_SESSION['site']['cId'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$_SESSION['subject'] = preg_replace($patterns, $replacements, $_SESSION['subject']);
		$arguments['tableId'] = $_SESSION['subject'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';

		$limit = intval($limit);
		$limit = preg_replace($patterns, $replacements, $limit);
		$limit = $limit * 1;

		$offset = ($page - 1) * $limit;

		$sql = "select q.question_id from question_ids q right outer join question_information" . $_SESSION['subject'] . " i on q.question_id = i.question_id ";
		$sql .= " where q.class_id like :cId and ";
		$sql .= "q.table_id like :tableId group by q.question_id order by q.question_id offset ";
		$sql .= $offset . " rows fetch next " . $limit . " rows only";
		$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		return $result;

}

	public function selectAllQuestionsFromSubjectPagination($page, $limit) {
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['tableId'] = $_SESSION['subject'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = intval($limit);
		$limit = preg_replace($patterns, $replacements, $limit);
		$sql = "select count(*) as count from question_ids where class_Id like :cId";
		$sql .= " and table_id like :tableId order by question_number, question_id";
		$result[0] = $this->db->runSql($sql, $arguments)->fetch();

		$offset = ($page - 1) * $limit;

		$sql = "select * from question_ids where class_id like :cId and ";
		$sql .= "table_id like :tableId order by question_number offset ";
		$sql .= $offset . " rows fetch next " . $limit . " rows only";
		$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		return $result;

	}
	public function selectAllQuestionsFromSubject() {
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['tableId'] = $_SESSION['subject'];
		$sql = "select question_id from question_ids where class_id like :cId and ";
		$sql .= "table_id like :tableId order by question_number, question_id";
		$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		return $result;

	}
		public function selectAllQuestionsFromSubjectPaginationCount($page, $limit) {
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['tableId'] = $_SESSION['subject'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = intval($limit);
		$limit = preg_replace($patterns, $replacements, $limit);
		$sql = "select count(*) as count from question_ids where class_Id like :cId";
		$sql .= " and table_id like :tableId";
		$result[0] = $this->db->runSql($sql, $arguments)->fetch();

		$offset = ($page - 1) * $limit;

		$sql = "select count(*) as count from (select * from question_ids where class_id like :cId and ";
		$sql .= "table_id like :tableId order by question_number offset ";
		$sql .= $offset . " rows fetch next " . $limit . " rows only) t";
		$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		return $result;

	}
	public function countQuestionsFromQuestionsIdsPagination($page, $limit) {
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['tableId'] = $_SESSION['subject'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$offset = ($page - 1) * $limit;

		$limit = intval($limit);
		$limit = preg_replace($patterns, $replacements, $limit);
		$sql = "select count(*) as count from question_ids where class_Id like :cId ";
		$sql .= "and table_id like :tableId";

		return $this->db->runSql($sql, $arguments)->fetch();

	}


	public function selectQuestionViaQuestionAndc($question, $questionId, $correct) {
		$arguments['question'] = $question;
		$arguments['questionId'] = $questionId;
		$arguments['correct'] = $correct;
		$arguments['cId'] = $_SESSION['site']['cId'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$subjectId = $_SESSION['subject'] * 1;
		$subjectId = preg_replace($patterns, $replacements, $subjectId);
		$sql = "select * from question_information" . $subjectId . " where question ";
		$sql .= "like :question and question_id like :questionId and class_id like :cId and correct like :correct";
		return $this->db->runSql($sql, $arguments)->fetch();
	}

		public function selectQuestioninformation($questionId, $page, $limit, $subjectId) {
		$arguments['questionId'] = $questionId;
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';

		$limit = preg_replace($patterns, $replacements, $limit);

		$sql = "select count(*) as count from (select * from question_information" . $subjectId;
		$sql .= " where question_id like :questionId) t";
		$results[0] = $this->db->runSql($sql, $arguments)->fetch();
		$offset = ($page - 1) * $limit;


		$sql = "select s.id, s.question, s.question_id, s.correct, s.pa1, s.pa2, s.pa3, s.pa4, s.pa5, s.pa6, s.pa7, s.pa8, ";
		$sql .= "s.answ1, s.answ2, s.answ3, s.answ4, s.answ5, s.answ6, s.answ7, s.answ8, ";
		$sql .= "s.hint1, s.hint2, s.hint3, s.hint4, s.hint5, s.hint6, s.hint7, s.hint8 from question_information" . $subjectId;
		$sql .= " s  ";
		$sql .= " where s.question_id like :questionId order by s.id ";
		$sql .= "offset " . $offset . " rows fetch next " . $limit . " rows only";
		$results[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		return $results;
	}
	public function updateSubjectsTable($id) {
		$arguments['id'] = $id;
		$sql = "update tables set subject_information = 'empty', number_of_questions = null where table_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function deleteQuestionIds($id) {
		$arguments['id'] = $id;
		$sql = "delete from question_ids where table_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function deleteExactQuestionIds($id) {
		$arguments['id'] = $id;
		$sql = "delete from question_ids where question_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function selectToCheckQuestionNumberViaSubjectClassAndPossition($possition, $description) {
		$arguments['possition'] = $possition;
		$arguments['subject'] = $_SESSION['subject'];
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['description'] = $description;
		$sql = "select * from question_ids where (class_id like :cId and table_id like :subject) and ";
		$sql .= "(question_number like :possition or description like :description)";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
		public function deleteAllEntriesFromQuesitonInformation($subjectId) {

		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$subjectId = preg_replace($patterns, $replacements, $subjectId);
		$sql = "delete from question_information" . $subjectId;
		return $this->db->runSql($sql)->rowCount();
}
	public function deleteAllEntriesFromAQuesitonInformation($subjectId, $questionId) {
		$arguments['id'] = $questionId;
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$subjectId = preg_replace($patterns, $replacements, $subjectId);
		$sql = "delete from question_information" . $subjectId . " where question_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
}
	public function selectQuestionViaQuestionId($id) {
		$arguments['id'] = $id;
		$arguments['cId'] = $_SESSION['site']['cId'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';

		$subjectId = preg_replace($patterns, $replacements, $_SESSION['subject']);
		$sql = "select * from question_information" . $subjectId . " where id like :id and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}


	public function selectQuestionDescriptionViaQuestionId($id) {
		$arguments['questionId'] = $id;
		$arguments['cId'] = $_SESSION['site']['cId'];


		$sql = "select question_number, class_id, description, table_id, question_id from question_ids";
		$sql .= " where question_id like :questionId and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}


	public function selectQuestionIdViaQuestionId($questionId) {

		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['questionId'] = $questionId;
		$arguments['subject'] = $_SESSION['subject'];

		$sql = "select question_number, class_id, description, table_id, question_id from question_ids";
		$sql .= " where question_id like :questionId and table_id like :subject and class_id like :cId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function updateQuestionDescriptionPossition($questionId, $possition) {
		$arguments['questionId'] = $questionId;
		$arguments['possition'] = $possition;
		$sql = "update question_ids set question_number = :possition where question_id like :questionId";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}
	public function updateQuestionName(int $id, string $name) {
		$arguments['id'] = $id;
		$arguments['name'] = $name;
		$sql = "update question_ids set description = :name where question_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();

	}



	public function recordResults($percentage, $data, $timestamp, $time, $finished) {
		$arguments['timestamp'] = $timestamp;
		$arguments['realtime'] = strtotime('now');
		$arguments['percentage'] = $percentage;
		$arguments['data'] = $data;
		$arguments['user'] = $_SESSION['id'];
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['subject'] = $_SESSION['subject'];
		$arguments['time'] = $time;
		$arguments['finished'] = $finished;
		$sql = "insert into users_results (user_id, string, score, timestamp, class, subject, realtime, time_taken, finished) values ";
		$sql .= "(:user, :data, :percentage, :timestamp, :cId, :subject, :realtime, :time, :finished)";
		return $this->db->runSql($sql, $arguments);
	}

	public function recordSubjectResultsInitial($data, $maxTime) {

		$arguments['data'] = $data;
		$arguments['user'] = $_SESSION['id'];
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['subject'] = $_SESSION['subject'];
		$arguments['maxT'] = $maxTime;
		$sql = "insert into subject_results (user_id, string, class, subject, max_time) values ";
		$sql .= "(:user, :data, :cId, :subject, :maxT)";
		return $this->db->runSql($sql, $arguments);
	}

	public function updateSubjectResults($data, $maxTime) {
		$arguments['data'] = $data;
		$arguments['user'] = $_SESSION['id'];
		$arguments['cId'] = $_SESSION['site']['cId'];
		$arguments['subject'] = $_SESSION['subject'];
		$arguments['maxT'] = $maxTime;
		$sql = "update subject_results set max_time = :maxT, string = :data where user_id like :user and class like :cId and subject like :subject";
		return $this->db->runSql($sql, $arguments)->rowCount();

	}

	public function selectResultsString() {
		if (isset($_SESSION['classId'])) {
			$arguments['cId'] = $_SESSION['classId'];
			} else {
				$arguments['cId'] = $_SESSION['site']['cId'];

			}
			if (isset($_SESSION['sub'])) {
				$arguments['subject'] = $_SESSION['sub'];
				} else {
					$arguments['subject'] = $_SESSION['subject'];

				}
				if (isset($_SESSION['ident'])) {
					$arguments['id'] = $_SESSION['ident'];
					} else {
						$arguments['id'] = $_SESSION['id'];

					}

		$sql = "select string from subject_results where class like :cId and subject like :subject and user_id like :id";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectFirstResult() {
		if (isset($_SESSION['classId'])) {
			$arguments['cId'] = $_SESSION['classId'];
			} else {
				$arguments['cId'] = $_SESSION['site']['cId'];

			}
			if (isset($_SESSION['sub'])) {
				$arguments['subject'] = $_SESSION['sub'];
				} else {
					$arguments['subject'] = $_SESSION['subject'];

				}
				if (isset($_SESSION['ident'])) {
					$arguments['id'] = $_SESSION['ident'];
					} else {
						$arguments['id'] = $_SESSION['id'];

					}
		$sql = "select score, timestamp from users_results where class like :cId and subject like :subject and user_id like :id order by id offset 0 rows fetch next 1 rows only";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectMaxResult($id) {
		if (isset($_SESSION['classId'])) {
			$arguments['cId'] = $_SESSION['classId'];
			} else {
				$arguments['cId'] = $_SESSION['site']['cId'];

			}
			if (isset($_SESSION['sub'])) {
				$arguments['subject'] = $_SESSION['sub'];
				} else {
					$arguments['subject'] = $_SESSION['subject'];

				}
				$arguments['id'] = $id;
		$sql = "select max(timestamp) as fake_time, max(realtime) as realtime from users_results where class like :cId and subject like :subject and user_id like :id";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectAllResultsPagination($page, $limit, $id) {
		if (isset($_SESSION['classId'])) {
		$arguments['cId'] = $_SESSION['classId'];
		} else {
			$arguments['cId'] = $_SESSION['site']['cId'];

		}
		if (isset($_SESSION['sub'])) {
			$arguments['subject'] = $_SESSION['sub'];
			} else {
				$arguments['subject'] = $_SESSION['subject'];

			}
		$arguments['id'] = $id;

		$sql = "select count(*) as count from users_results where class like :cId and subject like :subject and user_id like :id";
		$count = $this->db->runSql($sql, $arguments)->fetch();
		$totalPages = ceil($count['count'] / $limit);
		$offset = ($page - 1) * $limit;
		$sql = "select id, score, realtime, timestamp, time_taken, finished from users_results where class like :cId and subject like :subject and user_id like :id order by id desc offset ".$offset." rows fetch next ".$limit." rows only";
		$select = $this->db->runSql($sql, $arguments)->fetchAll();
		$arry['totalPages'] = $totalPages;
		$arry['select'] = $select;
		$arry['count'] = $count;
		return $arry;
	}

	public function selectIndividualResult($scoreId) {
		$arguments['id'] = $scoreId;
		$sql = "select string, score from users_results where id like :id";
		return $this->db->runSql($sql, $arguments)->fetch();

	}
// for bio results page

public function selectUndertakenClassesViaLetter($userId, $page, $limit, $letter) {
	$arguments['userId'] = $userId;
	$arguments['letter'] = $letter;
	$patterns[0] = '/;/';
	$patterns[1] = '/go/';
	$replacements[0] = '';
	$replacements[1] = '';

	$limit = intval($limit);
	$limit = preg_replace($patterns, $replacements, $limit);
	$limit = $limit * 1;

	$offset = ($page - 1) * $limit;

	$sql = "select count(*) as count from (select c.class_name, r.class, r.user_id from classes c left join tables s ";
	$sql .= "on c.class_id = s.class_id left join users_results r on s.class_id = r.class ";
	$sql .= "group by c.class_name, r.class, r.user_id) t where user_id like :userId and left(class_name, 1) like :letter ";
	$result[0] = $this->db->runSql($sql, $arguments)->fetch();

	$sql = "select * from (select c.class_name, r.class from classes c left join tables s ";
	$sql .= "on c.class_id = s.class_id left join users_results r on s.class_id = r.class ";
	$sql .= "where r.user_id like :userId and left(c.class_name, 1) like :letter ) t group by class_name, class order by class_name ";
	$sql .= " offset $offset rows fetch next $limit rows only";
	$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();

	return $result;
}

	public function selectUndertakenClasses($userId, $page, $limit) {
		$arguments['userId'] = $userId;
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';

		$limit = intval($limit);
		$limit = preg_replace($patterns, $replacements, $limit);
		$limit = $limit * 1;

		$offset = ($page - 1) * $limit;
		$sql = "select count(*) as count from (select c.class_name, r.class from classes c left join tables s ";
	$sql .= "on c.class_id = s.class_id left join users_results r on s.class_id = r.class ";
	$sql .= "where r.user_id like :userId group by class_name, class) t";
	$result[0] = $this->db->runSql($sql, $arguments)->fetch();

		$sql = "select * from (select c.class_name, r.class from classes c left join tables s ";
		$sql .= "on c.class_id = s.class_id left join users_results r on s.class_id = r.class ";
		$sql .= "where r.user_id like :userId) t group by class_name, class order by class_name";
		$sql .= " offset $offset rows fetch next $limit rows only";
		$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();

	return $result;
	}
	public function selectUndertakenSubjects($userId, $classId) {
		$arguments['userId'] = $userId;
		$arguments['cId'] = $classId;
		$sql = "select * from (select x.subject_information, max(y.subject) as id, x.table_id from tables x right join "; 
		$sql .= "users_results y on y.class = x.class_id where y.user_id like :userId and y.class like ";
		$sql .= ":cId and x.subject_information not like 'empty' group by x.subject_information, y.class, x.table_id) t order by subject_information asc;";
		return $this->db->runSql($sql, $arguments)->fetchAll();
	}
	
	public function selectMaxMinScoreFromSubject($userId, $classId, $subjectId) {
		$arguments['userId'] = $userId;
		$arguments['cId'] = $classId;
		$arguments['subjectId'] = $subjectId;
		$sql = "select min(score) as min, max(score) as max from users_results where class like :cId and ";
		$sql .= "subject like :subjectId and user_id like :userId";
		return $this->db->runSql($sql, $arguments)->fetch();
	}
	public function selectLastScoreFromSubject($userId, $classId, $subjectId) {
		$arguments['userId'] = $userId;
		$arguments['cId'] = $classId;
		$arguments['subjectId'] = $subjectId;
		$sql = "select top 1 * from users_results where class like :cId and subject like :subjectId ";
		$sql .= "and user_id like :userId desc";
		return $this->db->runSql($sql, $arguments)->fetch();
	}

	public function findClassesAverageScoreAdminOnly($userId, $classId, array $subjectsArray) {
		$arguments['cId'] = $classId;
		$counter = 0;
		$finalCountOfScores = 0;
		foreach($subjectsArray as $id) {

		$arguments['userId'] = $userId;
		$arguments['id'] = $id['id'];


		$sql ="select avg(score) as class_average from users_results where class like :cId and user_id like :userId and subject like :id";
		$result[$counter] = $this->db->runSql($sql, $arguments)->fetch();
		$finalCountOfScores = $finalCountOfScores + intval($result[$counter]['class_average']);
		$counter++;
		}
		return ($finalCountOfScores / $counter);
	}

	public function findClassesMaxScoreAdminOnly($userId, $classId, array $subjectsArray) {
		$arguments['cId'] = $classId;
		$counter = 0;
		$finalCountOfScores = 0;
		foreach($subjectsArray as $id) {

		$arguments['userId'] = $userId;
		$arguments['id'] = $id['id'];


		$sql ="select Max(score) as class_average from users_results where class like :cId and user_id like :userId and subject like :id";
		$result[$counter] = $this->db->runSql($sql, $arguments)->fetch();
		$finalCountOfScores = $finalCountOfScores + intval($result[$counter]['class_average']);
		$counter++;
		}
		return ($finalCountOfScores / $counter);
	}

	public function findClassesLastScoreAdminOnly($userId, $classId, array $subjectsArray) {
		$arguments['cId'] = $classId;
		$counter = 0;
		$finalCountOfScores = 0;
		foreach($subjectsArray as $id) {

		$arguments['userId'] = $userId;
		$arguments['id'] = $id['id'];


		$sql ="select top 1 score as class_average from users_results where class like :cId and user_id like :userId and subject like :id order by id desc";
		$result[$counter] = $this->db->runSql($sql, $arguments)->fetch();
		$finalCountOfScores = $finalCountOfScores + intval($result[$counter]['class_average']);
		$counter++;
		}
		return ($finalCountOfScores / $counter);
	}
  public function insertApendix($filename, $alt, $id, $floatNum) {
    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];
    $arguments['file'] = $filename;
    $arguments['alt'] = $alt;
    $arguments['user_id'] = $id;
    $arguments['floatNum'] = $floatNum;

    $sql = 'insert into subject_files (video, audio, image, alt_text, file_name, class_id,';
    $sql .= ' subject, user_id, float_num, numeral) values (0, 0, 1, :alt, :file, :cId, :subject, :user_id, :floatNum, 3)';
    return $this->db->runSql($sql, $arguments);

  }
  public function deleteVideo() {
    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];

    $sql = "select file_name from subject_files where class_id like :cId and ";
    $sql .= " subject like :subject and video like 1";
    $value = $this->db->runSql($sql, $arguments)->fetch();
    if ($value != false) {
    $tRFA = unlink('../uploads/'.$value['file_name']);
  } else {
    $tRFA = false;
  }

    $sql = "delete from subject_files where class_id like :cId and subject like :subject and video like 1";
    $result = $this->db->runSql($sql, $arguments)->rowCount();

    $resultArray[0] = $tRFA;
    $resultArray[1] = $result;
    return $resultArray;

}
  public function insertVideo($filename, $alt, $id) {

    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];
    $arguments['file'] = $filename;
    $arguments['alt'] = $alt;
    $arguments['user_id'] = $id;

    $sql = 'insert into subject_files (video, audio, image, alt_text, file_name, class_id,';
    $sql .= ' subject, user_id, float_num, numeral) values (1, 0, 0, :alt, :file, :cId, :subject, :user_id, 0.01, 1)';
    return $this->db->runSql($sql, $arguments);

  }
  public function deleteAudio() {
    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];

    $sql = "select file_name from subject_files where class_id like :cId and ";
    $sql .= " subject like :subject and audio like 1";
    $value = $this->db->runSql($sql, $arguments)->fetch();

    $value = $this->db->runSql($sql, $arguments)->fetch();
    if ($value != false) {
    $tRFA = unlink('../uploads/'.$value['file_name']);
  } else {
    $tRFA = false;
  }

    $sql = "delete from subject_files where class_id like :cId and subject like :subject and audio like 1";
    $result = $this->db->runSql($sql, $arguments)->rowCount();

    $resultArray[0] = $tRFA;
    $resultArray[1] = $result;
    return $resultArray;

}
public function insertAudio($filename, $alt, $id) {

  $arguments['cId'] = $_SESSION['site']['cId'];
  $arguments['subject'] = $_SESSION['subject'];
  $arguments['file'] = $filename;
  $arguments['alt'] = $alt;
  $arguments['user_id'] = $id;

  $sql = 'insert into subject_files (video, audio, image, alt_text, file_name, class_id,';
  $sql .= ' subject, user_id, float_num, numeral) values (0, 1, 0, :alt, :file, :cId, :subject, :user_id, 0.02, 2)';
  return $this->db->runSql($sql, $arguments);

}
  public function selectFileArray() {
    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];

    $sql = "select * from subject_files where subject like :subject and class_id like :cId order by numeral, float_num";
    return $this->db->runSql($sql, $arguments)->fetchAll();
  }

  public function selectVideo() {
    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];

    $sql = "select * from subject_files where subject like :subject and class_id like :cId and video like 1";
    return $this->db->runSql($sql, $arguments)->fetch();
  }
  public function selectAudio() {
    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];

    $sql = "select * from subject_files where subject like :subject and class_id like :cId and audio like 1";
    return $this->db->runSql($sql, $arguments)->fetch();
  }
  public function selectImages() {
    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];

    $sql = "select * from subject_files where subject like :subject and class_id like :cId and image like 1 order by float_num";
    return $this->db->runSql($sql, $arguments)->fetchAll();
  }
  public function deleteApendix($id) {
    $arguments['id'] = $id;
    $arguments['cId'] = $_SESSION['site']['cId'];
    $arguments['subject'] = $_SESSION['subject'];

    $sql = 'delete from subject_files where id like :id and subject like :subject and class_id like :cId';
    return $this->db->runSql($sql, $arguments)->rowCount();
  }
  public function lastQuestionId() {
	$sql = 'select question_id as id from question_ids order by question_id desc offset 0 rows fetch first 1 rows only';
	return $this->db->runSql($sql)->fetch();
  }


}