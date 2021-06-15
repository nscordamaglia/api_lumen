<?php

use Illuminate\Auth\GenericUser;

/***
 * @param $token
 * @return GenericUser
 */
function user_from_token($token): GenericUser
{
    list(,$payload,) = explode('.', $token);

    $userAttributes = json_decode(base64_decode($payload), true);

    return new GenericUser($userAttributes);
}