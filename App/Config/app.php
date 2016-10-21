<?php

/*
 * @file Config.conf.php
 * @version 1.0
 * - Arquivo que contém as configurações do Aplicativo
 * 
 * ////////////////////////////////////////////////////
 * AS CONSTANTES DEFINIDAS AQUI NÃO DEVEM SER RENOMEADAS
 */

// Separador de Diretório
define('DS', DIRECTORY_SEPARATOR);
// Rota padrão para a plicação
// Altere o valor somente se a aplicação não estiver rodando em um
// subdomínio específico.
// Default Value : /
define('APPDIR', '/pubplan/public_html/');
// Nome da Aplicação
define('APPNAM', 'Biblioteca');
// Versão da Aplicação
define('APPVER', '3.0');
// Salt String usado na criptografia
// Atenção: É de suma importância alterar este valor.
// para alterar de forma segura use o comando configkey do ATR Assit
// para mais detalhes digite o comando
// $ php assist configkey
define('STRSAL', 'e27852d84bf34e4f8b03c61eb34dadefe397cc85');
// Nome do Domínio onde o Aplicativo foi instalado
// Atenção: é de suma importância que seja configurado um subdomínio específico
// para a correta instalação da aplicação.
define('DOMAIN', 'localhost');
// Contato do Administrador do Sistema
define('ADCONT', 'E-Mail: bruno.monteirodg@gmail.com;<br>Fone: +55 91 99913-7954');
// Define o nome da entidade (tabela do Banco de Dados) usada para login
define('ENTLOG', 'auth');
// Rota padrão para o formulário de login
define('CTRLOG', 'auth/login');
// Rota padrão para o formulário de troca de senha no primeiro acesso
define('CTRMOP', 'auth/mudarsenha');
// Coluna padrão que indica a necessidade de troca de senha
// O valor deve ser igual ao nome do campo na tabela do Banco de Dados
define('COLMOP', 'change_password');
// Repositório dos arquivos do sistema
// Este recurso é usado quando não há suporte a virtual hosts, onde o diretório
// dos arquivos da aplicação não poderão ficar acessíveis ao público
// Default Value: ../
define('DRINST', '../');

/////////////////////////////////////////////////
/////////////////////////////////////////////////
/// ATENÇÃO : NÃO ALTERE AS CONSTANTES
/// SE NÃO SOUBER EXATAMENTE O QUE ESTA FAZENDO
/////////////////////////////////////////////////
/////////////////////////////////////////////////

// Diretório padrão onde serão salvos os arquivos de Banco de Dados
define('DATADR' , DRINST . 'App/Database/DbRepository/');
// Diretório padrão onde serão salvos os arquivos de outras bibliotecas
define('ATTACH' , APPDIR . 'vendor/');
// Diretório padrão onde serão salvos as páginas de erro
define('ERRPAG' , 'vendor/ErrorPag/');
// Diretório padrão onde serão salvos os arquivos Javascript
define('DIRJS_' , APPDIR . 'js/');
// Diretório padrão onde serão salvos os arquivos CSS
define('DIRCSS' , APPDIR . 'css/');
// Diretório padrão onde serão salvos os arquivos de imagem
define('DIRIMG' , APPDIR . 'images/');
// Diretório padrão de cache de Views do sistema
define('DIRCACHE', DRINST . 'App/Cache/');
// Diretório padrão de repositório das Views
define('DIRVIEW', DRINST . 'App/Views/');
