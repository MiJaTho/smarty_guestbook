<?php
/**
 * Project: Guestbook
 * @Author: Thomas Gizycki
 * File: index.php
 * Version: 1.2
 * @since 04.11.2018
 */
 


include('./libs/guestbook_setup.php');


$guestbook = new Guestbook;
#echo '<pre>';
#var_dump($guestbook);exit;
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';

switch($action) {
    case 'add':
        // adding a guestbook entry
        $guestbook->displayForm();
        break;
    case 'submit':
        // submitting a guestbook entry
        $guestbook->mungeFormData($_POST);
        if($guestbook->isValidForm($_POST)) {
            $guestbook->addEntry($_POST);
            $guestbook->displayBook($guestbook->getEntries());
        } else {
            $guestbook->displayForm($_POST);
        }
        break;
    case 'edit':
        $editId = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        if (0 != $editId) {
            $guestbook->editEntry($editId);
        }

    break;    
    case 'view':
    default:
        // viewing the guestbook
        $guestbook->displayBook($guestbook->getEntries());        
        break;   
}