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

$route['default_controller']                                    = "main";
$route['[a-z\d-/]+?/(-\d+-.+)']                                 = "main/document/$1"; #/news/ukraine/-id-****/
$route['(news|hi-tech|auto-|building-|health-|women-)$']        = "main/main_page/$1";
$route['search/(:any)']                                         = "main/search/$1";
$route['[a-z\d-/]+?/([a-z\d-]+?)/?(\d*)']                       = "main/cat_list/$1/$2";
$route['parser/(:any)']                                         = "parser/main/$1";
$route['donor/(:any)']                                          = "donor/$1";
$route['tmp/(:any)']                                            = "tmp/$1";
$route['donor_admin/(:any)']                                    = "donor_admin/$1";
$route['donor_domain/(:any)']                                   = "donor_domain/$1";
$route['(:any)']                                                = "main/$1";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */