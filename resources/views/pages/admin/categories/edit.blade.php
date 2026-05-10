@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Kategori</h1>
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
                            action="{{ route('admin.categories.update', $category->id) }}"
                            method="post"
                        >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Masukkan nama kategori"
                                    value="{{ old('name', $category->name) }}"
                                    required
                                >
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
