<?php

/**
 * Project: Guestbook
 * Author: Monte Ohrt <monte [AT] ohrt [DOT] com>
 * @Author: Thomas Gizycki
 * File: guestbook.php
 * Version: 1.2
 */

/**
 * guestbook application library
 *
 */
class Guestbook {

  // database object
  var $pdo = null;
  // smarty template object
  var $tpl = null;
  // error messages
  var $error = null;

  /* set database settings here! */
  // PDO database type
  var $dbtype = 'mysql';
  // PDO database name
  var $dbname = 'roccatg_guestbook';
  // PDO database host
  var $dbhost = 'localhost';
  // PDO database username
  var $dbuser = 'root';
  // PDO database password
  var $dbpass = '';


  /**
  * class constructor
  */
  function __construct() {

    // instantiate the pdo object
    try {
      $dsn = "{$this->dbtype}:host={$this->dbhost};dbname={$this->dbname}";
      $this->pdo =  new PDO($dsn,$this->dbuser,$this->dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage();
      die();
    }	

    // instantiate the template object
    $this->tpl = new Guestbook_Smarty;

  }

  /**
  * display the guestbook entry form
  *
  * @param array $formvars the form variables
  */
  function displayForm($formvars = array()) {

    // assign the form vars
    $this->tpl->assign('post',$formvars);
    // assign error message
    $this->tpl->assign('error', $this->error);
    $this->tpl->display('guestbook_form.tpl');

  }

  /**
  * fix up form data if necessary
  *
  * @param array $formvars the form variables
  */
  function mungeFormData(&$formvars) {

    // trim off excess whitespace
    $formvars['surname'] = trim($formvars['surname']);
    $formvars['email'] = trim($formvars['email']);
    $formvars['password'] = trim($formvars['password']);
    $formvars['title'] = trim($formvars['title']);
    $formvars['text'] = trim($formvars['text']);

  }

  /**
  * test if form information is valid
  *
  * @param array $formvars the form variables
  */
  function isValidForm($formvars) {

    // reset error message
    $this->error = null;

    // test if "surname" is empty
    if(strlen($formvars['surname']) == 0) {
      $this->error = 'surname_empty';
      return false; 
    }
    // test if "email" is empty
    if(strlen($formvars['email']) == 0) {
      $this->error = 'email_empty';
      return false; 
    }
    // test if "password" is empty
    if(strlen($formvars['password']) == 0) {
      $this->error = 'password_empty';
      return false; 
    }

    // test if "title" is empty
    if(strlen($formvars['title']) == 0) {
      $this->error = 'title_empty';
      return false; 
    }
    // test if "text" is empty
    if(strlen($formvars['text']) == 0) {
      $this->error = 'text_empty';
      return false; 
    }

    // form passed validation
    return true;
  }

  /**
  * add a new guestbook entry
  *
  * @param array $formvars the form variables
  */
   function addEntry($formvars) {
   
    try {
      if(!$formvars['id']) {
        $rh = $this->pdo->prepare("INSERT INTO guestbook values(0,?,?,?,?,?)");
            $rh->execute(array($formvars['surname'],$formvars['email'],$formvars['password'],$formvars['title'],$formvars['text']));
      } 
      else {
            $rh = $this->pdo->prepare("UPDATE guestbook SET title=?, text=?  WHERE id = ?");
            $rh->execute(array($formvars['title'],$formvars['text'],$formvars['id']));
      }
      
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage();
      return false;
    }
    return true;
  }
  /**
   * edit existing entry
   * 
   * @param intger $id database entry
   */
  function editEntry($id) {
    try {
        $rh = $this->pdo->prepare("SELECT * FROM guestbook WHERE id = ?");
        $rh->execute(array($id));
        $row = $rh->fetch(); 
        $this->displayForm($row);
        } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        return false;
        }
        return true;
  }

  /**
  * get the guestbook entries
  */
  function getEntries() {
      $rows = array();
    try {
      foreach($this->pdo->query(
        "SELECT * from guestbook ORDER BY id DESC") as $row)
      $rows[] = $row;
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage();
      return false;
    } 	
    return $rows;   
  }

  /**
  * display the guestbook
  *
  * @param array $data the guestbook data
  */
  function displayBook($data = array()) {

    $this->tpl->assign('data', $data);
    $this->tpl->display('guestbook.tpl');        

  }
}

?>