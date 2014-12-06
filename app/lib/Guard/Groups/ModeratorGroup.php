<?php namespace Guard\Groups;

class ModeratorGroup extends UserGroup{
  protected $name = 'Moderators';

  protected $permissions = array(
    'admin'
  );
}
