<?php
/**
 * @file DatabaseConfig.php
 * @version 0.2
 * - Class que configura as diretrizes para conexão com o Banco de Dados
 */

namespace App\Config;

class DatabaseConfig
{
    public $db = [
        'sgbd' => 'mysql',
        'server' => 'bG9jYWxob3N0',
        'dbname' => 'cHVicGxhbg==',
        'username' => 'c2VwbGFu',
        'password' => 'c2VwbGFu',
        'options' => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
    ];
}
