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


/*Sales*/
$route['Pos']                                                          ='Sales_Dashboard';
$route['Pos/add_sales']                                                ='Sales_Dashboard/add_sales';
$route['Pos/cart']                                                     ='Sales_Dashboard/load_sales_cart';
$route['Pos/history']                                                  ='Sales_Dashboard/transaction_history';
$route['Pos/view_invoice/(:any)']                                      ='Sales_Dashboard/view_invoice/$1';


/*Manager*/

$route['Manager']                                                     ='Manager_Dashboard';
$route['Manager/view_staff']                                          ='Manager_Dashboard/view_sale_rep';
$route['Manager/filter_staff_store/(:any)']                           ='Manager_Dashboard/get_sales_rep_by_store_id/$1';
$route['Manager/filter_staff_branch/(:any)']                          ='Manager_Dashboard/get_sales_rep_by_store_branch_id/$1';
$route['Manager/customer']                                            ='Manager_Dashboard/view_my_customer';
$route['Manager/filter_customer/(:any)/(:any)']                       ='Manager_Dashboard/filter_customer/$1/$2';
$route['Manager/supplier']                                            ='Manager_Dashboard/view_my_supplier';
$route['Manager/supplier']                                            ='Manager_Dashboard/view_my_supplier';
$route['Manager/filter_supplier/(:any)/(:any)']                       ='Manager_Dashboard/filter_supplier/$1/$2';
$route['Manager/category']                                            ='Manager_Dashboard/view_my_category';
$route['Manager/add_stock']                                           ='Manager_Dashboard/add_stock';
$route['Manager/view_product']                                        ='Manager_Dashboard/view_product';
$route['Manager/filter_product/(:any)/(:any)']                        ='Manager_Dashboard/filter_product/$1/$2';
$route['Manager/product_in']                                          ='Manager_Dashboard/view_product_in';
$route['Manager/filter_product_in/(:any)/(:any)']                     ='Manager_Dashboard/filter_product_in/$1/$2';
$route['Manager/product_out']                                         ='Manager_Dashboard/view_product_out';
$route['Manager/filter_product_out/(:any)/(:any)']                    ='Manager_Dashboard/filter_product_out/$1/$2';
$route['Manager/invoice']                                             ='Invoice/index';
$route['Manager/filter_invoice/(:any)/(:any)']                        ='Invoice/filter_invoice/$1/$2';
$route['Manager/view_invoice/(:any)']                                 ='Invoice/view_invoice/$1';
$route['Manager/history']                                             ='Transaction_history/index';
$route['Manager/filter_transaction/(:any)/(:any)']                    ='Transaction_history/filter_transaction/$1/$2';
$route['Manager/add_sale']                                            ='Sales_rep/index';
$route['Manager/cart']                                                ='Sales_rep/load_sales_cart';
$route['Manager/view_product_detail/(:any)']                          ='Office/view_product_detail/$1';



/*Store Owner*/
$route['Store_Owner']                                                 ='Office';
$route['Store_Owner/open_store']                                      ='Office/open_store';
$route['Store_Owner/manage_store/(:any)']                             ='Office/manage_store/$1';
$route['Store_Owner/open_branch_store/(:any)']                        ='Office/open_branch_store/$1';
$route['Store_Owner/supervisor']                                      ='Office/view_supervisor';
$route['Store_Owner/supervisor_store/(:any)']                         ='Office/get_supervisor_by_store_id/$1';
$route['Store_Owner/supervisor_branch/(:any)']                        ='Office/get_supervisor_by_store_branch_id/$1';
$route['Store_Owner/staff']                                           ='Office/view_sale_rep';
$route['Store_Owner/filter_staff_store/(:any)']                       ='Office/get_sales_rep_by_store_id/$1';
$route['Store_Owner/filter_staff_branch/(:any)']                      ='Office/get_sales_rep_by_store_branch_id/$1';
$route['Store_Owner/customer']                                        ='Office/view_my_customer';
$route['Store_Owner/filter_customer/(:any)/(:any)']                   ='Office/filter_customer/$1/$2';
$route['Store_Owner/supplier']                                        ='Office/view_my_supplier';
$route['Store_Owner/filter_supplier/(:any)/(:any)']                   ='Office/filter_supplier/$1/$2';
$route['Store_Owner/category']                                        ='Office/view_my_category';
$route['Store_Owner/add_stock']                                       ='Office/add_stock';
$route['Store_Owner/view_product']                                    ='Office/view_product';
$route['Store_Owner/filter_product/(:any)/(:any)']                    ='Office/filter_product/$1/$2';
$route['Store_Owner/product_in']                                      ='Office/view_product_in';
$route['Store_Owner/filter_product_in/(:any)/(:any)']                 ='Office/filter_product_in/$1/$2';
$route['Store_Owner/product_out']                                     ='Office/view_product_out';
$route['Store_Owner/filter_product_out/(:any)/(:any)']                ='Office/filter_product_out/$1/$2';
$route['Store_Owner/invoice']                                         ='Invoice/index';
$route['Store_Owner/filter_invoice/(:any)/(:any)']                    ='Invoice/filter_invoice/$1/$2';
$route['Store_Owner/view_invoice/(:any)']                             ='Invoice/view_invoice/$1';
$route['Store_Owner/history']                                         ='Transaction_history/index';
$route['Store_Owner/filter_transaction/(:any)/(:any)']                ='Transaction_history/filter_transaction/$1/$2';
$route['Store_Owner/view_product_detail/(:any)']                      ='Office/view_product_detail/$1';




$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
