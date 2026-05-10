@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <a
                    href="{{ route('admin.categories.create') }}"
                    class="btn btn-primary mb-3"
                >Tambah Data</a>
            </div>
        </div>
        {{-- alert success  --}}
        @if (session('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        {{-- alert error  --}}
        @if (session('error'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Kategori
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="d-flex">
                                            <a
                                                href="{{ route('admin.categories.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm mr-2"
                                            >Edit</a>
                                            <form
                                                action="{{ route('admin.categories.destroy', $item->id) }}"
                                                method="post"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                >Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td
                                            colspan="3"
                                            class="text-center"
                                        >Data tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
