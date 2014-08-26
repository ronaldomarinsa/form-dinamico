<?php

namespace JRP\Form\Types;

use JRP\Form\FormAbstract;
use JRP\Form\FormInterface;

class FormularioNewsletter extends FormAbstract implements FormInterface {

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

    protected function gerarFormularioBase() {
        $this->formularioBase .= "\r\n<h2 class=\"form-signin-heading\">{$this->getTitulo()}</h2>\r\n";
        foreach($this->getCampos() as $campo) {
            $campoHTML = $campo->render();
            $this->formularioBase .= "\r\n{$campoHTML}\r\n";
        }
    }

    public function render() {
        $this->gerarFormularioBase();
        $formularioBase = $this->getFormularioBase();
        $formularioFinal = "<form name=\"{$this->getName()}\" method=\"{$this->getMethod()}\" action=\"{$this->getAction()}\" class=\"{$this->getClass()}\">{$formularioBase}</form>";
        $this->setFormulario($formularioFinal);

        return $this->getFormulario();
    }
}
