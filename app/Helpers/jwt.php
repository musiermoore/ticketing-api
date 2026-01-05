<?php

function jwt_user()
{
    return request()->attributes->get('jwt');
}