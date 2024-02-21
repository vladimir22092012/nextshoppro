<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SiteController extends Controller
{
    public function index(): \Inertia\Response
    {
        $repository = new ProductRepository();
        $products = $repository->main_page_products();
        $feature = $products[0];
        unset($products[0]);
        return Inertia::render('Site/Index', [
            'feature' => $feature,
            'main_products' => $products,
        ]);
    }
}
