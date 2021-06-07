<?php



/*
|---------------------------------------------------------------------
-----
| Application Routes
|---------------------------------------------------------------------
-----
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
 return $router->app->version();
}); //this will point to your local directory

/* old code
// unsecure routes 
$router->group(['prefix' => 'api'], function () use ($router) {
 $router->get('/users',['uses' => 'UserController@getUsers']);
});
*/

$router->group(['middleware' => 'client.credentials'], function () use ($router){

    // API GATEWAY FOR SITE1 USERS
    $router->get('/service1', 'Book1Controller@index'); //get all users record
    $router->post('/service1', 'Book1Controller@add'); //create new users record
    $router->get('/service1/{id}', 'Book1Controller@show'); //get new users by id record
    $router->put('/service1/{id}', 'Book1Controller@update'); //update user record
    $router->patch('/service1/{id}', 'Book1Controller@update'); //update user record
    $router->delete('/service1/{id}', 'Book1Controller@delete'); //delete record

    // API GATEWAY FOR SITE2 USERS
    $router->get('/service2', 'Author2Controller@index'); //get all users record
    $router->post('/service2', 'Author2Controller@add'); //create new users record
    $router->get('/service2/{id}', 'Author2Controller@show'); //get new users by id record
    $router->put('/service2/{id}', 'Author2Controller@update'); //update user record
    $router->patch('/service2/{id}', 'Author2Controller@update'); //update user record
    $router->delete('/service2/{id}', 'Author2Controller@delete'); //delete record

});

?>