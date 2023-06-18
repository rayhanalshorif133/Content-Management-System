@extends('layouts.app')

@section('style')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center px-3">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa-solid fa-layer-group"></i>
                        Content List
                    </h3>
                    <div class="card-tools d-flex">
                        <a href="{{ route('content.create') }}" class="btn btn-outline-add btn-sm">
                            <i class="fas fa-plus"></i> Add
                        </a>
                        <div class="input-group-prepend d-none">
                            <button type="button" class="btn btn-outline-add dropdown-toggle btn-sm" data-toggle="dropdown"
                                aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu text-dark" style="">
                                <li class="dropdown-item">
                                    {{-- Delete --}}
                                    <span class="cursor-pointer"><i class="fa fa-trash"></i> Delete</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-3">
                    <table class="table content_table w-100">
                        <thead>
                            <tr>
                                <th>#sl</th>
                                <th>Title</th>
                                <th>Short <br> Description</th>
                                <th>Owner Name</th>
                                <th>Category Name</th>
                                <th>Price</th>
                                <th>Location</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            var table = $('.content_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('content.index') }}",
                columns: [{
                        render: function(data, type, row) {
                            return row.DT_RowIndex;
                        },
                        targets: 0,
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'short_des',
                        name: 'short_des'
                    },
                    {
                        data: 'owner.name',
                        name: 'owner.name'
                    },
                    {
                        data: 'category.name',
                        name: 'category.name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        render: function(data, type, row) {
                            let location = row.location ? row.location : 'Not Set';
                            return location;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            let insert_date = row.insert_date ? row.insert_date :
                                'Not Set';
                            return insert_date;
                        },
                        targets: 0,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
