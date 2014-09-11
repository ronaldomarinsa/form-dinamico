<?php

namespace JRP\Form\Input\Types;


use JRP\Form\Input\InputAbstract;
use JRP\Form\Input\InputInterface;

class Mail extends InputAbstract implements InputInterface{

    public function __construct($nome, $valor = null) {
        parent::__construct($nome, $valor);
        parent::setTipo('email');
    }

    public function createField()
    {
        $this->gerarCampoBase();
        $campoBase = $this->getCampoBase();
        $this->setCampo("<input {$campoBase}>");

        return $this->getCampo();
    }
}