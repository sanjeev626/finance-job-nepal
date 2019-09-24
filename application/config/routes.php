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
$route['404_override'] = 'page/not_found';
$route['translate_uri_dashes'] = FALSE;


//Ion Auth
$route['admin'] = 'admin/auth';
$route['core'] = 'admin/auth';
$route['core/login'] ='admin/auth/login';
$route['core/forgot_password'] ='admin/auth/forgot_password';
$route['core/reset_password/(:any)'] = 'admin/auth/reset_password/$1';
$route['admin/login'] ='admin/auth/login';
$route['logout'] = 'admin/auth/logout';

$route['admin/Client/([0-9]+)'] = 'admin/Client';
$route['admin/Advertisement/([0-9]+)'] = 'admin/Advertisement';
$route['admin/Employer/([0-9]+)'] = 'admin/Employer';
$route['admin/Employer/searchEmployer/([0-9]+)'] = 'admin/Employer/searchEmployer';
$route['admin/Seeker/([0-9]+)'] = 'admin/Seeker';
$route['admin/Seeker/searchSeeker/([0-9]+)'] = 'admin/Seeker/searchSeeker';

$route['admin/blog/add'] = 'admin/Blog/blogadd';
$route['admin/blog/edit/([0-9]+)'] = 'admin/Blog/blogedit/$1';
$route['admin/blog/save'] = 'admin/Blog/saveblog';
$route['admin/blog/update/([0-9]+)'] = 'admin/Blog/updateblog/$1';
$route['admin/blog/category/add'] = 'admin/Blog/categoryadd';
$route['admin/blog/category/edit/([0-9]+)'] = 'admin/Blog/categoryedit/$1';
$route['admin/blog/category/save'] = 'admin/Blog/saveCategory';
$route['admin/blog/category/update/([0-9]+)'] = 'admin/Blog/updateCategory/$1';

// Frontend Section
$route['job/(:any)/([0-9]+)'] = 'home/job/$1/$2';
$route['job/(:any)/(:any)/([0-9]+)'] = 'home/job/$1/$2/$3';
$route['applyjob/([0-9]+)'] = 'home/applyJob/$1';
//$route['category/(:any)/(:any)'] = 'home/category/$1/$2';
$route['category/(:any)'] = 'home/category/$1';

$route['service'] = 'home/service';
$route['service/(:any)'] = 'home/service/$1';

$route['services'] = 'home/services';
$route['services/(:any)'] = 'home/services/$1';

$route['content/(:any)'] = 'home/content/$1';
$route['article/(:any)'] = 'home/article/$1';

$route['search'] = 'home/Search';
$route['search/(:any)'] = 'home/Search/$1';

$route['(:any)'] = 'home/$1';
$route['employer/(:any)'] = 'home/Employer/$1';
$route['employer/(:any)/([0-9]+)'] = 'home/Employer/$1/$2';
$route['employer/showapplicants/([0-9]+)/([0-9]+)'] = 'home/Employer/showApplicants/$1';
$route['jobseeker/(:any)'] = 'home/Jobseeker/$1';
$route['jobseeker/(:any)/([0-9]+)'] = 'home/Jobseeker/$1/$2';

$route['employer/jobList/(:any)/([0-9]+)'] = 'home/Employer/jobList/$1/$2';
$route['category/(:any)/([0-9]+)'] = 'home/category/$1/$2';
$route['search/jobSearch/([0-9]+)'] = 'home/Search/jobSearch';
$route['search/job/([0-9]+)'] = 'home/Search/job';
$route['search/searchResult/([0-9]+)'] = 'home/Search/searchResult';
$route['viewjobstype/(:any)'] = 'home/Search/searchByJobType/$1';
$route['viewjobstype/(:any)/([0-9]+)'] = 'home/Search/searchByJobType/$1';
$route['viewjobs/(:any)/([0-9]+)'] = 'home/Search/getBydisplayIn/$1';
$route['viewjobs/(:any)/([0-9]+)/([0-9]+)'] = 'home/Search/getBydisplayIn/$1/$2';

$route['blog'] = 'home/Blog';
$route['blog/(:any)'] = 'home/Blog/singlepage/$1';

$route['education/(:any)'] = 'home/education/$1';
$route['education/(:any)/([0-9]+)'] = 'home/education/$1/$2';

$route['job-level/(:any)'] = 'home/jobbylevel/$1';
$route['job-level/(:any)/([0-9]+)'] = 'home/jobbylevel/$1/$2';

$route['job-title/(:any)'] = 'home/jobbytitle/$1';
$route['job-title/(:any)/([0-9]+)'] = 'home/jobbytitle/$1/$2';
/*$route['premium_jobs'] = 'home/premium_jobs';
$route['top_jobs'] = 'home/top_jobs';*/





