<?php

namespace JRP\Form\Input\Types;


use JRP\Form\Input\Input;
use JRP\Form\Input\InputAbstract;

class Submit extends InputAbstract implements Input{

    public function __construct($nome, $valor = null) {
        parent::__construct($nome, $valor);
        parent::setTipo('submit');
    }

    public function setPlaceholder($placeholder) {
        $this->setParametro('placeholder', $placeholder);
        return $this;
    }

    public function getPlaceholder() {
        return $this->getParametro('placeholder');
    }

    public function render()
    {
        $this->gerarCampoBase();
        $campoBase = $this->getCampoBase();
        $this->setCampo("<input {$campoBase}>");

        return $this->getCampo();
    }
}