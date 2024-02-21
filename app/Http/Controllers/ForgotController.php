<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ForgotController extends Controller
{

    public function form() {
        return Inertia::render('Site/Forgot');
    }

    public function forgot(Request $request)
    {
        dd($request->toArray());
    }

    public function verify(Request $request)
    {
        dd($request->toArray());
    }
}
