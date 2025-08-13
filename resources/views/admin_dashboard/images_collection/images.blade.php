@extends('admin_layout.master')
@section('title', 'Add Categoery')
<style>
    .images-form{
        margin-left:400px;
        width: 40%;
        padding: 20px;
        margin-top:120px;
        border: 1px solid #364a63;
        box-shadow: 2px 2px 2px #364a63;
    }
    .image-table{
        width: 70%;
        margin-left:400px;
        margin-top: 50px;
    }
</style>
@section( 'content')
<div class="images-form">
    <H2>Add Images</H2>
    <form action="{{route('store.images')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="images">Add Images</label>
    <input type="file" name="images[]" multiple><br><br>
    <button type="submit" class="btn btn-primary">Add Images</button>
    </form>
</div>

<div class="image-table">
    <h3>All Images</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Images</th>
                <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($images as $image)
                    <tr>
                        <td><img src="{{ asset($image->images) }}" width="100" height="100"></td>
                            <td>
                                <a href="{{ route('delete.image', $image->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
</div>
@endsection
