<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    public $attributes;
    protected $errors = [];
    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        if (!Validator::email($attributes['email'])) {
            $this->errors["email"] = "Email invalido, por favor introduzca una direccion email valida";
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors["password"] = "Introduzca una contraseña valida.";
        }
    }
    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }

}