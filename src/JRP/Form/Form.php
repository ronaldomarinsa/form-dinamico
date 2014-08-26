<?php

namespace JRP\Form;

use JRP\Form\Campo\Campo;

class Form implements FormInterface {
    private $name;
    private $method;
    private $action;
    private $campos = [];
    private $formularioBase;
    private $formulario;

    public function __construct($name = null, $method = null, $action = null) {
        $this->setName($name)
             ->setMethod($method)
             ->setAction($action);
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }


    public function addCampo(Campo $campo) {
        array_push($this->campos, $campo);
    }

    private function gerarFormularioBase() {
        foreach($this->campos as $campo) {
            $campoHTML = $campo->render();
            $this->formularioBase .= "{$campoHTML}<br />";
        }
    }

    private function getFormularioBase() {
        return $this->formularioBase;
    }

    private function setFormulario($formulario) {
        $this->formulario = $formulario;
    }

    private function getFormulario() {
        return $this->formulario;
    }

    public function render() {
        $this->gerarFormularioBase();
        $formularioBase = $this->getFormularioBase();
        $formularioFinal = "<form name=\"{$this->getName()}\" method=\"{$this->getMethod()}\" action=\"{$this->getAction()}\">{$formularioBase}</form>";
        $this->setFormulario($formularioFinal);

        return $this->getFormulario();
    }
} 