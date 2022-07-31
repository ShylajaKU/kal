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

// send email verification link
$route['send-email-verification-code/(:any)/(:any)'] = 'verification_controller/send_email_verication_link_fc/$1/$2';
// send email verification link


$route['login'] = 'welcome/login_fc';
$route['logout'] = 'welcome/logout_fc';
$route['home'] = 'welcome/home_fc';
// $route['add-address/(:num)'] = 'welcome/add_address_fc/$1';
// $route['enter-pincode'] = 'welcome/enter_pincode_fc';

// address
$route['search-by-place'] = 'address_controller/search_by_place_fc';
$route['state-entered'] = 'address_controller/state_entered';
$route['(:any)/state-entered'] = 'address_controller/state_in_url_fc'; 

$route['(:any)/district-entered'] = 'address_controller/district_entered';
$route['(:any)/(:any)/district-entered'] = 'address_controller/district_in_url_fc';

$route['(:any)/(:any)/po_entered'] = 'address_controller/po_entered';
$route['(:any)/(:any)/(:any)/po_entered'] = 'address_controller/po_in_url_fc';

// address

// relegion etc details

$route['community-details'] = 'welcome/community_details_fc';
$route['caste-selected'] = 'welcome/caste_selected';
$route['community-details/(:any)/(:any)/(:any)'] = 'welcome/community_details_language_relegion_caste_fc/$1/$2/$3';

$route['sub-caste-selected'] = 'welcome/sub_caste_selected';
$route['community-details/(:any)/(:any)/(:any)/(:any)'] = 'welcome/community_details_language_relegion_caste_subcaste_fc/$1/$2/$3/$4';

// relegion etc details

// education details

$route['education-details'] = 'edu_controller/education_and_job_fc';

// education details

//family_details

$route['family-details'] = 'welcome/family_details_fc';

// family_details
// height_calculator_fc

$route['add-height'] = 'welcome/height_calculator_fc';

// height

$route['test'] = 'admin_controller/test_fc';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
