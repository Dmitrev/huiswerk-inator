<?php
class PasswordValidator{
  
  public function passwordCheck($field, $value, $parameters)
  {
    return Hash::check( $value, Auth::user()->password );
  }
}
