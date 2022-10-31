@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Add Product
                    <a href="{{ url('admin/products') }}" class="btn btn-danger float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="aler alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade p-3  show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label>Product Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label>Product Slug</label>
                                        <input type="text" name="slug" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                </div>
                                
                                {{-- <div class="mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="mb-3">
                                    <label>Brand</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Weigh</label>
                                    <textarea name="small_description" class="form-control" rows="2"></textarea>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Upload Product Image</label>
                                        <input type="file" name="image[]" multiple class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" style="width: 33px; height: 33px">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" style="width: 33px; height: 33px">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="tab-pane fade p-3" id="image" role="tabpanel" aria-labelledby="image-tab">
                            <div class="mb-3">
                                <label>Upload Product Image</label>
                                <input type="file" name="image[]" class="form-control">
                            </div>
                            
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
