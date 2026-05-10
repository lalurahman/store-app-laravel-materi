@extends('layouts.public')

@section('title', 'Products')

@section('content')
    <!-- section products -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold text-danger">Our Best Sellers</h2>
            <div class="row mt-4 justify-content-center">
                <div class="col-md-3">
                    <div
                        class="card"
                        style="width: 18rem;"
                    >
                        <img
                            src="{{ asset('image/baju.jpg') }}"
                            class="card-img-top"
                            alt="Baju Kaos Hitam Polos"
                        >
                        <div class="card-body">
                            <h5 class="card-title">Baju Kaos Hitam Polos</h5>
                            <p class="text-muted mb-1">Baju</p>
                            <p class="fw-bold text-success">Rp 100.000</p>
                            <a
                                href="#"
                                class="btn btn-outline-danger"
                            >Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div
                        class="card"
                        style="width: 18rem;"
                    >
                        <img
                            src="{{ asset('image/celana.jpg') }}"
                            class="card-img-top"
                            alt="Celana Jeans Biru"
                        >
                        <div class="card-body">
                            <h5 class="card-title">Celana Jeans Biru</h5>
                            <p class="text-muted mb-1">Celana</p>
                            <p class="fw-bold text-success">Rp 150.000</p>
                            <a
                                href="#"
                                class="btn btn-outline-danger"
                            >Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div
                        class="card"
                        style="width: 18rem;"
                    >
                        <img
                            src="{{ asset('image/sepatu.jpg') }}"
                            class="card-img-top"
                            alt="Sepatu Sneakers Putih"
                        >
                        <div class="card-body">
                            <h5 class="card-title">Sepatu Sneakers Putih</h5>
                            <p class="text-muted mb-1">Sepatu</p>
                            <p class="fw-bold text-success">Rp 200.000</p>
                            <a
                                href="#"
                                class="btn btn-outline-danger"
                            >Buy Now</a>
                        </div>
                    </div>
                </div>
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
