<?php

return [
    'public_key' => env('JWT_PUBLIC_KEY'),
    'issuer' => env('JWT_ISSUER', 'ticketing-auth'),
];