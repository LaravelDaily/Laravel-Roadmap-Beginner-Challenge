<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('front.contact.index');
    }
}
