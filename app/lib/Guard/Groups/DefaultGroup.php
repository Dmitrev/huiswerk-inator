<?php namespace Guard\Groups;
use \Guard\Interfaces\GroupInterface;

class DefaultGroup implements GroupInterface{

  /**
  * Name of the group
  * @var string
  */
  protected $name = 'Default Group';
  /**
  * Permissions key/value pair. The key is the name of the permission.
  * @var array
  */
  protected $permissions = array();


  /**
   * Returns a list with the permissions
   * @return array
   */
  public function getPermissions(){
    return $this->permissions;
  }

  /**
   * Returns the name of the group
   * @return string
   */
  public function getName(){
    return $this->name;
  }


}
