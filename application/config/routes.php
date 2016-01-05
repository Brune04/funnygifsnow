<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "pages/featured";
$route['404_override'] = '404_page';
$route['meme/(:num)'] = 'pages/meme';
$route['gif/(:num)'] = 'pages/gif';
$route['about'] = 'about/index';
$route['terms'] = 'terms/index';
$route['privacy'] = 'privacy/index';
$route['meme'] = 'pages/meme';
$route['gif'] = 'pages/gif';
$route['popular/(:num)'] = 'pages/popular';
$route['popular'] = 'pages/popular';
$route['featured'] = 'pages/featured';
$route['random'] = 'view/random';
$route['scrape'] = 'scrape/index';
$route['view/(:any)'] = 'view/view_post/$1';
$route['user/signup'] = 'register/index';
$route['u/(:any)/edit/save'] = 'user/save';
$route['u/(:any)/edit'] = 'user/edit';
$route['u/(:any)'] = 'user/index';
$route['post_comment'] = 'post_comment/add_comment';
$route['post_like'] = 'post_like/add_like';
$route['post_dislike'] = 'post_like/add_dislike';
$route['post_favorite'] = 'post_like/add_favorite';
$route['register/register_user'] = 'register/register_user';
$route['login/login_user'] = 'login/login_user';
$route['upload_file/upload_it'] = 'upload_file/upload_it';
$route['upload'] = 'upload/index';
$route['(:any)'] = 'pages/view/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */