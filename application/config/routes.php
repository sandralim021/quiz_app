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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//User Routes
$route['main'] = 'User/QuizController/index';
$route['get_questions/(:any)'] = 'User/QuizController/get_questions/$1';
$route['question/(:any)'] = 'User/QuizController/question/$1';
$route['next_question'] = 'User/QuizController/next_question';
$route['score/(:any)'] = 'User/QuizController/score/$1';
$route['login'] = 'User/UserController/login';
$route['login_user'] = 'User/UserController/login_user';
$route['signup'] = 'User/UserController/signup';
$route['signup_user'] = 'User/UserController/signup_user';
$route['logout'] = 'User/UserController/logout';
$route['profile'] = 'User/UserController/profile';
$route['update_profile/(:any)'] = 'User/UserController/update_profile/$1';
//History Routes
$route['history'] = 'User/HistoryController/index';
//Ranking Routes
$route['ranking/select_quiz'] = 'User/RankingController/quiz_index';
$route['ranking/list/(:any)'] = 'User/RankingController/rank_index/$1';
// Admin Quizzes Routes
$route['admin/quizzes'] = 'Admin/QuizController/index';
$route['admin/quizzes/fetch'] = 'Admin/QuizController/fetch';
$route['admin/quizzes/insert'] = 'Admin/QuizController/insert';
$route['admin/quizzes/edit/(:any)'] = 'Admin/QuizController/edit/$1';
$route['admin/quizzes/update/(:any)'] = 'Admin/QuizController/update/$1';
$route['admin/quizzes/delete/(:any)'] = 'Admin/QuizController/delete/$1';

//Admin Questions Routes
$route['admin/questions/(:any)'] = 'Admin/QuestionController/index/$1';
$route['admin/questions/fetch/(:any)'] = 'Admin/QuestionController/fetch/$1';
$route['admin/questions/insert/(:any)'] = 'Admin/QuestionController/insert/$1';
$route['admin/questions/edit/(:any)'] = 'Admin/QuestionController/edit/$1';
$route['admin/questions/update/(:any)'] = 'Admin/QuestionController/update/$1';
$route['admin/questions/delete/(:any)'] = 'Admin/QuestionController/delete/$1';

//Admin Users Routes
$route['admin/users'] = 'Admin/UserController/index';
$route['admin/users/fetch'] = 'Admin/UserController/fetch';

//Rank Routes
$route['admin/ranking/select_quiz'] = 'Admin/RankingController/quiz_index';
$route['admin/ranking/fetch_quiz'] = 'Admin/RankingController/fetch_quiz';
$route['admin/ranking/list/(:any)'] = 'Admin/RankingController/rank_index/$1';
$route['admin/ranking/fetch_rank/(:any)'] = 'Admin/RankingController/fetch_rank/$1';
$route['admin/ranking/delete_rank/(:any)'] = 'Admin/RankingController/delete_rank/$1';

//History Routes
$route['admin/history'] = 'Admin/HistoryController/index';
$route['admin/history/fetch'] = 'Admin/HistoryController/fetch';
$route['admin/history/delete/(:any)'] = 'Admin/HistoryController/delete/$1';

//Admin Auth
$route['admin/login'] = 'Admin/LoginController/login_index';
$route['admin/login_user'] = 'Admin/LoginController/login_user';
$route['admin/home'] = 'Admin/HomeController/index';
$route['admin/profile'] = 'Admin/ProfileController/profile_index';
$route['admin/update_profile/(:any)'] = 'Admin/ProfileController/update_profile/$1';
$route['admin/logout'] = 'Admin/LoginController/logout';
