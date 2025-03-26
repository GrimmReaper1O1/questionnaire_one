<?php 
namespace MySite\CMS;                                   // Declare namespace

class Library
{
protected $db;
	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	public function searchViaLetterPagination($limit) {
		$arguments['letter'] = $_SESSION['letter'];
		
		$arguments['cId'] = $_SESSION['site']['cId'];
	
	
		
		
		
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = strval($limit);
		$offset = ($_SESSION['page'] - 1) * $limit;	
		$limit = preg_replace($patterns, $replacements, $limit);		
		$sql = "SELECT count(*) AS count from library where ";
		$sql .= " left(title, 1) like :letter and class_id like :cId";
		$result[0] = $this->db->runSql($sql, $arguments)->fetch();
		
		$sql = "SELECT * from library where";
		$sql .= " left(title, 1) like :letter and class_id like :cId";
		$sql .= " order by title offset " . $offset . " rows fetch next ";
		$sql .= $limit . " rows only";
		$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		
		return $result;
	}
	public function searchAlphabeticallyPagination($limit) {
		
		$arguments['cId'] = $_SESSION['site']['cId'];
		
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = strval($limit);
		$offset = ($_SESSION['page'] - 1) * $limit;	
		$limit = preg_replace($patterns, $replacements, $limit);		
		$sql = "SELECT count(*) AS count from library where ";
		$sql .= " class_id like :cId";
		$result[0] = $this->db->runSql($sql, $arguments)->fetch();
		
		$sql = "SELECT * from library where";
		$sql .= " class_id like :cId";
		$sql .= " order by title, authors offset " . $offset . " rows fetch next ";
		$sql .= $limit . " rows only";
		$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		
		return $result;
	}
	public function searchViaLetterPaginationNC($limit) {
		$arguments['letter'] = $_SESSION['letter'];
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = strval($limit);
		$offset = ($_SESSION['page'] - 1) * $limit;	
		$limit = preg_replace($patterns, $replacements, $limit);		
		$sql = "SELECT count(*) AS count from library where ";
		$sql .= " left(title, 1) like :letter";
		$result[0] = $this->db->runSql($sql, $arguments)->fetch();
		
		$sql = "SELECT * from library where";
		$sql .= " left(title, 1) like :letter ";
		$sql .= " order by title offset " . $offset . " rows fetch next ";
		$sql .= $limit . " rows only";
		$result[1] = $this->db->runSql($sql, $arguments)->fetchAll();
		
		return $result;
	}
	public function searchAlphabeticallyPaginationNC($limit) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$limit = strval($limit);
		$offset = ($_SESSION['page'] - 1) * $limit;	
		$limit = preg_replace($patterns, $replacements, $limit);		
		$sql = "SELECT count(*) AS count from library ";
		$result[0] = $this->db->runSql($sql)->fetch();
		
		$sql = "SELECT * from library ";
		$sql .= " order by title, authors offset " . $offset . " rows fetch next ";
		$sql .= $limit . " rows only";
		$result[1] = $this->db->runSql($sql)->fetchAll();
		
		return $result;
	}
	
	public function selectTitleFromLibrary($limit) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$replacements[0] = '';
		$replacements[1] = '';
		$patterns[2] = '/ for /';
		$patterns[3] = '/ and /';
		$patterns[4] = '/ nor /';
		$patterns[5] = '/ but /';
		$patterns[6] = '/ or /';
		$patterns[7] = '/ yet /';
		$patterns[8] = '/ so /';
		$patterns[9] = '/ a /';
		$patterns[10] = '/ the /';
		$patterns[11] = '/ an /';
		$replacements[0] = '';
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$replacements[4] = ' ';
		$replacements[5] = ' ';
		$replacements[6] = ' ';
		$replacements[7] = ' ';
		$replacements[8] = ' ';
		$replacements[9] = ' ';
		$replacements[10] = ' ';
		$replacements[11] = ' ';
		$offset = ($_SESSION['page'] - 1) * $limit;	
		
		$title = preg_replace($patterns, $replacements, $_SESSION['title']);
		$keywords = preg_split('/[\s]+/', $title);
		$totalKeywords = count($keywords);
		
		for ($i = 0; $i < $totalKeywords; $i++) {
			$arguments['search1' . $i] = "%" . $keywords[$i] . "%";
						
		}
		
	
		$arguments['cId'] = $_SESSION['site']['cId'];
	
		$patterns2[0] = '/;/';
		$patterns2[1] = '/go/';
		$replacements2[0] = '';
		$replacements2[1] = '';
		$limit = preg_replace($patterns2, $replacements2, $limit);
		$sql1 = "SELECT count(*) AS count from library where class_id like :cId and";
		$sql1 .= " title LIKE :search10 ";

		if ($totalKeywords > 1) {

			for ($i = 1 ; $i < $totalKeywords; $i++) {
				$sql1 .= " AND title like :search1" . $i;
			}

		}

		$result[0] = $this->db->runsql($sql1, $arguments)->fetch();

	  if (!empty($result[0])) {
		
			$sql2 = "SELECT * from library where class_id like :cId and";
			$sql2 .= " title LIKE :search10 ";
		
		if ($totalKeywords > 1) {
			for ($i = 1 ; $i < $totalKeywords; $i++) {

			$sql2 .= " AND title like :search1" . $i;

		}
	}
		$sql2 .= " ORDER BY title, authors ASC OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

		$result[1] = $this->db->runSql($sql2, $arguments)->fetchAll();
} 		$result[2] = $keywords;
		
		return $result;

		}
public function selectDescriptionFromLibrary($limit) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';
		$patterns[2] = '/ for /';
		$patterns[3] = '/ and /';
		$patterns[4] = '/ nor /';
		$patterns[5] = '/ but /';
		$patterns[6] = '/ or /';
		$patterns[7] = '/ yet /';
		$patterns[8] = '/ so /';
		$patterns[9] = '/ a /';
		$patterns[10] = '/ the /';
		$patterns[11] = '/ an /';
		$replacements[0] = ' ';
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$replacements[4] = ' ';
		$replacements[5] = ' ';
		$replacements[6] = ' ';
		$replacements[7] = ' ';
		$replacements[8] = ' ';
		$replacements[9] = ' ';
		$replacements[10] = ' ';
		$replacements[11] = ' ';
		$offset = ($_SESSION['page'] - 1) * $limit;	
		
		$title = preg_replace($patterns, $replacements, $_SESSION['title']);
		$keywords = preg_split('/[\s]+/', $title);
		$totalKeywords = count($keywords);
		
		for ($i = 0; $i < $totalKeywords; $i++) {
			for ($c = 1; $c < 7; $c++)
			$arguments['search'. $c . $i] = "%" . $keywords[$i] . "%";
						
		}
		
		
		$arguments['cId'] = $_SESSION['site']['cId'];
	
		$patterns2[0] = '/;/';
		$patterns2[1] = '/go/';
		$replacements2[0] = '';
		$replacements2[1] = '';
		$limit = preg_replace($patterns2, $replacements2, $limit);
		$sql1 = "SELECT count(*) AS count from library_keywords k right outer join library l on l.id = k.library_id ";
		$sql1 .= " where l.class_id like :cId and";
		$sql1 .= " k.keyword1 LIKE :search10 or k.keyword2 LIKE :search20 or k.keyword3 LIKE :search30 or k.keyword4 LIKE :search40 or "; 
		$sql1 .= " k.keyword5 LIKE :search50 or k.keyword6 LIKE :search60 ";

		if ($totalKeywords > 1) {

			for ($i = 1 ; $i < $totalKeywords; $i++) {
				$sql1 .= " or k.keyword1 LIKE :search1" . $i . " or k.keyword2 LIKE :search2" . $i . "  or k.keyword3 LIKE :search3" . $i; 
		$sql1 .= "  or k.keyword4 LIKE :search4" . $i . "  or  k.keyword5 LIKE :search5" . $i . " or k.keyword6 LIKE :search6" . $i;
 
			}

		}

		$result[0] = $this->db->runsql($sql1, $arguments)->fetch();

	  if (!empty($result[0])) {
		
		$sql2 = "SELECT l.id, l.file_location, l.authors, l.title, l.description, l.class_id from library_keywords k right outer join ";
		$sql2 .= " library l on l.id = k.library_id  where l.class_id like :cId and ";
		$sql2 .= " k.keyword1 LIKE :search10 or k.keyword2 LIKE :search20 or k.keyword3 LIKE :search30 or k.keyword4 LIKE :search40 or "; 
		$sql2 .= " k.keyword5 LIKE :search50 or k.keyword6 LIKE :search60 ";

		if ($totalKeywords > 1) {

			for ($i = 1 ; $i < $totalKeywords; $i++) {
				$sql1 .= " or k.keyword1 LIKE :search1" . $i . " or k.keyword2 LIKE :search2" . $i . "  or k.keyword3 LIKE :search3" . $i; 
		$sql1 .= "  or k.keyword4 LIKE :search4" . $i . "  or  k.keyword5 LIKE :search5" . $i . " or k.keyword6 LIKE :search6" . $i;
 
			}

		}
		$sql2 .= " ORDER BY l.title, l.authors ASC OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

		$result[1] = $this->db->runSql($sql2, $arguments)->fetchAll();
} 		$result[2] = $keywords;
		
		return $result;

		}
	
	public function selectAuthorFromLibrary($limit) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';	
		$patterns[2] = '/ for /';
		$patterns[3] = '/ and /';
		$patterns[4] = '/ nor /';
		$patterns[5] = '/ but /';
		$patterns[6] = '/ or /';
		$patterns[7] = '/ yet /';
		$patterns[8] = '/ so /';
		$patterns[9] = '/ a /';
		$patterns[10] = '/ the /';
		$patterns[11] = '/ an /';
		$replacements[0] = '';
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$replacements[4] = ' ';
		$replacements[5] = ' ';
		$replacements[6] = ' ';
		$replacements[7] = ' ';
		$replacements[8] = ' ';
		$replacements[9] = ' ';
		$replacements[10] = ' ';
		$replacements[11] = ' ';
		$offset = ($_SESSION['page'] - 1) * $limit;	
		
		$title = preg_replace($patterns, $replacements, $_SESSION['title']);
		$keywords = preg_split('/[\s]+/', $title);
		$totalKeywords = count($keywords);
		
		for ($i = 0; $i < $totalKeywords; $i++) {
			$arguments['search1' . $i] = "%" . $keywords[$i] . "%";
						
		}
		
	
		$arguments['cId'] = $_SESSION['site']['cId'];
		
		$patterns2[0] = '/;/';
		$patterns2[1] = '/go/';
		$replacements2[0] = '';
		$replacements2[1] = '';
		$limit = preg_replace($patterns2, $replacements2, $limit);
		$sql1 = "SELECT count(*) AS count from library where class_id like :cId and";
		$sql1 .= " author LIKE :search10 ";

		if ($totalKeywords > 1) {

			for ($i = 1 ; $i < $totalKeywords; $i++) {
				$sql1 .= " AND author like :search1" . $i;
			}

		}

		$result[0] = $this->db->runsql($sql1, $arguments)->fetch();

	  if (!empty($result[0])) {
		
			$sql2 = "SELECT * from library where class_id like :cId and";
			$sql2 .= " author LIKE :search10 ";
		
		if ($totalKeywords > 1) {
			for ($i = 1 ; $i < $totalKeywords; $i++) {

				$sql2 .= " AND author like :search1" . $i;

		}
	}
		$sql2 .= " ORDER BY authors, title ASC OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

		$result[1] = $this->db->runSql($sql2, $arguments)->fetchAll();
} 		$result[2] = $keywords;
		
		return $result;

		}
	
	public function selectTitleFromLibraryNC($limit) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';	
		$patterns[2] = '/ for /';
		$patterns[3] = '/ and /';
		$patterns[4] = '/ nor /';
		$patterns[5] = '/ but /';
		$patterns[6] = '/ or /';
		$patterns[7] = '/ yet /';
		$patterns[8] = '/ so /';
		$patterns[9] = '/ a /';
		$patterns[10] = '/ the /';
		$patterns[11] = '/ an /';
		$replacements[0] = '';
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$replacements[4] = ' ';
		$replacements[5] = ' ';
		$replacements[6] = ' ';
		$replacements[7] = ' ';
		$replacements[8] = ' ';
		$replacements[9] = ' ';
		$replacements[10] = ' ';
		$replacements[11] = ' ';
		$offset = ($_SESSION['page'] - 1) * $limit;	
		
		$title = preg_replace($patterns, $replacements, $_SESSION['title']);
		$keywords = preg_split('/[\s]+/', $title);
		$totalKeywords = count($keywords);
		
		for ($i = 0; $i < $totalKeywords; $i++) {
			$arguments['search1' . $i] = "%" . $keywords[$i] . "%";
						
		}
		
		
		$patterns2[0] = '/;/';
		$patterns2[1] = '/go/';
		$replacements2[0] = '';
		$replacements2[1] = '';
		$limit = preg_replace($patterns2, $replacements2, $limit);
		$sql1 = "SELECT count(*) AS count from library where ";
		$sql1 .= " title LIKE :search10 ";

		if ($totalKeywords > 1) {

			for ($i = 1 ; $i < $totalKeywords; $i++) {
				$sql1 .= " AND title like :search1" . $i;
			}

		}

		$result[0] = $this->db->runsql($sql1, $arguments)->fetch();

	  if (!empty($result[0])) {
		
			$sql2 = "SELECT * from library where ";
			$sql2 .= " title LIKE :search10 ";
		
		if ($totalKeywords > 1) {
			for ($i = 1 ; $i < $totalKeywords; $i++) {

			$sql2 .= " AND title like :search1" . $i;

		}
	}
		$sql2 .= " ORDER BY title, authors ASC OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

		$result[1] = $this->db->runSql($sql2, $arguments)->fetchAll();
} 		$result[2] = $keywords;
		
		return $result;

		}
public function selectDescriptionFromLibraryNC($limit) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';	
		$patterns[2] = '/ for /';
		$patterns[3] = '/ and /';
		$patterns[4] = '/ nor /';
		$patterns[5] = '/ but /';
		$patterns[6] = '/ or /';
		$patterns[7] = '/ yet /';
		$patterns[8] = '/ so /';
		$patterns[9] = '/ a /';
		$patterns[10] = '/ the /';
		$patterns[11] = '/ an /';
		$replacements[0] = '';
		$replacements[1] = '';
		$replacements[2] = '';
		$replacements[3] = '';
		$replacements[4] = '';
		$replacements[5] = '';
		$replacements[6] = '';
		$replacements[7] = '';
		$replacements[8] = '';
		$replacements[9] = '';
		$replacements[10] = '';
		$replacements[11] = '';
		$offset = ($_SESSION['page'] - 1) * $limit;	
		
		$description = preg_replace($patterns, $replacements, $_SESSION['description']);
		$keywords = preg_split('/[\s]+/', $description);
		$totalKeywords = count($keywords);
		
		for ($i = 0; $i < $totalKeywords; $i++) {
		
			$arguments['search1'. $i] = "%" . $keywords[$i] . "%";
			$arguments['search2'. $i] = "%" . $keywords[$i] . "%";
			$arguments['search3'. $i] = "%" . $keywords[$i] . "%";
			$arguments['search4'. $i] = "%" . $keywords[$i] . "%";
			$arguments['search5'. $i] = "%" . $keywords[$i] . "%";
			$arguments['search6'. $i] = "%" . $keywords[$i] . "%";
			
		}
		
		
		$patterns2[0] = '/;/';
		$patterns2[1] = '/go/';
		$replacements2[0] = '';
		$replacements2[1] = '';
		$limit = preg_replace($patterns2, $replacements2, $limit);
		
		$sql1 = "SELECT count(*) AS count from library_keywords k right outer join library l on l.id = k.library_id ";
		$sql1 .= " where ";
		$sql1 .= " k.keyword1 LIKE :search10 or k.keyword2 LIKE :search20 or k.keyword3 LIKE :search30 or k.keyword4 LIKE :search40 or "; 
		$sql1 .= " k.keyword5 LIKE :search50 or k.keyword6 LIKE :search60 ";

		if ($totalKeywords > 1) {

			for ($i = 1 ; $i < $totalKeywords; $i++) {
				$sql1 .= " or k.keyword1 LIKE :search1" . $i . " or k.keyword2 LIKE :search2" . $i . "  or k.keyword3 LIKE :search3" . $i; 
				$sql1 .= "  or k.keyword4 LIKE :search4" . $i . "  or  k.keyword5 LIKE :search5" . $i . " or k.keyword6 LIKE :search6" . $i;
 
			}

		}

		$result[0] = $this->db->runsql($sql1, $arguments)->fetch();

	  if (!empty($result[0])) {
		
		$sql2 = "SELECT l.id, l.file_location, l.authors, l.title, l.description, l.class_id from library_keywords k right outer join ";
		$sql2 .= " library l on l.id = k.library_id  where ";
		$sql2 .= " k.keyword1 LIKE :search10 or k.keyword2 LIKE :search20 or k.keyword3 LIKE :search30 or k.keyword4 LIKE :search40 or "; 
		$sql2 .= " k.keyword5 LIKE :search50 or k.keyword6 LIKE :search60 ";

		if ($totalKeywords > 1) {

			for ($i = 1 ; $i < $totalKeywords; $i++) {
				$sql2 .= " or k.keyword1 LIKE :search1" . $i . " or k.keyword2 LIKE :search2" . $i . "  or k.keyword3 LIKE :search3" . $i; 
				$sql2 .= "  or k.keyword4 LIKE :search4" . $i . "  or  k.keyword5 LIKE :search5" . $i . " or k.keyword6 LIKE :search6" . $i;
 
			}

		}
		$sql2 .= " ORDER BY l.title, l.authors ASC OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";



		$result[1] = $this->db->runSql($sql2, $arguments)->fetchAll();
} 		$result[2] = $keywords;
		
		return $result;

		}
	
	public function selectAuthorFromLibraryNC($limit) {
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';	
		$patterns[2] = '/ for /';
		$patterns[3] = '/ and /';
		$patterns[4] = '/ nor /';
		$patterns[5] = '/ but /';
		$patterns[6] = '/ or /';
		$patterns[7] = '/ yet /';
		$patterns[8] = '/ so /';
		$patterns[9] = '/ a /';
		$patterns[10] = '/ the /';
		$patterns[11] = '/ an /';
		$replacements[0] = '';
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$replacements[4] = ' ';
		$replacements[5] = ' ';
		$replacements[6] = ' ';
		$replacements[7] = ' ';
		$replacements[8] = ' ';
		$replacements[9] = ' ';
		$replacements[10] = ' ';
		$replacements[11] = ' ';
		$offset = ($_SESSION['page'] - 1) * $limit;	
		
		$authors = preg_replace($patterns, $replacements, $_SESSION['authors']);
		$keywords = preg_split('/[\s]+/', $authors);
		$totalKeywords = count($keywords);
		
		for ($i = 0; $i < $totalKeywords; $i++) {
			$arguments['search1' . $i] = "%" . $keywords[$i] . "%";
						
		}
		
	
		$patterns2[0] = '/;/';
		$patterns2[1] = '/go/';
		$replacements2[0] = '';
		$replacements2[1] = '';
		$limit = preg_replace($patterns2, $replacements2, $limit);
		$sql1 = "SELECT count(*) AS count from library where ";
		$sql1 .= " authors LIKE :search10 ";

		if ($totalKeywords > 1) {

			for ($i = 1 ; $i < $totalKeywords; $i++) {
				$sql1 .= " AND authors like :search1" . $i;
			}

		}

		$result[0] = $this->db->runsql($sql1, $arguments)->fetch();

	  if (!empty($result[0])) {
		
			$sql2 = "SELECT * from library where ";
			$sql2 .= " authors LIKE :search10 ";
		
		if ($totalKeywords > 1) {
			for ($i = 1 ; $i < $totalKeywords; $i++) {

				$sql2 .= " AND authors like :search1" . $i;

		}
	}
		$sql2 .= " ORDER BY authors, title ASC OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

		$result[1] = $this->db->runSql($sql2, $arguments)->fetchAll();
} 		$result[2] = $keywords;
		
		return $result;

		}
	
	public function selectClassFromLibraryPagination($limit) {
		
		$patterns[0] = '/;/';
		$patterns[1] = '/go/';	
		$patterns[2] = '/ for /';
		$patterns[3] = '/ and /';
		$patterns[4] = '/ nor /';
		$patterns[5] = '/ but /';
		$patterns[6] = '/ or /';
		$patterns[7] = '/ yet /';
		$patterns[8] = '/ so /';
		$patterns[9] = '/ a /';
		$patterns[10] = '/ the /';
		$patterns[11] = '/ an /';
		$replacements[0] = '';
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$replacements[4] = ' ';
		$replacements[5] = ' ';
		$replacements[6] = ' ';
		$replacements[7] = ' ';
		$replacements[8] = ' ';
		$replacements[9] = ' ';
		$replacements[10] = ' ';
		$replacements[11] = ' ';
		$patterns2[0] = '/;/';
		$patterns2[1] = '/go/';
		$replacements2[0] = '';
		$replacements2[1] = '';
		
		$offset = ($_SESSION['page'] - 1) * $limit;	
		
		$class = preg_replace($patterns, $replacements, $_SESSION['class2']);
		$keywords = preg_split('/[\s]+/', $class);
		$totalKeywords = count($keywords);
		
	for ($i = 0; $i < $totalKeywords; $i++) {
			$arguments['search1' . $i] = "%" . $keywords[$i] . "%";
						
		}
		
		
		$limit = preg_replace($patterns2, $replacements2, $limit);
		$sql1 = "SELECT count(*) AS count from classes where ";
		$sql1 .= " class_name LIKE :search10 ";
	if ($totalKeywords > 1) {
			for ($i = 1 ; $i < $totalKeywords; $i++) {

				$sql1 .= " AND class_name like :search1" . $i;

		}
	}
		
		$result[0] = $this->db->runsql($sql1, $arguments)->fetch();

	  if (!empty($result[0])) {
		
			$sql2 = "SELECT * from classes where ";
			$sql2 .= " class_name LIKE :search10 ";
			if ($totalKeywords > 1) {
			for ($i = 1 ; $i < $totalKeywords; $i++) {

				$sql2 .= " AND class_name like :search1" . $i;

		}
	}
		$sql2 .= " ORDER BY class_name ASC OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

		$result[1] = $this->db->runSql($sql2, $arguments)->fetchAll();
} 		$result[2] = $keywords;
		
		return $result;

	}
	
	public function insertIntoLibrary($author, $title, $destination, $description, $userId, $classId) {
       
		$arguments['author'] = $author ;
        $arguments['title'] = $title ;
        $arguments['description'] = $description ;
        $arguments['destination'] = $destination ;
        $arguments['userId'] = $userId ;
		$arguments['cId'] = $classId;
        $sql = "INSERT INTO library (class_id, file_location, authors, description, user_id, title) values";
        $sql .= " (:cId, :destination, :author, :description, :userId, :title)";
        return $this->db->runsql($sql, $arguments);
    }

		public function selectFromLibraryViaId($id) {
		$arguments['id'] = $id;
		$sql = "select * from library where id like :id";
	
		return $this->db->runsql($sql, $arguments)->fetch();	
	
	}
		public function deleteFromLibraryViaId($id) {
		$arguments['id'] = $id;
		$sql = "delete from library where id like :id";
		
		return $this->db->runsql($sql, $arguments)->rowCount();
	}
	public function selectDocumentByAuthorName($author, $name, $id) {

		$arguments['author'] = $author ;
		$arguments['name'] = $name ;
		$arguments['id'] = $id ;
		$sql = "select id from library where authors like :author and title like :name and user_id like :id";
		return $this->db->runSql($sql, $arguments)->fetch();


	}



	public function insertKeywords($id, $key1, $key2, $key3, $key4, $key5, $key6) {

		$arguments['id'] = $id ;
		$arguments['key1'] = $key1 ;
		$arguments['key2'] = $key2 ;
		$arguments['key3'] = $key3 ;
		$arguments['key4'] = $key4 ;
		$arguments['key5'] = $key5 ;
		$arguments['key6'] = $key6 ;
		$sql = "insert into library_keywords (library_id, keyword1, keyword2, keyword3, keyword4, keyword5, keyword6) values ";
		$sql .= " (:id, :key1, :key2, :key3, :key4, :key5, :key6)";
		return $this->db->runSql($sql, $arguments);
	}









	// to delete after database is complete
	public function deleteKeywordsViaLibraryId($id) {
		$arguments['id'] = $id;
		$sql = "delete from library_keywords where library_id like :id";
		return $this->db->runSql($sql, $arguments)->rowCount();
	}

}