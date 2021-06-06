<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService {

    use ConsumesExternalService;
    /**
    * The base uri to consume the User1 Service
    * @var string
    */
    public $baseUri;

    public function __construct()
    {
    $this->baseUri = config('services.service1.base_uri');
    }

    /**
    * Obtain the full list of Users from User2 Site
    * @return string
    */
 
    public function obtainBooks()
    {
        return $this->performRequest('GET','/books'); 
    }

    /**
    * Create one user using the User2 service
    * @return string
    */
    public function createBook($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
    * Obtain one single user from the User2 service
    * @return string
    */
    public function obtainBook($id)
    {
        return $this->performRequest('GET', "/books/{$id}");
    }

    /**
    * Update an instance of user1 using the User2 service
    * @return string
    */
    public function editBook($data, $id)
    {
        return $this->performRequest('PUT', "/books/{$id}", $data);
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */
    public function deleteBook($id)
    {
    return $this->performRequest('DELETE', "/books/{$id}");
    }
}