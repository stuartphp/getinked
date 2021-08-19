<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.list');
    }
    public function categories()
    {
        return view('products.categories');
    }
    public function units()
    {
        return view('products.units');
    }
}
