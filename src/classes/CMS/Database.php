<?php
namespace MySite\CMS;                                   // Declare namespace
use \PDO;
class Database extends PDO
{
    public function __construct(string $dsn, string $uid, string $pass)
    {
        // $default_options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC; // Return data as array
        // $default_options[PDO::ATTR_EMULATE_PREPARES]   = false;            // Emulate prepares off
        // $default_options[PDO::ATTR_ERRMODE]            = PDO::ERRMODE_EXCEPTION; // Error settings
        // $options = array_replace($default_options, $options);      // Error settings
              // Replace defaults if supplied
        parent::__construct($dsn, $uid, $pass); // Create PDO object
    }

    public function runSQL(string $sql, $arguments = null)
    {   
        // $this->setAttribute(PDO::ATTR_EMULATE_PREPARES,true);
        if (!$arguments) {                               // If no arguments
            return $this->query($sql);                   // Run SQL, return PDOStatement object
        }
        $statement = $this->prepare($sql);               // If still running prepare statement
        $statement->execute($arguments);                 // Execute SQL statement with arguments
        return $statement;                               // Return PDOStatement object
    }
    public function getSearchEvidenceRowCount($str)
    {
           $searchTerms = $str;
        $searchTermsArray = explode(' ', $searchTerms);
    $conditions = [];

    foreach ($searchTermsArray as $term) {
        $conditions[] = "full_name LIKE '%$term%' OR descriptions LIKE '%$term%'";
    }

    $query = "SELECT count(*) as count FROM evidence";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }
    $row = $this->runSql($query)->fetch();
    return $row['count'];
}

    public function getSearchedEvidenceViaStrOL($str,int $resultsPerPage, $currentPage)
    
    {
        $totalResults = $this->getSearchEvidenceRowCount($str);
               // Calculate the total number of pages
        $totalPages = ceil($totalResults / $resultsPerPage);
        $offset = ($currentPage - 1) * $resultsPerPage;
        $searchTerms = $str;
        $searchTermsArray = explode(' ', $searchTerms);
    $conditions = [];

    foreach ($searchTermsArray as $term) {
        $conditions[] = "full_name LIKE '%$term%' OR descriptions LIKE '%$term%'";
    }

    $query = "SELECT * FROM article";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }
    
        // getSearchArticlesRowCount
        $query .= " LIMIT $resultsPerPage OFFSET $offset";
        
       return $this->runSql($query)->fetchAll();
        
       
    }
}