<?php

class Model extends Eloquent {
    
    protected $errors = array();
    protected static $rules = array();
    protected static $messages = array();
    protected $validator;
    public function __construct(array $attributes = array(), Validator $validator = null )
    {
        parent::__construct($attributes);
        $this->validator = $validator ?: App::make('validator');
        
        
    }
    
    protected static function boot()
    {
        parent::boot();
        static::saving(function($model){
            return $model->validate();
        });
    }
    
    public function validate()
    {
        $v = $this->validator->make($this->attributes, static::$rules, static::$messages);
        
        if( $v->passes() )
        {
            return true;
        }
        
        $this->setErrors( $v->messages() );
        return false;
    }
    
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
    
    public function hasErrors()
    {
        return ! empty( $this->errors );
    }
}