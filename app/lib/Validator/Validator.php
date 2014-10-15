<?php namespace Validator;
use App;

class Validator{

  protected $rules = [];
  protected $messages = [];
  protected $Validator;
  protected $input = [];
  protected $entry = null;
  protected $validation;

  public function __construct( $input )
  {
    $this->Validator = App::make('validator');
    $this->input = $input;
    $this->createValidator($input);
  }

  protected function createValidator($input)
  {
    $this->validation = $this->Validator->make($input, $this->rules, $this->messages);
  }

  public function passes()
  {
    return $this->validation->passes();
  }

  public function fails()
  {
    return $this->validation->fails();
  }

  public function errors()
  {
    return $this->validation->messages();
  }

  protected function has($key)
  {
      return array_key_exists($key, $this->input)
              && !empty($this->input[$key]);
  }

  public function get($key)
  {
    if( !$this->has($key) )
      return NULL;

    return $this->input[$key];
  }

  public function entry()
  {
    return $this->entry;
  }
}
