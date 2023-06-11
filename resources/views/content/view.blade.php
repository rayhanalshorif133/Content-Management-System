@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa-solid fa-layer-group"></i>
                        Content Details
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-outline-add btn-tool" data-toggle="modal"
                            data-target="#create-category">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-3 mb-3">
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col mb-3">
                                <b>Content Image:</b> <br>
                                <a href="{{ asset($content->image) }}" data-lightbox="image-1"
                                    data-title="{{ $content->title }}">
                                    <img src="{{ asset($content->image) }}" alt="" class="img-fluid w-50">
                                </a>
                            </div>
                            <div class="col-sm-6 invoice-col mb-3">
                                <b>Banner Image:</b> <br>
                                <a href="{{ asset($content->banner_image) }}" data-lightbox="banner_image-1"
                                    data-title="{{ $content->title }}">
                                    <img src="{{ asset($content->banner_image) }}" alt="" class="img-fluid w-50">
                                </a>
                            </div>
                            <div class="col-sm-6 invoice-col">
                                <h5>
                                    <b>Title: </b>{{ $content->title }}<br>
                                    <small class="float-left w-75">
                                        <b>Short Description:</b> <br>
                                        {{ $content->short_des }}
                                    </small>
                                    <small class="float-left w-75">
                                        <b>Description:</b> <br>
                                        {{ $content->description }}
                                    </small>
                                    <small class="float-left w-75">
                                        <b>Status:</b>
                                        @if ($content->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </small>
                                    <small class="float-left w-75">
                                        <b>Location:</b>
                                        {{ $content->location }}
                                    </small>
                                    <br>
                                </h5>
                            </div>
                            <div class="col-sm-6 invoice-col">
                                <b>Category:</b> {{ $content->category->name }}<br>
                                <b>Content Owner:</b> {{ $content->owner->name }}<br>
                                <b>Content Type:</b> {{ $content->type->name }}<br>
                                <b>Artist Name:</b> {{ $content->artist_name ? $content->artist_name : 'None' }}<br>
                                <b>Price:</b> {{ $content->price ? $content->price : 'None' }}<br>
                                @php
                                    $insert_date = date_create($content->insert_date);
                                    $update_date = date_create($content->update_date);
                                @endphp
                                <b>Created Date:</b> {{ date_format($insert_date, 'd-M-Y h:m:s A') }}<br>
                                <b>Update Date:</b> {{ date_format($update_date, 'd-M-Y h:m:s A') }}<br>
                                <b>Created By:</b> {{ $content->created_by }}<br>
                            </div>
                            <div class="col-sm-6 invoice-col mt-4">
                                <b>Uploaded File:</b> <br>
                                @php
                                    $getExt = explode('.', $content->file_name);
                                    $ext = end($getExt);
                                @endphp

                                @if ($ext == 'mp4')
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset($content->file_name) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @elseif($ext == 'mp3')
                                    <audio controls>
                                        <source src="{{ asset($content->file_name) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                @elseif($ext == 'pdf')
                                    <iframe src="{{ asset($content->file_name) }}" width="100%" height="500px"></iframe>
                                @elseif($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif')
                                    <a href="{{ asset($content->file_name) }}" data-lightbox="file-1"
                                        data-title="{{ $content->title }}">
                                        <img src="{{ asset($content->file_name) }}" alt="" class="img-fluid w-50">
                                    </a>
                                @else
                                    Not Uploaded or Unsupported
                                @endif
                            </div>
                            <div class="col-sm-6 invoice-col"></div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
