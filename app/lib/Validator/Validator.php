<?php namespace Validator;
use App, Config;

class Validator{

  protected $rules = [];
  protected $messages = [];
  protected $Validator;
  protected $input = [];
  protected $entry = null;
  protected $validation;
  protected $config = false;

  public function __construct( $input, $entry = null )
  {
    $this->Validator = App::make('validator');
    $this->input = $input;
    $this->entry = $entry;
    // Get rules from config file
    $this->setRulesFromConfig();

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

  public function get($key, $default_value = NULL)
  {
    if( !$this->has($key) )
      return $default_value;

    return $this->input[$key];
  }

  public function entry()
  {
    return $this->entry;
  }

  protected function setRulesFromConfig()
  {
    if( !is_string( $this->config ) )
      return false;

    $this->rules = Config::get('validation.'.$this->config);
  }

}
