<?php namespace Guard\Groups;

class UserGroup extends DefaultGroup{
  protected $name = 'Users';

  protected $permissions = array(
    'add_homework',
  );
}
