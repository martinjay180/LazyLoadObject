<?php

namespace LazyLoadObject;

class LazyLoadObject {

  protected static $inst = null;

  public static function Instance(){
    if (static::$inst === null) {
      static::$inst = new static();
      static::$inst->Setup();
    }
    return static::$inst;
  }

  public function Setup(){
    echo "Running Setup from BaseClass";
  }

  private function __construct() {
  }

}

?>
