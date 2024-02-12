<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signPage()
    {
        return view('admin.pages.auth.sigin');
    }
}
