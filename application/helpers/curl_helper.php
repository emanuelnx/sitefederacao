<?php

/**
 * Passa a URL e os parâmetros pela função
 * Para retorno do corpo de resposta, use o parâmetro de referência $body
 * Para retorno de possível erro, use o parâmetro de referência $errormsg
 * A função retorna true em caso de sucesso e false em caso de falha
 * A falha ocorre se as funções do CURL retornarem valores que signifiquem falha
 * A falha também ocorre de acordo com as suas necessidades na validação da resposta
 * Por exemplo (Aplique de acordo com as suas necessidades):
 * 
 * Se a saída for vazia
 * Se a saída tiver um padrão e através de expressão regular retornar falso
 * Se a saída estiver em JSON e obrigatoriamente precisa que exista um parâmetro "status"
 * Se a saída estiver sm JSON e o parâmetro "status" seja diferente de "SUCCESS"
 * 
 * A função abaixo é apenas uma demonstração de como saber se algo deu certo ou não
 * Modifique de acordo com as suas necessidades
 *
 * EXEMPLO
    $url = 'http://pt.stackoverflow.com';

    $parametros = array(
        'id'   => 'valor_id',
        'nome' => 'valor_nome',
        'fone' => 'valor_fone',
    );

    if ( !curl_post_42252( $url, $parametros, $resposta, $erro ) ) {
        echo $erro;
        die();
    }

    echo 'Successo<br/><br/>';
    echo '<pre>';
    var_dump( $erro );
    var_dump( $resposta );
    echo '</pre>';
    die();
 */

function curl_post_42252( $url, $params = array(), &$body = null, &$errormsg = null ) {

    $fields = http_build_query( $params, '', '&' );

    set_time_limit(60);

    $ch = curl_init();

    $options = array(
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_ENCODING       => '',
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HEADER         => true,
        CURLOPT_NOPROGRESS     => false,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $fields,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT        => 60,
        CURLOPT_URL            => $url,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0',
        CURLOPT_VERBOSE        => true,
    );

    curl_setopt_array( $ch, $options );

    $exec  = curl_exec( $ch );
    $info  = curl_getinfo( $ch );
    $head  = substr( $exec, 0, $info['header_size'] );
    $body  = substr( $exec, $info['header_size'] );
    $error = curl_error( $ch );
    $errno = curl_errno( $ch );

    curl_close( $ch );

    /**
     * Início das verificações para saber se a requisição foi feita corretamente
     */
    if ($exec === false) {
        $errormsg = 'curl_exec';
        return false;
    }

    if ($error !== '') {
        $errormsg = $error;
        return false;
    }

    if ($errno) {
        $errormsg = $errno;
        return false;
    }

    /**
     * A parte acima verifica se não houve erros nas funções do CURL (HTTPS, Timeout, etc...)
     * Daqui para baixo estão os exemplos de como validar e saber se realmente a resposta de saída é válida
     * Usando expressão regular ou JSON
     * Adapte de acordo com as suas necessidades
     */

    //return true;

    //Código HTTP de resposta é diferente de 200? Geralmente o código HTTP de resposta é 200
    if ($info['http_code'] !== 200) {
        $errormsg = 'curl_http_code '.$info['http_code'];
        return false;
    }

    //Corpo (resposta) (html/json/xml) é vazio? Geralmente há uma saída em JSON ou com algum valor simples informando falha ou sucesso
    if (trim($body) === '') {
        $errormsg = 'curl_body_empty';
        return false;
    }

    //Validação por expressão regular (Exemplo fictício)
    /*$pattern = '/ID\:/';

    if ( !preg_match( $pattern, $body ) ) {
        $errormsg = 'pattern_dont_match';
        return false;
    }*/

    // Validação por valor JSON, supondo que a resposta esteja formatada em JSON e possua a chave "status" com o valor "SUCCESS" ou "ERROR" para Sucesso ou Erro
    /*if (($json = json_decode($body)) === false || $json === null) {
        $errormsg = 'json_decode_error';
        return false;
    }

    if (!isset($json->status)) {
        $errormsg = 'json_status_undefined';
        return false;
    }

    if ($json->status !== 'SUCCESS') {
        $errormsg = 'json_status_fail';
        return false;
    }*/

    return true;

}