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
                            <a href="{{ route('content-owner.create') }}" class="btn btn-outline-add btn-tool">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contentOwners as $key => $contentOwner)
                                    <tr data-id={{ $contentOwner->id }}>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $contentOwner->name }}</td>
                                        <td>{{ $contentOwner->email }}</td>
                                        <td>{{ $contentOwner->address }}</td>
                                        <td>{{ $contentOwner->phone }}</td>
                                        <td>
                                            <div class="btn-group" data-id={{ $contentOwner->id }}>
                                                <a href="{{ route('content-owner.view', $contentOwner->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('content-owner.edit', $contentOwner->id) }}"
                                                    class="btn btn-info btn-sm">
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
@endsection
