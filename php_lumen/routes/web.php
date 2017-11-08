<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'IndexController@index');
$router->get('/menu', 'CustomerController@guest_view_menu');
$router->get('/promotions', 'CustomerController@guest_view_promotion');
$router->get('/register', 'CustomerController@register');
$router->post('/register', 'CustomerController@store_register_data');
$router->get('/login', 'CustomerController@login');
$router->post('/login', 'CustomerController@login_authen');
$router->get('/logout','CustomerController@logout');

$router->get('/customer/menu', 'CustomerController@view_menu');
$router->post('/customer/queue', 'CustomerController@view_menu');
$router->get('/customer/queue', 'CustomerController@view_order');
$router->post('/customer/queue/delete', 'CustomerController@delete_food_queue');
$router->post('/customer/order', 'CustomerController@place_order');
$router->get('/customer/queue', 'CustomerController@view_order');
$router->get('/customer/result', 'CustomerController@view_order_result');


//crud in class
$router->get('/crud', function(){
  //echo 'aaa';
  return view('crud.index', [
      'title' => 'CRUD',
    ]);
});
$router->get('/crud/register/view', 'CustomerController@view_register_data');
$router->post('/crud/register/edit', 'CustomerController@edit_register_data');
$router->post('/crud/register/view/delete', 'CustomerController@delete_register_data');
$router->get('/crud/order/view', 'CrudController@show_order_list');
$router->post('/crud/order/delete', 'CrudController@delete_order_list');
$router->get('/crud/order/edit/{order_id}', 'CrudController@show_order_food_list');
$router->post('/crud/order/edit/food/{fList_id}', 'CrudController@edit_order_food_list');
$router->post('/crud/order/edit/food/{fList_id}/delete', 'CrudController@delete_order_food_list');
//for chef
$router->get('/chef-queue', 'ChefController@menu_list');
$router->post('/chef-queue/cooking', 'ChefController@update_order_status_cooking');
$router->post('/chef-queue/ready', 'ChefController@update_order_status_ready');
$router->post('/chef-queue/cancel', 'ChefController@cancel_order');

//for manager manage food list
$router->get('/manager-menu', 'ManagerController@food_view');
$router->get('/manager-menu/food-add', 'ManagerController@food_add');
$router->post('/manager-menu/food-add', 'ManagerController@store_food_add_data');
$router->post('/manager-menu/food-delete', 'ManagerController@food_delete');


$router->get('/manager-worker', 'ManagerController@worker_view');
$router->get('/manager-worker/worker-add', 'ManagerController@worker_add');
$router->post('/manager-worker/worker-add', 'ManagerController@store_worker_add');
$router->post('/manager-worker/worker-edit', 'ManagerController@worker_edit');
$router->post('/manager-worker/worker-edit-store', 'ManagerController@store_worker_edit');
$router->post('/manager-worker/worker-delete', 'ManagerController@worker_delete');

$router->get('/manager-promotion', 'ManagerController@promotion_view');
$router->post('/manager-promotion/promotion-add', 'ManagerController@promotion_add');
$router->post('/manager-promotion/promotion-add-store', 'ManagerController@store_promotion_add');
$router->post('/manager-promotion/promotion-edit', 'ManagerController@promotion_edit');
$router->post('/manager-promotion/promotion-edit-store', 'ManagerController@store_promotion_edit');
$router->post('/manager-promotion/promotion-delete', 'ManagerController@promotion_delete');


$router->get('/cashier', 'CashierController@check_bill');
$router->get('/cashier/paid', 'CashierController@edit_paid');
$router->get('/cashier/{id}', 'CashierController@show_order_list');
$router->get('/delivery', 'ServerController@delivery');
$router->get('/delivery/update', 'ServerController@');
$router->get('/waiter', 'ServerController@waiter');
$router->get('/status', 'ServerController@status');
