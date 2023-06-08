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
                                                <button type="button" class="btn btn-success btn-sm viewBtn"
                                                    data-toggle="modal" data-target="#view-category">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm deleteBtn">
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
    <script>
        $(function() {
            $(".viewBtn").click(handleViewBtn);
            $(".deleteBtn").click(handleDeleteBtn);
        });


        function handleViewBtn() {
            const id = $(this).closest('tr').data('id');
            axios.get(`category/fetch-details/${id}`)
                .then(function(response) {
                    var html = "";
                    const data = response.data.data;
                    html += `<h5 class="text-center parent_category_name">Name: ${data.name}</h5>`;
                    html +=
                        `<p class="text-center text-muted">Status: <span class="badge badge-info">${data.status}</span></p>`;
                    html += `<ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                             <b>#sl</b> <b class="float-right">Name</b>
                        </li>
                        `;

                    data.sub_categories.forEach((element, index) => {
                        console.log(element);
                        html += `<li class="list-group-item">
                             <b>${index+1}</b> <p class="float-right">${element.name}</p>
                        </li>`;
                    });
                    html += `</ul>`;
                    $(".box-category").html(html);
                });
        }

        function handleDeleteBtn() {
            const id = $(this).closest('tr').data('id');
            Swal.fire(
                'Data Add Successfully!',
                'You clicked the button!',
                'success'
            )
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`category/delete/parent/${id}`)
                        .then((result) => {
                            Swal.fire(
                                'Deleted!',
                                result.data.message,
                                'success'
                            );
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        })
                }
            })
        }
    </script>
@endpush
