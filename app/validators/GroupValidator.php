<?php
use Guard\GroupManager;

class GroupValidator{
  public function valid($field, $value, $parameters)
  {
    $manager = new GroupManager();
    return array_key_exists( $value, $manager->getAllGroups() );
  }
}
