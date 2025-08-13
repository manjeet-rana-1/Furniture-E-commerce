@foreach($AddProduct as $product)
    <div>
        <h3>{{ $product->product_name }}</h3>
        <p>Price: ₹{{ $product->product_price }}</p>
        <p>Category: {{ $product->product_category }}</p>
        <p>Description: {{ $product->product_description }}</p>
        <img src="{{ asset('storage/' . $product->product_image) }}" width="100">
    </div>
@endforeach
