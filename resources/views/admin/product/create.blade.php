@extends('admin.layouts.master')

@section('content')

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-product-hunt"></i>
        </div>
        <div class="header-title">
            <h1>Add Product</h1>
            <small>Product list</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    @include('messages.success.success')
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="clist.html">
                                <i class="fa fa-list"></i> Product List </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="col-sm-6" action="{{ url('product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" id="product_name" value="{{ old('product_name') ?? old('product_name') }}">
                            </div>
                            @include('messages.error.product.name')
                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" class="form-control" placeholder="Enter Product Code" name="product_code" id="product_code" value="{{ old('product_code') ?? old('product_code') }}">
                            </div>
                            @include('messages.error.product.code')
                            <div class="form-group">
                                <label for="product_color">Product Color</label>
                                <input type="text" class="form-control" placeholder="Enter Product Color" name="product_color" id="product_color" value="{{ old('product_color') }}">
                            </div>
                            @include('messages.error.product.color')
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                <textarea name="product_description" id="product_description" class="form-control" cols="30" rows="10">{{ old('product_description') ?? old('product_description') }}</textarea>
                            </div>
                            @include('messages.error.product.description')
                            <div class="form-group">
                                <label for="product_price">Product Price</label>
                                <input type="text" class="form-control" placeholder="Enter Product Price" id="product_price" name="product_price" value="{{ old('product_price') ?? old('product_price') }}">
                            </div>
                            @include('messages.error.product.price')
                            <div class="form-group">
                                <label for="product_image">Picture upload</label>
                                <input type="file" name="product_image" id="product_image">
                            </div>
                            @include('messages.error.product.image')
                            <div class="reset-button">
                                {{-- <a href="#" class="btn btn-success">Save</a> --}}
                                <input type="submit" class="btn btn-success" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection