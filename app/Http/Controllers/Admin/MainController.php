<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class MainController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Main/Index');
    }
}
