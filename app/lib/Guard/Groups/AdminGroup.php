<?php namespace Guard\Groups;

class AdminGroup extends UserGroup{
  protected $name = 'Administrators';

  protected $permissions = array(
    'admin'
  );
}
