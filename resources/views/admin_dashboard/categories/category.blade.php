
@extends('admin_layout.master')

@section('title', 'Add Category')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .form-container {
        margin: 20px auto;
        max-width: 800px;
        /* background-color: #93a1b3; */
        padding: 25px;
        border-radius: 8px;
        margin-left:400px;
        margin-top:60px;
    }

    #category_name, #name, #price, #description{
        height:35px;
        width:750px;
    }

    .form-container h3 {
        color: #203247;
        margin-bottom: 5px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #6e6a6a;
        border-radius: 4px;
    }

    .submit-btn {
        background-color: #203247;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    .message {
        margin-top: 15px;
    }

    .message.success {
        color: green;
    }

    .message.error {
        color: red;
    }


    table {
    width: 100%;
    border: 1px solid #333;
    border-collapse: collapse;
    margin-top: 20px;
    text-align:center;
}

th .submit-btn{
    border: 1px solid #333;
    padding: 10px;
    text-align: left;
    vertical-align: top;
}
td{
    border: 1px solid #333;
    padding: 10px;
    text-align: left;
    vertical-align: top;
}

th {
    background-color: #203247;
    color: white;
}

td img {
    display: block;
    max-width: 100px;
    height: auto;
}
</style>

<div class="form-container">
    <h3>Add New Category</h3>

    <form action="{{ url('add_category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_name">Product Name</label><br>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="category_name">Category Name</label><br>
            <input type="text" id="category_name" name="category" required>
        </div>
        {{-- <div class="form-group">
            <label for="category_name">Price</label><br>
            <input type="text" id="price" name="price" required>
        </div> --}}

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" required>
        </div>

        {{-- <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>
        </div> --}}

        <button type="submit" class="submit-btn">Add Category</button>
    </form>

    <div class="message">
        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <ul class="error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
