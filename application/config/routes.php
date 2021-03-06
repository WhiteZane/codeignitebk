<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['/deletePage/(:any)'] = 'pageBuilder/deleteContent/$1';
$route['deletePage/(:any)'] = 'pageBuilder/deletePage/$1';
$route['deleteContent/(:any)/(:num)'] = 'pageBuilder/deleteContent/$1/$2';
//$route['/editContent/(:any)'] = 'pageBuilder/editContent/$1';
$route['editContent/(:any)'] = 'pageBuilder/editContent/$1';
$route['editPage/(:any)'] = 'pageBuilder/editPage/$1';
$route['editView/(:any)'] = 'pageBuilder/editView/$1';
$route['createRow/(:any)'] = 'pageBuilder/createRow/$1';
//ajax delete
$route['deleteRow'] = 'pageBuilder/deleteRow';
//ajax row order up
$route['rowUp'] = 'pageBuilder/rowUp';
//ajax row order down
$route['rowDown'] = 'pageBuilder/rowDown';

$route['createRow'] = 'pageBuilder/createRow';
$route['create'] = 'pageBuilder/create';
$route['showAllRows/(:any)'] = 'pageBuilder/showAllRows/$1';
$route['showAllRows'] = 'pageBuilder/showAllRows';
$route['adminController'] = 'pageBuilder/adminController';
$route['(:any)'] = 'pageBuilder/view/$1';
$route['pagebuilder'] = 'pageBuilder';
/*$route['compare/login'] = 'compare/login';
$route['compare/edit/(:any)'] = 'compare/edit/$1';
$route['compare/editAdmin'] = 'compare/editAdmin';
$route['compare/create'] = 'compare/create';
$route['compare/(:any)'] = 'compare/view/$1';
$route['compare'] = 'compare';*/
//$route['test/create'] = 'test/create';
//$route['test/(:any)'] = 'test/view/$1';
//$route['test'] = 'test';
/*$route['(:any)'] ='compare/view/$1';*/
$route['default_controller'] = 'pageBuilder/';
//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;
