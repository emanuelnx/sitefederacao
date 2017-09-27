<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
controller[get] => controller/index
controller/(:num)[get] => controller/exibir
controller/cadastrar[get] => controller/cadastar
controller/criar[post] => controller/criar
controller/editar[post] => controller/editar
controller/atualizar[post] => controller/atualizar
controller/excluir[post] => controller/excluir
*/

// usuario - login - logoff - registrar
$route['login']['get'] 		= "usuarios/login"; // tela de login
$route['login']['post'] 	= "usuarios/login"; // efetuar o login
$route['registrar']['get'] 	= "usuarios/register"; // tela de registro
$route['registrar']['post'] = "usuarios/register"; // efetuar o registro
$route['logout']['get'] 	= "usuarios/logout"; // efetuar o logoff

// Home Administrativa
$route['admin']['get'] = "admin/index";

// historias
$route['historias/(:num)']['get'] = "historias/exibirSite";

$route['admin/historias']['get'] = "historias/index";
$route['admin/historias/exibir/(:num)']['get'] = "historias/exibir";
$route['admin/historias/cadastrar']['get'] = "historias/cadastrar";
$route['admin/historias/criar']['post'] = "historias/criar";
$route['admin/historias/editar']['post'] = "historias/editar";
$route['admin/historias/atualizar']['post'] = "historias/atualizar";
$route['admin/historias/excluir']['post'] = "historias/excluir";

$route['admin/patrocinadores']['get'] = "patrocinadores/index";
$route['admin/patrocinadores/exibir/(:num)']['get'] = "patrocinadores/exibir";
$route['admin/patrocinadores/cadastrar']['get'] = "patrocinadores/cadastrar";
$route['admin/patrocinadores/criar']['post'] = "patrocinadores/criar";
$route['admin/patrocinadores/editar']['post'] = "patrocinadores/editar";
$route['admin/patrocinadores/atualizar']['post'] = "patrocinadores/atualizar";
$route['admin/patrocinadores/excluir']['post'] = "patrocinadores/excluir";

$route['admin/links']['get'] = "links/index";
$route['admin/links/exibir/(:num)']['get'] = "links/exibir";
$route['admin/links/cadastrar']['get'] = "links/cadastrar";
$route['admin/links/criar']['post'] = "links/criar";
$route['admin/links/editar']['post'] = "links/editar";
$route['admin/links/atualizar']['post'] = "links/atualizar";
$route['admin/links/excluir']['post'] = "links/excluir";

// NOTICIAS
$route['noticias/(:num)']['get'] = "noticias/exibirSite";

$route['admin/noticias']['get'] = "noticias/index";
$route['admin/noticias/exibir/(:num)']['get'] = "noticias/exibir";
$route['admin/noticias/cadastrar']['get'] = "noticias/cadastrar";
$route['admin/noticias/criar']['post'] = "noticias/criar";
$route['admin/noticias/editar']['post'] = "noticias/editar";
$route['admin/noticias/atualizar']['post'] = "noticias/atualizar";
$route['admin/noticias/excluir']['post'] = "noticias/excluir";