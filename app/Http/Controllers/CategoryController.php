<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index($id)
    {
        return Inertia::render('Category', [
            'category' => Category::find($id),
            'products_of_category' => Product::where('category', $id)
                ->get()
        ]);
    }
}
