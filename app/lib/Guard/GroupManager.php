<?php namespace Guard;
use Config;
use ReflectionClass;

class GroupManager{
  /* Current group */
  private $group;
  private $user;
  private $groups;
  private $groupNamespace = "\\Guard\\Groups\\";

  public function __construct( $user = null)
  {
    if( !is_null($user) ){
      $this->user = $user;
      $this->group = $this->getGroup();
    }
  }

  public function getGroup()
  {

    // Get groups config file (app/config/groups.php)
    $groups = Config::get('groups');


    if( isset( $this->user->group )
      && array_key_exists($this->user->group, $groups)
      && array_key_exists('class', $groups[$this->user->group]))
    {
      return $this->getGroupObject( $groups[ $this->user->group ] );
    }
    else{
      // Load default group if group id is missing
      return $this->getDefaultGroup();
    }


  }

  public function getGroupObject($object){
    //prepend correct namespace before class

    if( !array_key_exists('class', $object) ){
      return $this->getDefaultGroup();
    }

    $class = $this->groupNamespace.$object['class'];

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

    return new $class($object);
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

  public function getAllGroups()
  {
    $list = [];
    $groups = Config::get('groups');

    foreach( $groups as $id => $object ){
      if( array_key_exists('class', $object)){
        $object = $this->getGroupObject($object);
        $list[$id] = $object->getName();
      }
    }

    return $list;
  }

}
