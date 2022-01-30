<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*Admin*/
$route['Super-Admin']                                                               ='Dashboard';
$route['Super-Admin/view_plan']                                                     ='Dashboard/view_plan';
$route['Super-Admin/manage_store']                                                  ='Dashboard/manage_store';
$route['Super-Admin/settings']                                                      ='Dashboard/settings';
$route['Super-Admin/site_details']                                                  ='Dashboard/site_details';
$route['Super-Admin/set_payment_api']                                               ='Dashboard/set_payment_api';
$route['Super-Admin/store_owner/(:any)']                                            ='Dashboard/more_about_store_owner/$1';
$route['Super-Admin/edit_plan/(:any)']                                              ='Dashboard/edit_plan/$1';
$route['Super-Admin/store_detail/(:any)']                                           ='Dashboard/view_store_detail/$1';


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
