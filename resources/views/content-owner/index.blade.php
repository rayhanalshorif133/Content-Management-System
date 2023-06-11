@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users"></i>
                            Content Owners List
                        </h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-outline-add btn-tool" data-toggle="modal"
                                data-target="#content-owner-create">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contentOwners as $key => $contentOwner)
                                    <tr data-id={{ $contentOwner->id }}>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <a href="{{ asset($contentOwner->image) }}" data-lightbox="image-1"
                                                data-title="{{ $contentOwner->name }}">
                                                <img src="{{ asset($contentOwner->image) }}" alt="{{ $contentOwner->name }}"
                                                    width="50px" height="50px">
                                            </a>
                                        </td>
                                        <td class="content_owner_name">{{ $contentOwner->name }}</td>
                                        <td>
                                            <div class="btn-group" data-id={{ $contentOwner->id }}>
                                                <a href="#" class="btn btn-info btn-sm contentOwnerUpdateBtn"
                                                    data-toggle="modal" data-target="#content-owner-update">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm contentOwnerDeleteBtn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    @include('content-owner.create')
    @include('content-owner.update')
@endsection
