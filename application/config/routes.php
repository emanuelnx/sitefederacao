<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['assets/(:any)'] = 'assets/$1';

// usuario - login - logoff - registrar
$route['login']['get'] 		= "usuarios/login"; // tela de login
$route['login']['post'] 	= "usuarios/login"; // efetuar o login
$route['registrar']['get'] 	= "usuarios/register"; // tela de registro
$route['registrar']['post'] = "usuarios/register"; // efetuar o registro
$route['logout']['get'] 	= "usuarios/logout"; // efetuar o logoff

// historias
$route['historias/(:num)']['get'] = "historias/exibirSite";
$route['admin/historias/(:num)']['get'] = "historias/exibir";
$route['admin/historias/cadastrar']['get'] = "historias/cadastrar";
$route['admin/historias']['post'] = "historias/criar";
$route['admin/historias/editar/(:num)']['get'] = "historias/editar";
$route['admin/historias/(:num)']['put'] = "historias/atualizar";
$route['admin/historias/(:num)']['delete'] = "historias/excluir";
