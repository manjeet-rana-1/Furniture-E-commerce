{{-- @extends('admin_dashboard.products_list.products_layout.master') --}}
@extends('admin_layout.master')
<style>
    .add-button{
        margin-left:1000px;
    }
    .table-body{
        width:50%;
        margin-left:300px;
    }
    .page-title{
        margin-left: 380px;
    }
</style>
@section('content')
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content mt-5">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Products</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-search"></em>
                                                                </div>
                                                                <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Status</a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>New Items</span></a></li>
                                                                        <li><a href="#"><span>Featured</span></a></li>
                                                                        <li><a href="#"><span>Out of Stock</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt">
                                                            <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                            {{-- <a href="" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Product</span></a> --}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                    <a href="{{route('add.products')}}" class="btn btn-primary add-button">Add Products</a>
                                </div>
                                </div>
                                </div>

                                <div class="container table-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-9">
                                            <table class="table mt-4">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">ID</th>
                                                    {{-- <th scope="col">Category ID</th> --}}
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    {{-- <th scope="col">Description</th> --}}
                                                    {{-- <th scope="col">Product Quantity</th> --}}
                                                    <th scope="col">Image</th>
                                                    {{-- <th scope="col">Slug</th> --}}
                                                    <th scope="col">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($AddProduct as $item)
                                                    <tr>
                                                        <th scope="row">{{ $item->id }}</th>
                                                        <td>{{ $item->category->category_name ?? '' }}</td>
                                                        <td>{{ $item->product_name }}</td>
                                                        <td>{{ $item->product_price }}</td>
                                                        {{-- <td>{{ $item->product_description }}</td> --}}
                                                        <td>
                                                            <img src="{{ asset('storage/' . $item->product_image) }}" alt="Image" width="80">
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('/delete-product/' . $item->id) }}" class="btn btn-danger">Delete</a>
                                                            <a href="{{ url('edit-product/' . $item->id) }}" class="btn btn-warning">Update</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                              </table>
                                         </div>
                                    {{-- </div> --}}
                                </div>
@endsection
