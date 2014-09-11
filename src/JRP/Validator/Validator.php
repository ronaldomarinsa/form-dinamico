<?php

namespace JRP\Validator;

use JRP\HTML\HTML;
use JRP\Request\Request;
use JRP\Errors\Errors;


class Validator {
    use HTML;

    public $request, $requestErrors;

    private $data = [];

    public $msg = ['success'];

    public function __construct($di)
    {
        $this->request = $di->get('request');
        $this->requestErrors = $di->get('errors');

        $this->msg['success'] = 'Formulário enviado com sucesso!';
    }

    public function setCampo($key)
    {
        $this->data = [
            'key' => $key,
            'value' => $this->request->getRequest($key)
        ];

        return $this;
    }

    public function setMsgSuccess($msg)
    {
        $this->msg['success'] = $msg;
    }

    public function getKey()
    {
        return $this->data['key'];
    }

    public function getCampo()
    {
        return $this->data['value'];
    }

    public function obrigatorio()
    {
        $valor = $this->getCampo();

        if(empty($valor))
        {
            $this->addError(1, "O campo '{$this->getKey()} deve ser obrigatório");
        }

        return $this;
    }

    public function email()
    {
        $validate = filter_var($this->getCampo(), FILTER_VALIDATE_EMAIL);

        if(!$validate)
        {
            $this->addError(2, 'O e-mail especificado é inválido');
        }
    }

    public function minChar($min)
    {
        if(strlen($this->getCampo()) < $min)
        {
            $this->addError(3, "O campo '{$this->getKey()}' deve ter no mínimo {$min} caracteres!");
        }

        return $this;
    }

    private function addError($cod, $msg)
    {
        $this->requestErrors->add($cod, $msg);
    }

    public function countErrors()
    {
        return $this->requestErrors->count();
    }

    public function showErrors()
    {
        $html = "";
        if($this->countErrors())
        {
            foreach($this->requestErrors->get() as $erro)
            {
                $html .= $this->alertError($erro);
            }
        }

        return $html;
    }

    public function showSuccess()
    {
        if(!$this->countErrors())
        {
            return $this->alertSuccess($this->msg['success']);
        }

    }

    private function checkRequest()
    {
        return count($this->request->requestType);
    }

    public function showMsgsAfterRequest($divClass = null)
    {
        if($this->checkRequest())
        {
            $html = $this->showSuccess() . $this->showErrors();
            echo $this->div($divClass, $html);
        }
    }
} 