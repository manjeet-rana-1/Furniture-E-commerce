@extends('user_layout.master')
@section('title', 'contact')
<style>
    .product-card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #fff;
}

.product-card img {
    height: 250px;
    object-fit: cover;
    padding-top:20px;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}

.product-card .card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 20px;
}

.product-card .price {
    font-size: 1rem;
    color: #ff4b2b;
    font-weight: bold;
}

.btn-primary {
    background-color: #ff4b2b;
    border: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #e84323;
}

</style>
@section('content')
            <div class="product-section py-5" style="background-color: #f8f9fa;">
                <div class="container">
                    <div class="row g-4">
                        @foreach ($products as $item)
                            <div class="col-md-6 col-lg-3">
                                <div class="card product-card h-100 shadow-sm">
                                    @if ($item->product_image)
                                        <img src="{{ asset('storage/' . $item->product_image) }}"
                                             class="card-img-top img-fluid"
                                             alt="{{ $item->product_name }}">
                                    @endif
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $item->product_name }}</h5>
                                        <p>{{$item->product_description}}</p>
                                        {{-- <p>Quantity: {{$item->product_quantity}}</p> --}}
                                        <p class="price mb-3">${{ number_format($item->product_price, 2) }}</p>
                                        <form action="{{ route('cart.add', $item->id) }}" method="POST" class="mt-2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                                        </form>



                                        {{-- <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit">Add to Cart</button>
                                        </form> --}}






                                        {{-- <a href="{{ route('explore.products') }}" class="btn btn-primary w-100">Explore</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


@endsection
