@extends('admin_layout.master')
@section('title', 'Add Categoery')
@section( 'content')
    <div class="container add-category" style="margin-left:200px; margin-top:90px ">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-10">
                <h2>Add Category</h2>

                @if($errors->any())
                @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
                @endforeach
                @endif

                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name">Category</label>
                <input type="text" name="category_name" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="image">Image</label>
                <input type="file" name="image" required> <br><br>

                <button type="submit" class="btn btn-dark">Add Category</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('category.list') }}"><button class="btn btn-dark">View Category List</button></a>
            </form>
            </div>
        </div>
    </div>
    @endsection
{{-- </body>
</html> --}}
