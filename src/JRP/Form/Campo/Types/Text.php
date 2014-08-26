<?php

namespace JRP\Form\Campo\Types;


use JRP\Form\Campo\Campo;
use JRP\Form\Campo\CampoAbstract;

class Text extends CampoAbstract implements Campo{

    public function __construct($nome, $valor = null) {
        parent::__construct($nome, $valor);
        parent::setTipo('text');
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

        echo $this->getCampo();
    }
}