@extends('admin_layout.master')
@section('title', 'Add Categoery')

@section( 'content')

    <div class="container category-table" style="margin-left:400px; margin-top:100px; width:70%">
      <h2>All Categories</h2>
        @if(session('success'))
        <p style="color: green">{{session('success')}}</p>
            @endif

            <a href="{{ route('category.create') }}"><button class="btn btn-primary mt-3 mb-3">Add New Category</button></a>
            <table class="table">
                    <thead>
                     <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td><img src="{{ asset($category->image) }}" alt="" width="80"></td>
                        <td>
                           <a href="{{ url('/update/category/' . $category->id) }}"><button class="btn btn-warning">Update</button></a>
                           <a href="{{ url('/delete/category/' . $category->id) }}" method="POST" class="from-table" enctype="multipart/form-data"><button class="btn btn-danger">Delete</button></a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            </div>
        </div>
    </div>
    @endsection
