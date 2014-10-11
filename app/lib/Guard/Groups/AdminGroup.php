<?php namespace Guard\Groups;

class AdminGroup extends DefaultGroup{
  protected $name = 'Administrators';

  protected $permissions = array(
    'admin'
  );
}
