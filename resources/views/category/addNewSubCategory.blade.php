<div class="modal fade" id="create-sub-category" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Create Sub Category
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.category.create.sub-category') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="parent_id" value="{{ $category->id }}">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter category name">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
