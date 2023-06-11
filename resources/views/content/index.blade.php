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
                        <tbody></tbody>
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

            });
        });
    </script>
@endpush
