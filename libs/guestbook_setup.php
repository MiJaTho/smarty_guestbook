<?php

/**
 * Project: Guestbook
 * Author: Monte Ohrt 
 * @Author: Thomas Gizycki
 * File: guestbook_setup.php
 * Version: 1.2
 */


require('guestbook.php');
require('Smarty.class.php');

// smarty configuration
class Guestbook_Smarty extends Smarty {
    function __construct() {
      parent::__construct();
      $this->setTemplateDir( 'templates');
      $this->setCompileDir( 'templates_c');
      $this->setConfigDir( 'configs');
      $this->setCacheDir( 'cache');
    }
}
      
?>