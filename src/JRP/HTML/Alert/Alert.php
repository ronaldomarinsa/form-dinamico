<?php

namespace JRP\HTML\Alert;


class Alert {

    private function gerarAlerta($tipo, $msg) {
        if(!empty($tipo) && !empty($msg)) {
            return "<div class=\"alert alert-{$tipo}\" role=\"alert\">{$msg}</div>";
        }

        exit("Erro: O tipo / mensagem do alerta não foi específicado");
    }

    public static function success($msg) {
        return self::gerarAlerta('success', $msg);
    }

    public static function error($msg) {
        return self::gerarAlerta('danger', $msg);
    }

} 