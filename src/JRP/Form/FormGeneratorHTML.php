<?php

namespace JRP\Form;


use JRP\Form\FormAbstract;
use JRP\Form\FormInterface;
use JRP\HTML\HTML;

class FormGeneratorHTML {
    use HTML;

    public $form;
    private $html = [];

    public function __construct(FormAbstract $form)
    {
        $this->form = $form;
    }

    private function gerarFormTag()
    {
        $this->addHtml($this->formTag($this->form));
    }

    private function gerarTitulo()
    {
        $this->addHtml($this->header('h2', 'form-signin-heading', $this->form->getTitulo()));
    }

    private function addHtml($html)
    {
        array_push($this->html, $html);
    }

    private function addInputs()
    {
        $campos = $this->form->getCampos();
        foreach($campos as $campo)
        {
            array_push($this->html, $campo->createField());
        }
    }

    private function montarFormulario()
    {
        $this->gerarFormTag();
        $this->gerarTitulo();
        $this->addInputs();
        $this->addHtml('</form>');
    }

    private function getHTML()
    {
        return implode("\n", $this->html);
    }

    public function render()
    {
        $this->montarFormulario();

        return $this->getHTML();
    }
} 