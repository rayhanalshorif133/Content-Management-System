@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-solid fa-code-compare"></i>
                            Content Type List
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-outline-add btn-tool" data-toggle="modal"
                                data-target="#create-content-type">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#sl</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contentTypes as $key => $contentType)
                                    <tr data-id={{ $contentType->id }}>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $contentType->name }}</td>
                                        <td>{{ $contentType->description }}</td>
                                        <td>
                                            <span
                                                class="badge @if ($contentType->status == 'active') badge-success @else badge-danger @endif">
                                                {{ $contentType->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" data-id={{ $contentType->id }}>
                                                <button type="button" class="btn btn-info btn-sm contentTypeUpdateBtn"
                                                    data-toggle="modal" data-target="#update-content-type">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm contentTypeDeleteBtn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('content-type.createAndUpdate')
@endsection
