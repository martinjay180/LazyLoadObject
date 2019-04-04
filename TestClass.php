<?php

require_once "vendor/autoload.php";

use LazyLoadObject\LazyLoadObject; //as LazyLoadObject;

class TestClass extends LazyLoadObject {

  public $db;

  public function Setup(){
    echo "this is the subclass test";
  }

};

?>
