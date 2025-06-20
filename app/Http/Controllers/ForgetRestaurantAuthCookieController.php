<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class ForgetRestaurantAuthCookieController extends Controller
{
    public function __invoke()
    {
        // Properly forget the cookie (set expired with matching path)
        $cookie = Cookie::forget('restaurant_auth', '/');

        // Return Inertia page with the expired cookie
        return  response("Cookie deleted")->withCookie($cookie);
    }
}
