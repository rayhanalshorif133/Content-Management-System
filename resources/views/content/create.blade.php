@extends('layouts.app')

@section('content')
    <div class="row justify-content-center px-3">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa-solid fa-layer-group"></i>
                        Content List
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('content.index') }}" class="btn btn-outline-back btn-tool backBtnContentList">
                            <i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i> Back
                        </a>
                    </div>
                </div>
                <form action="{{ route('content.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category_id" class="required">Select a Category</label>
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        <option value="" selected disabled>Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="owner_id" class="required">Select a Owner</label>
                                    <select class="form-control" name="owner_id" id="owner_id" required>
                                        <option value="" selected disabled>Select a Owner</option>
                                        @foreach ($owners as $owner)
                                            <option value="{{ $owner->id }}">{{ $owner->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{-- contentTypes --}}
                                    <label for="content_type_id" class="required">Select a Content Type</label>
                                    <select class="form-control" name="content_type_id" id="content_type_id" required>
                                        <option value="" selected disabled>Select a Content Type</option>
                                        @foreach ($contentTypes as $contentType)
                                            <option value="{{ $contentType->id }}">{{ $contentType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="title" class="required">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required
                                    placeholder="Enter a title">
                            </div>
                            <div class="col-md-4">
                                <label for="short_des" class="required">Short Description</label>
                                <textarea name="short_des" id="short_des" class="form-control" placeholder="Enter a short description" required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="image" class="required">Image</label>
                                <input type="file" name="image" required id="image" class="form-control">
                                <small class="text-muted"><span class="required">Image size</span> must be 1200x675</small>
                            </div>
                            <div class="col-md-4">
                                <label for="banner_image" class="required">Banner Image</label>
                                <input type="file" name="banner_image" required id="banner_image" class="form-control">
                                <small class="text-muted"><span class="required">Image size</span> must be 1200x675</small>
                            </div>
                            <div class="col-md-4">
                                {{-- description --}}
                                <label for="description" class="required">Description</label>
                                <textarea name="description" id="description" class="form-control" required placeholder="Enter a description"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="artist_name" class="optional">Artist Name</label>
                                <input type="text" name="artist_name" id="artist_name" class="form-control"
                                    placeholder="Enter a artist name">
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="required">Price</label>
                                <input type="number" name="price" id="price" class="form-control" required
                                    placeholder="Enter price">
                            </div>
                            <div class="col-md-4">
                                <label for="file_name" class="required">Content File</label>
                                <input type="file" name="file_name" id="file_name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="location" class="optional">Location</label>
                                <input type="text" name="location" id="location" class="form-control"
                                    placeholder="Enter a location">
                            </div>
                            <div class="col-md-4">
                                <label for="status" class="optional">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer py-2">
                        <button type="submit" class="btn btn-outline-info float-left">Submit</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
