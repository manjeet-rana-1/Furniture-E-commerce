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
    /* input, textarea{
        box-shadow: 2px 4px rgba(5, 5, 5, 0.2);
    } */
     .product_category{
        padding: 5px;
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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Product Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="product_name" value="{{ old('product_name') }}">&nbsp;&nbsp;&nbsp;&nbsp;

        <label>Price:</label>&nbsp;&nbsp;&nbsp;
        <input type="number" step="0.01" name="product_price" value="{{ old('product_price') }}"><br><br>

        <label>Quantity:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="number" name="product_quantity" value="{{ old('product_quantity') }}">&nbsp;&nbsp;&nbsp;&nbsp;

        <label>Product Category:</label>&nbsp;
        <select name="product_category" class="product_category" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
            @endforeach

        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><br>

        <label>Description:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea name="product_description">{{ old('product_description') }}</textarea><br><br>

        <label>Product Image:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="file" name="product_image[]" multiple> <br><br>
        {{-- <img src="{{ asset('storage/' . $cat->product_image) }}" width="100"> --}}

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <button type="submit" class="btn btn-dark">Add Product</button>
        {{-- <a href="{{ route('Product.list') }}"><button class="btn btn-dark">View Products List</button></a> --}}
    </form>
@endsection
