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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'My_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['log']="My_controller/login_page";
$route['create_blog']="My_controller/sign_up";
$route['create']="My_controller/user_add";
$route['login']="My_controller/check_login";
$route['dashboard']="My_controller/dash_board";
$route['u_dashboard']="My_controller/user_dashboard";
$route['u_logout']="My_controller/user_logout";
$route['a_logout']="My_controller/admin_logout";
$route['recipe_a']="My_controller/add_recipe";
$route['add_rec']="My_controller/save_recipe";
$route['my_posts']="My_controller/posts";
$route['ap_posts']="My_controller/all_posts";
$route['comment']="My_controller/comments";
$route['gallery']="My_controller/recipe_gal";
$route['user_com']="My_controller/user_complent";
$route['comp']="My_controller/post_complent";
$route['complents']="My_controller/get_comps";
$route['tips']="My_controller/tricks";
$route['tiptrick']="My_controller/trickpanel";
$route['addtips']="My_controller/addtricks";
$route['save_tips']="My_controller/savetricks";
$route['usertrick']="My_controller/addusertricks";
$route['save_tricks']="My_controller/saveusertricks";
$route['contact']="My_controller/contacts";
$route['contactform']="My_controller/savecontacts";
$route['review']="My_controller/savereview";
$route['contact_list']="My_controller/list_contact";
$route['chicken_posts']="My_controller/chicken";
$route['fastfood_posts']="My_controller/fastfood";
$route['newsletter']="My_controller/nl";
$route['letter']="My_controller/my_letters";
$route['crud']="My_controller/ajax";
$route['insert']="My_controller/insert";
$route['fetch']="My_controller/fetch";
$route['delete']="My_controller/delete";
$route['edit']="My_controller/edit";
$route['update']="My_controller/update";


