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
     .categories{
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

        <label>Product Name:</label>
        <input type="text" name="product_name" value="{{ old('product_name') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <label>Price:</label>
        <input type="number" step="0.01" name="product_price" value="{{ old('product_price') }}"><br><br>

        <label>Quantity:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="number" name="product_quantity" value="{{ old('product_quantity') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <label>Product Category:</label>
        <select name="product_category" class="categories" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
            @endforeach
        </select><br><br>

        <label>Description:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea name="product_description">{{ old('product_description') }}</textarea> <br><br>

        <label>Product Image:</label>
        <input type="file" name="product_image[]" multiple><br><br>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endsection
