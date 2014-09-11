<?php

namespace JRP\Errors;


class Errors {
    private $errors = [];

    public function add($cod, $msg)
    {
        $error = "<b>Erro cod. #{$cod}</b>: {$msg}";
        array_push($this->errors, $error);
    }

    public function count()
    {
        return count($this->get());
    }

    public function get()
    {
        return $this->errors;
    }
} 