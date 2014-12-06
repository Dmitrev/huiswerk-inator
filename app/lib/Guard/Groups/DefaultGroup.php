<?php namespace Guard\Groups;
use \Guard\Interfaces\GroupInterface;
use Config;

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

  public function __construct($config = NULL)
  {
    if( !is_null($config))
      $this->setPermissions($config);
  }

  /**
   * Set the permissions for the current group
   */
  protected function setPermissions($config){

    /* Set the permissions given in config file */
    if( array_key_exists('permissions', $config) ){
      $this->permissions = $config['permissions'];
    }

    /* Inherit permissions */
    $this->checkInherit($config);
  }

  protected function checkInherit($object)
  {
    if ( array_key_exists('inherit', $object) ){

      if( is_array( $object['inherit'])){
        foreach( $object['inherit'] as $object){
          $this->addPermissionsFrom($object);
        }
      }
      else{
        $this->addPermissionsFrom($object['inherit']);
      }
    }
  }

  protected function addPermissionsFrom($group)
  {
    $config = Config::get('groups.'.$group);

    if( is_null($config))
    {
      return false;
    }

    if( !array_key_exists('permissions', $config))
    {
      return false;
    }

    $this->permissions = array_merge($this->permissions, $config['permissions']);

    $this->checkInherit($config);

    return true;
  }

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
