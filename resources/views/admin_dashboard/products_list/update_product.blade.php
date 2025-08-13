@extends('admin_layout.master')
@section('title', 'Add Products')
<style>
    .container{
    }
    form{
        margin-left: 350px;
        margin-top: 50px;
    }
    .add-product-title{
        margin-left: 350px;
        margin-top: 100px;
    }
    .add-product-sessions{
        margin-left: 350px;
    }

</style>
@section('content')
    <h2 class="add-product-title">Add Product</h2>

    <div class="add-product-sessions">
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

    <form action="{{ route('product.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Product Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="product_name" value="{{ $product->product_name }}">&nbsp;&nbsp;&nbsp;&nbsp;

        <label>Price:</label>&nbsp;&nbsp;&nbsp;
        <input type="number" step="0.01" name="product_price" value="{{ $product->product_price }}"><br><br>

        <label>Quantity:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="number" name="product_quantity" value="{{ $product->product_quantity }}">&nbsp;&nbsp;&nbsp;&nbsp;

        <label>Product Category:</label>&nbsp;
        <select name="product_category" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}"{{ $cat->id == $product->product_category ? 'selected' : '' }}>{{ $cat->category_name }}</option>
            @endforeach

        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><br>

        <label>Description:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea name="product_description">{{ old('product_description', $product->product_description) }}</textarea><br><br>

        <label>Product Image:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="file" name="product_image"><br><br>
        @if($product->product_image)
        {{-- <img src="{{ asset($product->product_image )}}" alt="Product Image" width="100"><br><br> --}}
        <img src="{{ asset('storage/' . $product->product_image) }}" alt="Image" width="80">

    @endif
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <button type="submit" class="btn btn-dark">Update Product</button>
    </form>
@endsection
