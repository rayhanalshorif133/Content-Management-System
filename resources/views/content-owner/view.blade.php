@extends('layouts.app')

@section('style')
    <style>
        .conent-owner-img {
            border: 1px solid #adb5bd;
            margin: 0 auto;
            padding: 2px;
            width: 50%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users"></i>
                            Content Owner Details
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('content-owner.index') }}" class="btn btn-outline-back btn-tool">
                                <i class="fa-solid fa-angles-left fa-fade"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="conent-owner-img img-fluid" src="{{ asset($contentOwner->image) }}"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">Name: {{ $contentOwner->name }}</h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <span class="float-right">{{ $contentOwner->email }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <span class="float-right">{{ $contentOwner->phone }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Address</b> <span class="float-right">{{ $contentOwner->address }}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
