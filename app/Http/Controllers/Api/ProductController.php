<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // request parameter nama produk
        $name = request()->query('name');
        $products = Product::with('category')
            ->when($name, function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            })
            ->get();
        $data = $products->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'price' => (float) $item->price,
                'stock' => $item->stock,
                'description' => $item->description,
                'image' => env('APP_URL') . Storage::url('products/' . $item->image),
                'category' => [
                    'id' => $item->category_id,
                    'name' => $item->category->name,
                ],
            ];
        });
        return response()->json($data);
    }

    public function show($id)
    {
        $item = Product::findOrFail($id);
        $data = [
            'id' => $item->id,
            'name' => $item->name,
            'price' => (float) $item->price,
            'stock' => $item->stock,
            'description' => $item->description,
            'image' => env('APP_URL') . Storage::url('products/' . $item->image),
            'category' => [
                'id' => $item->category_id,
                'name' => $item->category->name,
            ],
        ];
        return response()->json($data);
    }
}
