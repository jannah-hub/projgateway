<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService {

    use ConsumesExternalService;
    /**
    * The base uri to consume the User1 Service
    * @var string
    */
    public $baseUri;
    /**
         * The secret to consume the User1 Service
         * @var string
         */
    public $secret;

    public function __construct()
    {
    $this->baseUri = config('services.authors.base_uri');
    $this->secret = config('services.authors.secret');
    }

    /**
    * Obtain the full list of Users from User2 Site
    * @return string
    */
 
    public function obtainAuthors()
    {
        return $this->performRequest('GET','/authors'); 
    }

    /**
    * Create one user using the User2 service
    * @return string
    */
    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
    * Obtain one single user from the User2 service
    * @return string
    */
    public function obtainAuthor($id)
    {
        return $this->performRequest('GET', "/authors/{$id}");
    }

    /**
    * Update an instance of user1 using the User2 service
    * @return string
    */
    public function editAuthor($data, $id)
    {
        return $this->performRequest('PUT', "/authors/{$id}", $data);
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */
    public function deleteAuthor($id)
    {
    return $this->performRequest('DELETE', "/authors/{$id}");
    }
}