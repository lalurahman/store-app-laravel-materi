<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest('created_at')->get();
        return view('pages.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'nullable|string',
            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('products', $imageName, 'public');
                $data['image'] = $imageName;
            }
            Product::create($data);
            return to_route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('pages.admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $data = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'nullable|string',
            ], [
                'category_id.required' => 'Kategori harus dipilih',
                'category_id.exists' => 'Kategori tidak valid',
                'name.required' => 'Nama produk harus diisi',
                'name.string' => 'Nama produk harus berupa teks',
                'name.max' => 'Nama produk maksimal 255 karakter',
                'price.required' => 'Harga produk harus diisi',
                'price.numeric' => 'Harga produk harus berupa angka',
                'price.min' => 'Harga produk minimal 0',
                'stock.required' => 'Stok produk harus diisi',
                'stock.integer' => 'Stok produk harus berupa angka bulat',
                'stock.min' => 'Stok produk minimal 0',
                'image.image' => 'File yang diunggah harus berupa gambar',
                'image.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg',
                'image.max' => 'Ukuran gambar maksimal 2MB',
            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('products', $imageName, 'public');
                $data['image'] = $imageName;
            }
            $product->update($data);
            return to_route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return to_route('admin.products.index')->with('success', 'Produk berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }
}
