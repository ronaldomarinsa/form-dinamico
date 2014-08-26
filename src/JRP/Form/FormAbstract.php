<?php

namespace JRP\Form;

use JRP\Form\Input\Input;

abstract class FormAbstract {
    private $parametros = ['name', 'method', 'action'];
    private $campos = [];

    protected $formularioBase;
    private $formulario;

    public function __construct($name = null, $method = null, $action = null) {
        $this->setName($name)
            ->setMethod($method)
            ->setAction($action);
    }

    protected final function setParametro($parametroIdentificacao, $valor) {
        if(!empty($parametroIdentificacao)) {
            $this->parametros[$parametroIdentificacao] = $valor;
            return $this;
        }

        exit("Erro: A identificação do parâmetro é obrigatória!");
    }

    protected final function getParametro($parametroIdentificacao) {
        if(isset($this->parametros[$parametroIdentificacao])) {
            return $this->parametros[$parametroIdentificacao];
        }

        exit("Erro: O parâmetro '{$parametroIdentificacao}' não foi setado");
    }

    public final function setName($name)
    {
        $this->setParametro('name', $name);
        return $this;
    }

    public final function getName()
    {
        return $this->getParametro('name');
    }

    public final function setMethod($method)
    {
        $this->setParametro('method', $method);
        return $this;
    }

    public final function getMethod()
    {
        return $this->getParametro('method');
    }

    public final function setAction($action)
    {
        $this->setParametro('action', $action);
        return $this;
    }

    public final function getAction()
    {
        return $this->getParametro('action');
    }

    public final function addInput(Input $campo) {
        array_push($this->campos, $campo);
    }

    public final function getCampos() {
        return $this->campos;
    }

    public final function setClass($class) {
        $this->setParametro('class', $class);
        return $this;
    }

    public final function getClass() {
        return $this->getParametro('class');
    }

    protected function gerarFormularioBase() {
        foreach($this->getCampos() as $campo) {
            $campoHTML = $campo->render();
            $this->formularioBase .= "\r\n{$campoHTML}\r\n";
        }
    }

    protected final function getFormularioBase() {
        return $this->formularioBase;
    }

    protected final function setFormulario($formulario) {
        $this->formulario = $formulario;
    }

    protected final function getFormulario() {
        return $this->formulario;
    }

    public function render() {
        $this->gerarFormularioBase();
        $formularioBase = $this->getFormularioBase();
        $formularioFinal = "<form name=\"{$this->getName()}\" method=\"{$this->getMethod()}\" action=\"{$this->getAction()}\" class=\"{$this->getClass()}\">{$formularioBase}</form>";
        $this->setFormulario($formularioFinal);

        return $this->getFormulario();
    }
} 