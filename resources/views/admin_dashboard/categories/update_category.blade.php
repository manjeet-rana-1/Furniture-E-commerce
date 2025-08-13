@extends('admin_layout.master')

@section('title', 'Update Product')
<style>
    .from-table{
        margin-left:200px;
        margin-top:80px;
    }
</style>
@section('content')
<div class="container mt-2">
    @if(isset($category))
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="from-table">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control">
        </div>

            <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset($category->image) }}" alt="Category Image" width="100" height="100"/>
        </div>

        <button type="submit" class="btn btn-dark mt-1">Update</button>
    </form>
    @else
    <p style="color: red;">Category not found.</p>
@endif
</div>
@endsection
