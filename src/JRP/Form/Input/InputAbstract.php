<?php

namespace JRP\Form\Input;


abstract class InputAbstract {
    public $parametros = ['type', 'name', 'value', 'class'];
    private $isRequired = false;
    private $campoBase;
    private $campo;

    protected function __construct($nome, $valor = null) {
        $this->setParametro('name', $nome)
             ->setParametro('value', $valor);
    }

    protected function setParametro($parametroIdentificacao, $valor) {
        if(!empty($parametroIdentificacao)) {
            $this->parametros[$parametroIdentificacao] = $valor;
            return $this;
        }

        exit("Erro: A identificação do parâmetro é obrigatória!");
    }

    protected function getParametro($parametroIdentificacao) {
        if(isset($this->parametros[$parametroIdentificacao])) {
            return $this->parametros[$parametroIdentificacao];
        }
    }

    public final function setTipo($tipo) {
        $this->setParametro('type', $tipo);
    }

    public final function getTipo() {
        return $this->getParametro('type');
    }

    public final function setNome($nome) {
        $this->setParametro('name', $nome);
        return $this;
    }

    public final function getNome() {
        return $this->getParametro('name');
    }

    public final function setValor($valor) {
        $this->setParametro('value', $valor);
        return $this;
    }

    public final function getValor() {
        return $this->getParametro('value');
    }

    public function setClass($class) {
        $this->setParametro('class', $class);
        return $this;
    }

    public function getClass() {
        return $this->getParametro('class');
    }

    public final function required() {
        $this->isRequired = true;
    }

    public final function isRequired() {
        return $this->isRequired;
    }

    public final function gerarCampoBase() {
        $quantidadeParametros = count($this->parametros);
        $i = 1;
        foreach($this->parametros as $parametroIdentificacao => $parametroValor) {
            if(!empty($parametroValor)) {
                $this->campoBase .= "{$parametroIdentificacao}=\"{$parametroValor}\"";
                if($quantidadeParametros > $i) {
                    $this->campoBase .= " ";
                } elseif($this->isRequired() == true) {
                    $this->campoBase .= " required";
                }
            }
            $i++;
        }
    }

    public final function getCampoBase() {
        return $this->campoBase;
    }

    public final function setCampo($campo) {
        $this->campo = $campo;
        return $this;
    }

    public final function getCampo() {
        return $this->campo;
    }

    public function setPlaceholder($placeholder) {
        $this->setParametro('placeholder', $placeholder);
        return $this;
    }

    public function getPlaceholder() {
        return $this->getParametro('placeholder');
    }
}
