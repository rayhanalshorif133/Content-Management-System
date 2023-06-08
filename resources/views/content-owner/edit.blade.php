@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-house-user"></i>
                            Update Content Owner
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('content-owner.index') }}" class="btn btn-outline-back btn-tool">
                                <i class="fa-solid fa-angles-left fa-fade"></i> Back
                            </a>
                        </div>
                    </div>
                    <form class="form" action="{{ route('content-owner.update', $contentOwner->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image" class="optional">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="required">Name</label>
                                <input type="text" class="form-control" required id="name" name="name"
                                    placeholder="Enter owner name" value="{{ $contentOwner->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="required">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email address" value="{{ $contentOwner->email }}">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="required">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter phone number" value="{{ $contentOwner->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="address" class="required">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter address number" value="{{ $contentOwner->address }}">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
