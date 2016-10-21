<?php

/*
 * @file index.php
 * @version 0.4
 * - Arquivo responsável por iniciar o aplicatico
 */

header('Content-type: text/html; charset=UTF-8');

// Arquivo de configuração do Aplicativo
require_once '../App/Config/app.php';
// Inclui o autoload do Composer
require_once DRINST . 'vendor/autoload.php';

try {
    // Inicia a Aplicação
    new HTR\Init();
    
} catch(\Exception $e) {
    
    echo 
    'Código: <strong>'.$e->getCode().'</strong> - Erro em <strong>'.$e->getFile().'</strong>:<strong>'.$e->getLine().'</strong><br>
    Erro informado: <strong>'.$e->getMessage().'</strong><br>
    <pre>';
    echo $e->getTraceAsString();
    echo '</pre>';

}
