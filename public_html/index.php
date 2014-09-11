<?php

require "../src/autoload.php";

use JRP\Request\Request;
use JRP\Errors\Errors;
use JRP\Validator\Validator;
use JRP\Form\FormGeneratorHTML;
use JRP\Form\Input\Types\Text;
use JRP\Form\Types\FormularioNewsletter;
use JRP\Form\Input\Types\Mail;
use JRP\Form\Input\Types\Submit;


$di = require '../src/aura/scripts/instance.php';

$di->set('request', new Request($_POST));
$di->set('errors', new Errors());

$validator = new Validator($di);

$formulario = new FormularioNewsletter('formulario', 'post', '');
$formulario->setTitulo('Newsletter');

$campoNome = new Text('nome');
$campoNome->setPlaceholder('Nome completo')->setClass('form-control')->required();
$formulario->addInput($campoNome);

$campoMail = new Mail('mail');
$campoMail->setPlaceholder('E-mail')->setClass('form-control')->required();
$formulario->addInput($campoMail);

$botaoEnviar = new Submit('enviar');
$botaoEnviar->setValor('Cadastrar meu e-mail!')->setClass('btn btn-lg btn-primary btn-block');
$formulario->addInput($botaoEnviar);

$form = new FormGeneratorHTML($formulario);

require "home.php";