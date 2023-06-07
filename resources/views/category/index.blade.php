@extends('layouts.app')

@section('style')
    <style>
        .expandable-body>td {
            padding: 0 10px !important;
            width: auto;
        }

        .expandable-body>td>div,
        .expandable-body>td>p {
            padding: 0.25rem 0.5rem !important;
        }

        /* after a line */
        .expandable-body>td>div:not(:last-child)::after,
        .expandable-body>td>p:not(:last-child)::after {
            content: "";
            display: block;
            width: 100%;
            height: 1px;
            background-color: #dee2e6;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Category List
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#create-category">
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
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $category->status }}
                                            </span>
                                        </td>
                                        <td>
                                            Actions
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td>
                                            <p style="display: none;">
                                                sdc
                                            </p>
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

    @include('category.create')
@endsection
