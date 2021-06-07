<?php

return [
    'service1' => [
        'base_uri' => env('BOOK_SERVICE_BASE_URL'),
        'secret' => env('BOOK_SERVICE_SECRET'),
    ],

    'service2' => [
        'base_uri' => env('AUTHOR_SERVICE_BASE_URL'),
        'secret' => env('AUTHOR_SERVICE_SECRET'),
    ],
];