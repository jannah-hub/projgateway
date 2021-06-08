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

$router->group(['middleware' => 'client.credentials'], function () use ($router){

    // API GATEWAY FOR BOOK SERVICE
    $router->get('/books', 'Book1Controller@index'); //Get all books
    $router->post('/books', 'Book1Controller@add'); //Create a new books
    $router->get('/books/{id}', 'Book1Controller@show'); //Get the book info based on author id
    $router->put('/books/{id}', 'Book1Controller@update'); //Update book record based on author id
    $router->delete('/books/{id}', 'Book1Controller@delete'); //Delete book record based on author id

    // API GATEWAY FOR BOOK SERVICE
    $router->get('/authors', 'Author2Controller@index'); //Get all authors
    $router->post('/authors', 'Author2Controller@add'); //Create a new authors
    $router->get('/authors/{id}', 'Author2Controller@show'); //Get the author info based on author id
    $router->put('/authors/{id}', 'Author2Controller@update'); //Update author record based on author id
    $router->delete('/authors/{id}', 'Author2Controller@delete'); //Delete author record based on author id

});

?>