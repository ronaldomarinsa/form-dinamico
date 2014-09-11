<?php

namespace JRP\HTML;


use JRP\Form\FormAbstract;
use JRP\Form\FormInterface;

trait HTML {
    private function generateAlert($tipo, $msg) {
        if(!empty($tipo) && !empty($msg)) {
            return "<div class=\"alert alert-{$tipo}\" role=\"alert\">{$msg}</div>";
        }

        exit("Erro: O tipo / mensagem do alerta não foi específicado");
    }

    public function header($type = 'h1', $class = null, $titulo)
    {
        if(!preg_match("/h[1-6]{1}/i", $type))
        {
            exit("<b>Erro:</b> O parâmetro 'type' deve ser algum tipo de cabeçalho html válido, ex: h1, h2, ..., h6");
        }

        if(empty($titulo)) {
            exit("<b>Erro:</b> O título não pode ser vazio");
        }

        $html = "<h1" . (!empty($class) ? " class=\"{$class}\"" : "") . ">{$titulo}</h1>";

        return $html;
    }

    public function formTag(FormAbstract $form)
    {
        $name = $form->getName();
        $method = $form->getMethod();
        $action = $form->getAction();
        $class = $form->getClass();

        $html = "<form " .
            (!empty($form) ? "name=\"{$name}\"" : "") .
            (!empty($method) ? " method=\"{$method}\"" : "") .
            (!empty($action) ? " action=\"{$action}\"" : "") .
            (!empty($class) ? " class=\"{$class}\"" : "") .
        ">";

        return $html;
    }

    public function alertSuccess($msg)
    {
        return $this->generateAlert('success', $msg);
    }

    public function alertError($msg)
    {
        return $this->generateAlert('danger', $msg);
    }

    public function div($class, $content)
    {
        return "<div class=\"{$class}\">{$content}</div>";
    }
}