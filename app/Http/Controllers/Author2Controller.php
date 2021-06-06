<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\AuthorService;
//use App\UserModel;
use DB;

class Author2Controller extends Controller
{
    use ApiResponser;

    /**
    * The service to consume the User1 Microservice
    * @var AuthorService
    */
    public $authorService;

    /**
    * Create a new controller instance
    * @return void
    */
    public function __construct(AuthorService $authorService){
        $this->authorService = $authorService;
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
        return $this->successResponse($this->authorService->obtainAuhtors()); 
    }


    public function add(Request $request)
    {
        return $this->successResponse($this->authorService->createAuhtor($request->all(), Response::HTTP_CREATED));
    }

    /**
        * Obtains and show one user
        * @return Illuminate\Http\Response
        */


    public function show($id)
    {
        return $this->successResponse($this->authorService->obtainAuhtor($id));
    }

    /**
        * Update an existing author
        * @return Illuminate\Http\Response
        */
    
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->authorService->editAuhtor($request->all(), $id));
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */

    public function delete($id)
    {
        return $this->successResponse($this->authorService->deleteAuhtor($id));
    }    
}

?>