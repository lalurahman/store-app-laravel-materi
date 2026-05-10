@extends('layouts.public')

@section('title', 'Products')

@section('content')
    <!-- section products -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold text-danger">Our Best Sellers</h2>
            <div class="row mt-4 justify-content-center">
                @forelse ($products as $item)
                    <div class="col-md-3">
                        <div
                            class="card"
                            style="width: 18rem;"
                        >
                            <img
                                src="{{ $item->image ? Storage::url('products/' . $item->image) : asset('image/no-image.png') }}"
                                class="card-img-top"
                                alt="{{ $item->name }}"
                            >
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="text-muted mb-1">{{ $item->category->name }}</p>
                                <p class="fw-bold text-success">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                <a
                                    href="https://api.whatsapp.com/send?phone=6285256999428&text=Halo%20Admin%20Saya%20ingin%20membeli%20produk%20{{ urlencode($item->name) }}"
                                    class="btn btn-outline-danger"
                                    target="_blank"
                                >Buy Now</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">Tidak ada produk tersedia</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- end section products -->
@endsection

@push('style')
    {{-- style tambahan jika diperlukan --}}
@endpush

@push('modal')
    {{-- modal jika diperlukan --}}
@endpush

@push('script')
    {{-- script tambahan jika diperlukan --}}
@endpush
