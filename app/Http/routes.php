<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() 
{
	Route::get('/home', 'HomeController@index');

	#Route::resource('users','UsersController');
	
	Route::get('users',['as'=>'users','uses'=>'UsersController@index','middleware' => ['permission:users|users.create|users.edit|users.destroy|users.show']]);
	Route::get('users/create',['as'=>'users.create','uses'=>'UsersController@create']);
	Route::post('users/create',['as'=>'users.store','uses'=>'UsersController@store']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UsersController@edit']);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UsersController@destroy']);
	Route::put('users/{id}',['as'=>'users.update','uses'=>'UsersController@update']);


	Route::get('roles',['as'=>'roles.index','uses'=>'RolesController@index','middleware' => ['permission:roles|roles.create|roles.edit|roles.destroy|roles.show']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RolesController@create','middleware' => ['permission:roles.create']]);
	Route::post('roles',['as'=>'roles.store','uses'=>'RolesController@store']);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RolesController@show','middleware' => ['permission:roles.show']]);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RolesController@edit','middleware' => ['permission:roles.edit']]);
	Route::put('roles/{id}',['as'=>'roles.update','uses'=>'RolesController@update']);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RolesController@destroy','middleware' => ['permission:roles.destroy']]);

	Route::get('/client_types/', ['as' => 'client_types.index', 'uses' => 'ClientTypesController@index', 'middleware' => ['permission:client_types|client_types.create|client_types.show|client_types.edit|client_types.destroy|client_types.update']]);
	Route::get('/client_types/create', ['as' => 'client_types.create', 'uses' => 'ClientTypesController@create', 'middleware' => ['permission:client_types.create']]);
	Route::get('/client_types/{clientTypeId}/show', ['as' => 'client_types.show', 'uses' => 'ClientTypesController@show', 'middleware' => ['permission:client_types.show']]);
	Route::get('/client_types/{clientTypeId}/edit', ['as' => 'client_types.edit', 'uses' => 'ClientTypesController@edit', 'middleware' => ['permission:client_types.edit']]);
	Route::get('/client_types/{clientTypeId}/destroy', ['as' => 'client_types.destroy', 'uses' => 'ClientTypesController@destroy', 'middleware' => ['permission:client_types.destroy']]);
	Route::put('/client_types/{clientTypeId}/update', ['as' => 'client_types.update', 'uses' => 'ClientTypesController@update']);
	Route::post('/client_types', ['as' => 'client_types.store', 'uses' => 'ClientTypesController@store']);

	Route::get('/client_types/{clientTypeId}/logs', ['as' => 'client_types.logs', 'uses' => 'ClientTypesController@logs', 'middleware' => ['permission:client_types.logs']]);

	Route::get('/states/', ['as' => 'states.index', 'uses' => 'StatesController@index', 'middleware' => ['permission:states|states.create|states.show|states.edit|states.destroy|states.update']]);
	Route::get('/states/create', ['as' => 'states.create', 'uses' => 'StatesController@create', 'middleware' => ['permission:states.create']]);
	Route::get('/states/{stateId}/show', ['as' => 'states.show', 'uses' => 'StatesController@show', 'middleware' => ['permission:states.show']]);
	Route::get('/states/{stateId}/edit', ['as' => 'states.edit', 'uses' => 'StatesController@edit', 'middleware' => ['permission:states.edit']]);
	Route::get('/states/{stateId}/destroy', ['as' => 'states.destroy', 'uses' => 'StatesController@destroy', 'middleware' => ['permission:states.destroy']]);
	Route::put('/states/{stateId}/update', ['as' => 'states.update', 'uses' => 'StatesController@update']);
	Route::post('/states', ['as' => 'states.store', 'uses' => 'StatesController@store']);

	Route::get('/states/{stateId}/logs', ['as' => 'states.logs', 'uses' => 'StatesController@logs', 'middleware' => ['permission:states.logs']]);

	Route::get('/cities/', ['as' => 'cities.index', 'uses' => 'CitiesController@index', 'middleware' => ['permission:cities|cities.create|cities.show|cities.edit|cities.destroy|cities.update']]);
	Route::get('/cities/create', ['as' => 'cities.create', 'uses' => 'CitiesController@create', 'middleware' => ['permission:cities.create']]);
	Route::get('/cities/{cityId}/show', ['as' => 'cities.show', 'uses' => 'CitiesController@show', 'middleware' => ['permission:cities.show']]);
	Route::get('/cities/{cityId}/edit', ['as' => 'cities.edit', 'uses' => 'CitiesController@edit', 'middleware' => ['permission:cities.edit']]);
	Route::get('/cities/{cityId}/destroy', ['as' => 'cities.destroy', 'uses' => 'CitiesController@destroy', 'middleware' => ['permission:cities.destroy']]);
	Route::put('/cities/{cityId}/update', ['as' => 'cities.update', 'uses' => 'CitiesController@update']);
	Route::post('/cities', ['as' => 'cities.store', 'uses' => 'CitiesController@store']);

	Route::get('/cities/{cityId}/logs', ['as' => 'cities.logs', 'uses' => 'CitiesController@logs', 'middleware' => ['permission:cities.logs']]);

	Route::get('/clients/', ['as' => 'clients.index', 'uses' => 'ClientsController@index', 'middleware' => ['permission:clients|clients.create|clients.show|clients.edit|clients.destroy']]);
	Route::get('/clients/create', ['as' => 'clients.create', 'uses' => 'ClientsController@create', 'middleware' => ['permission:clients.create']]);
	Route::get('/clients/{clientId}/show', ['as' => 'clients.show', 'uses' => 'ClientsController@show', 'middleware' => ['permission:clients.show']]);
	Route::get('/clients/{clientId}/edit', ['as' => 'clients.edit', 'uses' => 'ClientsController@edit', 'middleware' => ['permission:clients.edit']]);
	Route::get('/clients/{clientId}/destroy', ['as' => 'clients.destroy', 'uses' => 'ClientsController@destroy', 'middleware' => ['permission:clients.destroy']]);
	Route::put('/clients/{clientId}/update', ['as' => 'clients.update', 'uses' => 'ClientsController@update']);
	Route::post('/clients', ['as' => 'clients.store', 'uses' => 'ClientsController@store']);

	Route::get('/clients/{clientId}/logs', ['as' => 'clients.logs', 'uses' => 'ClientsController@logs', 'middleware' => ['permission:clients.logs']]);

	Route::get('/material_units/', ['as' => 'material_units', 'uses' => 'MaterialUnitsController@index', 'middleware' => ['permission:material_units|material_units.create|material_units.show|material_units.edit|material_units.destroy']]);
	Route::get('/material_units/create', ['as' => 'material_units.create', 'uses' => 'MaterialUnitsController@create', 'middleware' => ['permission:material_units.create']]);
	Route::get('/material_units/{materialUnitId}/show', ['as' => 'material_units.show', 'uses' => 'MaterialUnitsController@show', 'middleware' => ['permission:material_units.show']]);
	Route::get('/material_units/{materialUnitId}/edit', ['as' => 'material_units.edit', 'uses' => 'MaterialUnitsController@edit', 'middleware' => ['permission:material_units.edit']]);
	Route::get('/material_units/{materialUnitId}/destroy', ['as' => 'material_units.destroy', 'uses' => 'MaterialUnitsController@destroy', 'middleware' => ['permission:material_units.destroy']]);
	Route::put('/material_units/{materialUnitId}/update', ['as' => 'material_units.update', 'uses' => 'MaterialUnitsController@update']);
	Route::post('/material_units', ['as' => 'material_units.store', 'uses' => 'MaterialUnitsController@store']);

	Route::get('/materials/', ['as' => 'materials', 'uses' => 'MaterialsController@index', 'middleware' => ['permission:materials|materials.create|materials.show|materials.edit|materials.destroy']]);
	Route::get('/materials/search_results_back', ['as' => 'materials.search_results_back', 'uses' => 'MaterialsController@search_results_back']);
	Route::get('/materials/create', ['as' => 'materials.create', 'uses' => 'MaterialsController@create', 'middleware' => ['permission:materials.create']]);
	Route::get('/materials/{materialId}/show', ['as' => 'materials.show', 'uses' => 'MaterialsController@show', 'middleware' => ['permission:materials.show']]);
	Route::get('/materials/{materialId}/edit', ['as' => 'materials.edit', 'uses' => 'MaterialsController@edit', 'middleware' => ['permission:materials.edit']]);
	Route::get('/materials/{materialId}/destroy', ['as' => 'materials.destroy', 'uses' => 'MaterialsController@destroy', 'middleware' => ['permission:materials.destroy']]);
	Route::put('/materials/{materialId}/update', ['as' => 'materials.update', 'uses' => 'MaterialsController@update']);
	Route::post('/materials', ['as' => 'materials.store', 'uses' => 'MaterialsController@store']);

	Route::get('/patrimonial_brands/', ['as' => 'patrimonial_brands', 'uses' => 'PatrimonialBrandsController@index', 'middleware' => ['permission:patrimonial_brands|patrimonial_brands.create|patrimonial_brands.show|patrimonial_brands.edit|patrimonial_brands.destroy']]);
	Route::get('/patrimonial_brands/search_results_back', ['as' => 'patrimonial_brands.search_results_back', 'uses' => 'PatrimonialBrandsController@search_results_back']);
	Route::get('/patrimonial_brands/create', ['as' => 'patrimonial_brands.create', 'uses' => 'PatrimonialBrandsController@create', 'middleware' => ['permission:patrimonial_brands.create']]);
	Route::get('/patrimonial_brands/{patrimonialBrandId}/show', ['as' => 'patrimonial_brands.show', 'uses' => 'PatrimonialBrandsController@show', 'middleware' => ['permission:patrimonial_brands.show']]);
	Route::get('/patrimonial_brands/{patrimonialBrandId}/edit', ['as' => 'patrimonial_brands.edit', 'uses' => 'PatrimonialBrandsController@edit', 'middleware' => ['permission:patrimonial_brands.edit']]);
	Route::get('/patrimonial_brands/{patrimonialBrandId}/destroy', ['as' => 'patrimonial_brands.destroy', 'uses' => 'PatrimonialBrandsController@destroy', 'middleware' => ['permission:patrimonial_brands.destroy']]);
	Route::put('/patrimonial_brands/{patrimonialBrandId}/update', ['as' => 'patrimonial_brands.update', 'uses' => 'PatrimonialBrandsController@update']);
	Route::post('/patrimonial_brands', ['as' => 'patrimonial_brands.store', 'uses' => 'PatrimonialBrandsController@store']);

	Route::get('/services/', ['as' => 'services', 'uses' => 'ServicesController@index', 'middleware' => ['permission:services|services.create|services.show|services.edit|services.destroy']]);
	Route::get('/services/create', ['as' => 'services.create', 'uses' => 'ServicesController@create', 'middleware' => ['permission:services.create']]);
	Route::get('/services/{serviceId}/show', ['as' => 'services.show', 'uses' => 'ServicesController@show', 'middleware' => ['permission:services.show']]);
	Route::get('/services/{serviceId}/edit', ['as' => 'services.edit', 'uses' => 'ServicesController@edit', 'middleware' => ['permission:services.edit']]);
	Route::get('/services/{serviceId}/destroy', ['as' => 'services.destroy', 'uses' => 'ServicesController@destroy', 'middleware' => ['permission:services.destroy']]);
	Route::put('/services/{serviceId}/update', ['as' => 'services.update', 'uses' => 'ServicesController@update']);
	Route::post('/services', ['as' => 'services.store', 'uses' => 'ServicesController@store']);

	Route::get('/patrimonial_models/', ['as' => 'patrimonial_models', 'uses' => 'PatrimonialModelsController@index', 'middleware' => ['permission:patrimonial_models|patrimonial_models.create|patrimonial_models.show|patrimonial_models.edit|patrimonial_models.destroy']]);
	Route::get('/patrimonial_models/search_results_back', ['as' => 'patrimonial_models.search_results_back', 'uses' => 'PatrimonialModelsController@search_results_back']);
	Route::get('/patrimonial_models/create', ['as' => 'patrimonial_models.create', 'uses' => 'PatrimonialModelsController@create', 'middleware' => ['permission:patrimonial_models.create']]);
	Route::get('/patrimonial_models/{patrimonialModelId}/show', ['as' => 'patrimonial_models.show', 'uses' => 'PatrimonialModelsController@show', 'middleware' => ['permission:patrimonial_models.show']]);
	Route::get('/patrimonial_models/{patrimonialModelId}/edit', ['as' => 'patrimonial_models.edit', 'uses' => 'PatrimonialModelsController@edit', 'middleware' => ['permission:patrimonial_models.edit']]);
	Route::get('/patrimonial_models/{patrimonialModelId}/destroy', ['as' => 'patrimonial_models.destroy', 'uses' => 'PatrimonialModelsController@destroy', 'middleware' => ['permission:patrimonial_models.destroy']]);
	Route::put('/patrimonial_models/{patrimonialModelId}/update', ['as' => 'patrimonial_models.update', 'uses' => 'PatrimonialModelsController@update']);
	Route::post('/patrimonial_models', ['as' => 'patrimonial_models.store', 'uses' => 'PatrimonialModelsController@store']);

	Route::get('/patrimonial_types/', ['as' => 'patrimonial_types', 'uses' => 'PatrimonialTypesController@index', 'middleware' => ['permission:patrimonial_types|patrimonial_types.create|patrimonial_types.show|patrimonial_types.edit|patrimonial_types.destroy']]);
	Route::get('/patrimonial_types/search_results_back', ['as' => 'patrimonial_types.search_results_back', 'uses' => 'PatrimonialTypesController@search_results_back']);
	Route::get('/patrimonial_types/create', ['as' => 'patrimonial_types.create', 'uses' => 'PatrimonialTypesController@create', 'middleware' => ['permission:patrimonial_types.create']]);
	Route::get('/patrimonial_types/{patrimonialTypeId}/show', ['as' => 'patrimonial_types.show', 'uses' => 'PatrimonialTypesController@show', 'middleware' => ['permission:patrimonial_types.show']]);
	Route::get('/patrimonial_types/{patrimonialTypeId}/edit', ['as' => 'patrimonial_types.edit', 'uses' => 'PatrimonialTypesController@edit', 'middleware' => ['permission:patrimonial_types.edit']]);
	Route::get('/patrimonial_types/{patrimonialTypeId}/destroy', ['as' => 'patrimonial_types.destroy', 'uses' => 'PatrimonialTypesController@destroy', 'middleware' => ['permission:patrimonial_types.destroy']]);
	Route::put('/patrimonial_types/{patrimonialTypeId}/update', ['as' => 'patrimonial_types.update', 'uses' => 'PatrimonialTypesController@update']);
	Route::post('/patrimonial_types', ['as' => 'patrimonial_types.store', 'uses' => 'PatrimonialTypesController@store']);

	Route::get('/patrimonial_sub_types/', ['as' => 'patrimonial_sub_types', 'uses' => 'PatrimonialSubTypesController@index', 'middleware' => ['permission:patrimonial_sub_types|patrimonial_sub_types.create|patrimonial_sub_types.show|patrimonial_sub_types.edit|patrimonial_sub_types.destroy']]);
	Route::get('/patrimonial_sub_types/search_results_back', ['as' => 'patrimonial_sub_types.search_results_back', 'uses' => 'PatrimonialSubTypesController@search_results_back']);
	Route::get('/patrimonial_sub_types/create', ['as' => 'patrimonial_sub_types.create', 'uses' => 'PatrimonialSubTypesController@create', 'middleware' => ['permission:patrimonial_sub_types.create']]);
	Route::get('/patrimonial_sub_types/{patrimonialSubTypeId}/show', ['as' => 'patrimonial_sub_types.show', 'uses' => 'PatrimonialSubTypesController@show', 'middleware' => ['permission:patrimonial_sub_types.show']]);
	Route::get('/patrimonial_sub_types/{patrimonialSubTypeId}/edit', ['as' => 'patrimonial_sub_types.edit', 'uses' => 'PatrimonialSubTypesController@edit', 'middleware' => ['permission:patrimonial_sub_types.edit']]);
	Route::get('/patrimonial_sub_types/{patrimonialSubTypeId}/destroy', ['as' => 'patrimonial_sub_types.destroy', 'uses' => 'PatrimonialSubTypesController@destroy', 'middleware' => ['permission:patrimonial_sub_types.destroy']]);
	Route::put('/patrimonial_sub_types/{patrimonialSubTypeId}/update', ['as' => 'patrimonial_sub_types.update', 'uses' => 'PatrimonialSubTypesController@update']);
	Route::post('/patrimonial_sub_types', ['as' => 'patrimonial_sub_types.store', 'uses' => 'PatrimonialSubTypesController@store']);

	Route::get('/patrimonials/', ['as' => 'patrimonials', 'uses' => 'PatrimonialsController@index', 'middleware' => ['permission:patrimonials|patrimonials.create|patrimonials.show|patrimonials.edit|patrimonials.destroy']]);
	Route::get('/patrimonials/search_results_back', ['as' => 'patrimonials.search_results_back', 'uses' => 'PatrimonialsController@search_results_back']);
	Route::get('/patrimonials/create', ['as' => 'patrimonials.create', 'uses' => 'PatrimonialsController@create', 'middleware' => ['permission:patrimonials.create']]);
	Route::get('/patrimonials/{patrimonialId}/show', ['as' => 'patrimonials.show', 'uses' => 'PatrimonialsController@show', 'middleware' => ['permission:patrimonials.show']]);
	Route::get('/patrimonials/{patrimonialId}/edit', ['as' => 'patrimonials.edit', 'uses' => 'PatrimonialsController@edit', 'middleware' => ['permission:patrimonials.edit']]);
	Route::get('/patrimonials/{patrimonialId}/destroy', ['as' => 'patrimonials.destroy', 'uses' => 'PatrimonialsController@destroy', 'middleware' => ['permission:patrimonials.destroy']]);
	Route::put('/patrimonials/{patrimonialId}/update', ['as' => 'patrimonials.update', 'uses' => 'PatrimonialsController@update']);
	Route::post('/patrimonials', ['as' => 'patrimonials.store', 'uses' => 'PatrimonialsController@store']);

	Route::get('/contracts/', ['as' => 'contracts', 'uses' => 'ContractsController@index', 'middleware' => ['permission:contracts|contracts.create|contracts.show|contracts.edit|contracts.destroy']]);
	Route::get('/contracts/create', ['as' => 'contracts.create', 'uses' => 'ContractsController@create', 'middleware' => ['permission:contracts.create']]);
	Route::get('/contracts/{contractId}/show', ['as' => 'contracts.show', 'uses' => 'ContractsController@show', 'middleware' => ['permission:contracts.show']]);
	Route::get('/contracts/{contractId}/edit', ['as' => 'contracts.edit', 'uses' => 'ContractsController@edit', 'middleware' => ['permission:contracts.edit']]);
	Route::get('/contracts/{contractId}/destroy', ['as' => 'contracts.destroy', 'uses' => 'ContractsController@destroy', 'middleware' => ['permission:contracts.destroy']]);
	Route::put('/contracts/{contractId}/update', ['as' => 'contracts.update', 'uses' => 'ContractsController@update']);
	Route::post('/contracts', ['as' => 'contracts.store', 'uses' => 'ContractsController@store']);

	Route::get('/orders/', ['as' => 'orders', 'uses' => 'OrdersController@index', 'middleware' => ['permission:orders|orders.create|orders.show|orders.edit|orders.destroy']]);
	Route::get('/orders/search_results_back', ['as' => 'orders.search_results_back', 'uses' => 'OrdersController@search_results_back']);
	Route::get('patrimonials/{patrimonialId}/orders/create', ['as' => 'orders.create', 'uses' => 'OrdersController@create', 'middleware' => ['permission:orders.create']]);
	Route::get('/orders/{orderId}/show', ['as' => 'orders.show', 'uses' => 'OrdersController@show', 'middleware' => ['permission:orders.show']]);
	Route::get('/orders/{orderId}/edit', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit', 'middleware' => ['permission:orders.edit']]);
	Route::get('/orders/{orderId}/destroy', ['as' => 'orders.destroy', 'uses' => 'OrdersController@destroy', 'middleware' => ['permission:orders.destroy']]);
	Route::put('/orders/{orderId}/update', ['as' => 'orders.update', 'uses' => 'OrdersController@update']);
	Route::post('/patrimonials/{patrimonialId}/orders', ['as' => 'orders.store', 'uses' => 'OrdersController@store']);


	Route::get('/orders/{orderId}/services', ['as' => 'orders_services', 'uses' => 'OrdersController@services']);
	Route::get('/orders/{orderId}/services/search', ['as' => 'orders_services.search', 'uses' => 'OrdersController@services_search', 'middleware' => ['permission:orders_services.search']]);
	Route::post('/orders/{orderId}/services/search', ['as' => 'orders_services.search_results', 'uses' => 'OrdersController@services_search_results']);
	Route::get('/orders/{orderId}/services/{serviceId}/cart', ['as' => 'orders_services.cart', 'uses' => 'OrdersController@services_cart']);
	Route::post('/orders/{orderId}/services/{serviceId}/cart', ['as' => 'orders_services.store', 'uses' => 'OrdersController@services_store']);
	Route::get('/orders/services/{id}/destroy', ['as' => 'orders_services.destroy', 'uses' => 'OrdersController@services_destroy', 'middleware' => ['permission:orders_services.destroy']]);

	Route::get('/orders/{orderId}/materials', ['as' => 'orders_materials', 'uses' => 'OrdersController@materials']);
	Route::get('/orders/{orderId}/materials/search', ['as' => 'orders_materials.search', 'uses' => 'OrdersController@materials_search', 'middleware' => ['permission:orders_materials.search']]);
	Route::post('/orders/{orderId}/materials/search', ['as' => 'orders_materials.search_results', 'uses' => 'OrdersController@materials_search_results']);
	Route::get('/orders/{orderId}/materials/{serviceId}/cart', ['as' => 'orders_materials.cart', 'uses' => 'OrdersController@materials_cart']);
	Route::post('/orders/{orderId}/materials/{serviceId}/cart', ['as' => 'orders_materials.store', 'uses' => 'OrdersController@materials_store']);
	Route::get('/orders/materials/{id}/destroy', ['as' => 'orders_materials.destroy', 'uses' => 'OrdersController@materials_destroy', 'middleware' => ['permission:orders_materials.destroy']]);


	Route::get('/orders/{orderId}/cart', ['as' => 'orders.cart', 'uses' => 'OrdersController@cart']);
	Route::put('/orders/{orderId}/cart', ['as' => 'orders.cart_update', 'uses' => 'OrdersController@cart_update']);

	Route::get('/orders/{orderId}/set_status_2', ['as' => 'orders.set_status_2', 'uses' => 'OrdersController@set_status_2']);
	Route::get('/orders/{orderId}/set_status_3', ['as' => 'orders.set_status_3', 'uses' => 'OrdersController@set_status_3']);
	Route::get('/orders/{orderId}/set_status_4', ['as' => 'orders.set_status_4', 'uses' => 'OrdersController@set_status_4']);

});

