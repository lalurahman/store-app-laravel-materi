@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <a
                    href="{{ route('admin.products.create') }}"
                    class="btn btn-primary mb-3"
                >Tambah Data</a>
            </div>
        </div>
        {{-- alert success  --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- alert error  --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Produk
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ number_format($item->price) }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>
                                            @if ($item->image)
                                                <img
                                                    src="{{ asset('storage/products/' . $item->image) }}"
                                                    alt="{{ $item->name }}"
                                                    width="50"
                                                >
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a
                                                href="{{ route('admin.products.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm mr-2"
                                            >Edit</a>
                                            <form
                                                action="{{ route('admin.products.destroy', $item->id) }}"
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

@push('scripts')
    {{--  --}}
@endpush
