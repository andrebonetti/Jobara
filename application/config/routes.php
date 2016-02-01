<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "home";
$route['404_override'] = '';


$route['imoveis'] = 'imoveis/index/0/0/1'; //index
$route['imoveis/(:any)/(:any)/pagina/(:num)'] = 'imoveis/index/$1/$2/$3'; //paginação 
$route['imovel-para-(:any)/(:any)/id/(:num)'] = 'imoveis/imovel_descricao/$3'; //descrição
$route['imovel-para-(:any)/id/(:num)'] = 'imoveis/imovel_descricao/$2'; //descrição
$route['imovel-para-(:any)/(:any)/codigo/(:num)'] = 'imoveis/imovel_descricao/$3'; //descrição

