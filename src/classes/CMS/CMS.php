<?php
namespace MySite\CMS;
class CMS
{
    protected $db        = null;                   // Stores reference to Database object
    public $database = null;
    public $questions = null;
    public $token = null;
    public $member = null;
	public $library = null;
    
    public function __construct($dsn, $uid, $pass)
    {
        
        $this->db = new Database($dsn, $uid, $pass); // Create Database object
        
    }
  

    public function getToken()
    {
        if($this->token === null) {
            $this->token = new Token($this->db);
        }
        return $this->token;
    }
	public function getLibrary()
    {
        if($this->library === null) {
            $this->library = new Library($this->db);
        }
        return $this->library;
    }
    public function getQuestions()
    {
        if($this->questions === null) {
            $this->questions = new Questions($this->db);
        }
        return $this->questions;
    }
    public function getMember()
    {
        if($this->member === null) {
            $this->member = new Member($this->db);
        }
        return $this->member;
    }

    public function getAuthors() 
    {
    if($this->authors === null) {
        $this->authors = new Authors($this->db);
    }
    return $this->authors;
    }

}
