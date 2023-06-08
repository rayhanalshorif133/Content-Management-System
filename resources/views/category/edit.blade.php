@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Category Edit
                        </h3>
                    </div>
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" class="form-control" name="name"
                                    value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea id="inputDescription" class="form-control" name="description" rows="4">{{ $category->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control custom-select" name="status">
                                    @if ($category->status == 'active')
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                    @else
                                        <option value="active">Active</option>
                                        <option value="inactive" selected>Inactive</option>
                                    @endif
                                </select>
                            </div>
                            {{-- h4 --}}
                            <h5>
                                <b>Sub Categories</b>
                            </h5>
                            <hr />
                            @foreach ($category->subCategories as $key => $subCategory)
                                <div class="form-group">
                                    <label for="subCategoryName">Sub Category {{ $key + 1 }}
                                        <button type="button"
                                            class="btn btn-outline-danger btn-sm float-right ml-3 deleteItemBtn"
                                            data-sub_cat_id={{ $subCategory->id }}><i class="fas fa-trash"></i></button>
                                    </label>
                                    <input type="text" name="subCatIdAndNames[{{ $subCategory->id }}]"
                                        class="form-control" value="{{ $subCategory->name }}">
                                </div>
                            @endforeach
                            <button type="button" class="btn btn-outline-info btn-sm float-right mb-3 createNewSubCat"
                                data-toggle="modal" data-target="#create-sub-category">
                                <i class="fas fa-plus"></i> New Sub Category</button>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('category.index') }}" class="btn btn-outline-danger btn-sm float-left">Back
                            </a>
                            {{-- update --}}
                            <button type="submit" class="btn btn-outline-success btn-sm float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('category.addNewSubCategory', ['category' => $category])
@endsection

@push('js')
@endpush
