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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome/landing';
$route['ci'] = 'welcome/ci';
$route['register'] = 'welcome/register_1st_page';
$route['login'] = 'welcome/login_fc';
$route['logout'] = 'welcome/logout_fc';
$route['home'] = 'welcome/home_fc';
$route['add-address/(:num)'] = 'welcome/add_address_fc/$1';
$route['enter-pincode'] = 'welcome/enter_pincode_fc';

// address
$route['search-by-place'] = 'address_controller/search_by_place_fc';
$route['state-entered'] = 'address_controller/state_entered';
$route['(:any)'] = 'address_controller/state_in_url_fc'; 

$route['(:any)/district-entered'] = 'address_controller/district_entered';
$route['(:any)/(:any)'] = 'address_controller/district_in_url_fc';

$route['(:any)/(:any)/po_entered'] = 'address_controller/po_entered';
$route['(:any)/(:any)/(:any)'] = 'address_controller/po_in_url_fc';

// address

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
