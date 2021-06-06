<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\BookService;
//use App\UserModel;
use DB;

class Book1Controller extends Controller
{
    use ApiResponser;

    /**
    * The service to consume the User1 Microservice
    * @var BookService
    */
    public $bookService;

    /**
    * Create a new controller instance
    * @return void
    */
    public function __construct(BookService $bookService){
        $this->bookService = $bookService;
 }

/*
    private $request;
    
     
    public function __construct(Request $request)
    {
        $this->request = $request;
        
    }


    public function getUsers()
    {
        
    }
*/
    
    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */

    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks()); 
    }


    public function add(Request $request)
    {
        return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
    }

    /**
        * Obtains and show one user
        * @return Illuminate\Http\Response
        */


    public function show($id)
    {
        return $this->successResponse($this->bookService->obtainBook($id));
    }

    /**
        * Update an existing author
        * @return Illuminate\Http\Response
        */
    
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $id));
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */

    public function delete($id)
    {
        return $this->successResponse($this->bookService->deleteBook($id));
    }    
}

?>