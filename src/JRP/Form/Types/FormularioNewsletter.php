<?php

namespace JRP\Form\Types;

use JRP\Form\FormAbstract;
use JRP\Form\FormInterface;

class FormularioNewsletter extends FormAbstract {

    public $titulo;

    public function __construct($name = null, $method = null, $action = null) {
        $this->setName($name)
            ->setMethod($method)
            ->setAction($action);

        $this->setClass('form-signin');
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
}
