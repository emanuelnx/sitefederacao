<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    if (!function_exists('dataHoraBrasileira')) {
        /**
        * Ajusta uma data e hora no formato americano para brasileiro.
        *
        * @param $dataHora string Ex: 2015-12-10 12:00:00
        * @return string Ex: 10/12/2015 12:00:00
        */
        function dataHoraBrasileira($dataHora, $exibeHora = True) {
            $dado = explode(" ", $dataHora);
            $data = $dado[0];
            $hora = $dado[1];

            if($exibeHora) {
                $saida = dataBrasileira($data).' '.$hora;
            } else {
                $saida = dataBrasileira($data);
            }

            return $saida;
        }
    }

    if (!function_exists('dataBrasileira')) {
        /**
        * Ajusta uma data no formato americano para brasileiro.
        *
        * @param $data string Ex: 2015-12-10
        * @return string Ex: 10/12/2015
        */
        function dataBrasileira($data) {
            return implode('/', array_reverse(explode('-', $data)));
        }
    }

    if (!function_exists('compararDatas')) {
        /**
        * verifica se a dataInicio � maior,menor ou igual a dataComparacao.
        * @param date, date
        * @return 
        */
        function compararDatas($dtInicio, $dtComparacao, $formato = "Y-m-d"){

            $dtComparacao = date($formato, strtotime($dtComparacao));

            if ( strtotime($dtInicio) > strtotime($dtComparacao) ) {
                return 1; // "maior"
            } elseif ( strtotime($dtInicio) < strtotime($dtComparacao) ) { 
                return -1; // "menor"
            }else {
                return 0; // "igual"
            }
        }
    }
?>