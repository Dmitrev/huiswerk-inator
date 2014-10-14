<?php namespace Guard;
use Config;
use ReflectionClass;

class GroupManager{
  /* Current group */
  private $group;
  private $user;
  private $groupNamespace = "\\Guard\\Groups\\";

  public function __construct( $user )
  {
    $this->user = $user;
    $this->group = $this->getGroup();
  }

  public function getGroup()
  {


    // Get groups config file (app/config/groups.php)
    $groups = Config::get('groups');


    if( isset( $this->user->group )
      && array_key_exists($this->user->group, $groups) )
    {
      return $this->getGroupObject( $groups[ $this->user->group ] );
    }
    else{
      // Load default group if group id is missing
      return $this->getDefaultGroup();
    }


  }

  public function getGroupObject($class){
    //prepend correct namespace before class
    $class = $this->groupNamespace.$class;

    if( !class_exists( $class ) )
    {
      // Load defaultGroup if group class is not found
      return $this->getDefaultGroup();
    }


    // Check if the class is instance able
    $ref = new ReflectionClass($class);

    if( !$ref->IsInstantiable() )
    {
      // Load defaultGroup if group class is not instantiable
      return $this->getDefaultGroup();
    }

    return new $class;
  }

  public function getDefaultGroup(){
    return new Groups\DefaultGroup;
  }

  public function getName()
  {
    return $this->group->getName();
  }

  public function getPermissions()
  {
    return $this->group->getPermissions();
  }

  public function has( $permission )
  {
    return in_array( $permission, $this->group->getPermissions() );
  }

}
