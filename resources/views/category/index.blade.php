@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Category List
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-outline-add btn-tool" data-toggle="modal"
                                data-target="#create-category">
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
                                    <th>Sub Category</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr data-id={{ $category->id }}>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->subCategories->count() }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $category->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm categoryViewBtn"
                                                    data-toggle="modal" data-target="#view-category">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm categoryDeleteBtn">
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

    @include('category.view')
    @include('category.create')
@endsection

@push('js')
@endpush
