@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tambah Produk</h1>
            </div>
        </div>
        {{-- alert error --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="{{ route('admin.products.store') }}"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="form-group">
                                <label for="">Pilih Kategori</label>
                                <select
                                    name="category_id"
                                    id=""
                                    class="form-control"
                                    required
                                >
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Masukkan nama produk"
                                    required
                                >
                            </div>
                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input
                                    type="number"
                                    name="price"
                                    class="form-control"
                                    placeholder="Masukkan harga produk"
                                    required
                                >
                            </div>
                            <div class="form-group">
                                <label>Stok Produk</label>
                                <input
                                    type="number"
                                    name="stock"
                                    class="form-control"
                                    placeholder="Masukkan stok produk"
                                    required
                                >
                            </div>
                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                    required
                                >
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <textarea
                                    name="description"
                                    class="form-control"
                                    id=""
                                    cols="30"
                                    rows="10"
                                ></textarea>
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary mt-3"
                            >Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
