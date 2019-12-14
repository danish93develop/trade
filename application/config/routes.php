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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['forgot-password'] = 'auth/forgot';
$route['auth/password/(:any)/(:any)'] = 'auth/password/$1/$2';
$route['auth/password'] = 'auth/password';

/**********Frontend ************************/
$route['user-login'] = 'home/userlogin';
$route['auth/user-profile'] = 'home/editUserProfile';
$route['logout'] = 'home/logout';
$route['register'] = 'home/register';
$route['thankyou'] = 'home/thankyou';
$route['auth/changepassword'] = 'home/userChangePassword';
$route['auth/forgot-password'] = 'home/userForgotPassword';

$route['user'] = '/userdashboard';
$route['userdashboard/updatenotification'] = '/userdashboard/updateNotification';
$route['graph/(:any)'] = '/userdashboard/stockGraph/$1';

/********************************************/

/**********Plan Management************************/

$route['plan/add'] = 'admin/planmanage/addPlan';
$route['plan/view'] = 'admin/planmanage/viewPlan';
$route['plan/edit/(:any)'] = 'admin/planmanage/editplan/$1';

/********************************************/

/**********Predictions************************/

$route['notification/add'] = 'admin/notification/addNotification';
$route['notification/view'] = 'admin/notification/viewNotification';
$route['admin/notification/updatestatus'] = 'admin/notification/updateStatus';
$route['notification/edit/(:any)'] = 'admin/notification/editNotification/$1';

/********************************************/

$route['admin'] = 'admin/dashboard';
$route['admin/users'] = 'admin/usersmanage/userlisting';
$route['admin/users/edit/(:any)'] = 'admin/usersmanage/userEdit/$1';
$route['admin/users/changepassword/(:any)'] = 'admin/usersmanage/changePassword/$1';
$route['admin/users/updatestatus'] = 'admin/usersmanage/updateStatus';
$route['admin/users-subscription'] = 'admin/usersmanage/manage_subscription';
$route['admin/profile'] = 'admin/usersmanage/profile';


/*********Stocks Management ************/

$route['stock/tickerData'] = 'admin/stocksmanage/tickerData';
$route['stock/symbolData'] = 'admin/stocksmanage/symbolData';
$route['stock/add'] = 'admin/stocksmanage/addstock';
$route['stock/view'] = 'admin/stocksmanage/viewstock';
$route['stock/edit/(:any)'] = 'admin/stocksmanage/editstock/$1';
$route['stock/delete/(:any)'] = 'admin/stocksmanage/deletestock/$1';
$route['stock/history/(:any)'] = 'admin/stocksmanage/viewstockhistory/$1';
$route['stock/stock-history'] = 'admin/stocksmanage/stockhistory';