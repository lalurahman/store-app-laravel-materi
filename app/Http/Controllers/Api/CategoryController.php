<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $data = $categories->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
            ];
        });
        return response()->json($data);
    }
}
