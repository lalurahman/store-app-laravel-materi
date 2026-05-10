<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('created_at')->get();
        return view('pages.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // validasi data
            $data = $request->validate([
                'name' => 'required|string|max:255',
            ]);
            // simpan data ke database
            Category::create($data);

            // redirect ke halaman index dengan pesan sukses
            return to_route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
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
        $category = Category::findOrFail($id);
        return view('pages.admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // ambil data kategori berdasarkan id
            $category = Category::findOrFail($id);
            // validasi data
            $data = $request->validate([
                'name' => 'required|string|max:255',
            ]);
            // update data ke database
            $category->update($data);
            // redirect ke halaman index dengan pesan sukses
            return to_route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui!');
        } catch (\Throwable $th) {
            // redirect ke halaman edit dengan pesan error
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // ambil data kategori berdasarkan id
            $category = Category::findOrFail($id);
            // hapus data dari database
            $category->delete();
            // redirect ke halaman index dengan pesan sukses
            return to_route('admin.categories.index')->with('success', 'Kategori berhasil dihapus!');
        } catch (\Throwable $th) {
            // redirect ke halaman index dengan pesan error
            return back()->with('error', $th->getMessage());
        }
    }
}
