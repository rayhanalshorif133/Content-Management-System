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
                        <a href="{{ route('content.create') }}" class="btn btn-outline-add btn-tool">
                            <i class="fas fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id="contentTableId">
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
                        <tbody>
                            @foreach ($contents as $content)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $content->title }}</td>
                                    <td>
                                        @php
                                            $short_des = substr($content->short_des, 0, 50);
                                        @endphp
                                        {{ $short_des }}</td>
                                    <td>{{ $content->owner->name }}</td>
                                    <td>{{ $content->category->name }}</td>
                                    <td>{{ $content->price }}</td>
                                    <td>{{ $content->location ? $content->location : 'None' }} </td>
                                    <td>
                                        @php
                                            $date = date_create($content->insert_date);
                                        @endphp
                                        {{ date_format($date, 'd-M-Y h:m:s A') }}
                                    </td>
                                    <td>
                                        <div class="btn-group" data-id={{ $content->id }}>
                                            <a href="{{ route('content.view', $content->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('content.edit', $content->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm contentDeleteBtn">
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
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("#contentTableId").DataTable({
                "responsive": true,
                "autoWidth": false,
                ajax: "{{ route('content.fetchData') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
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
                        data: 'owner_name',
                        name: 'owner_name'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'insert_date',
                        name: 'insert_date'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                "order": [
                    [0, 'asc']
                ]
            });
        });
    </script>
@endpush
