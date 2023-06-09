<div class="modal fade" id="create-content-type" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Create Content Type
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('content-type.create') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" name="name"
                            placeholder="Enter Content type's name">
                    </div>
                    <div class="form-group">
                        <label for="name" class="optional">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Content type's description"></textarea>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default closeModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="update-content-type" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Update Content Type
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('content-type.update') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="number" class="d-none" name="content_type_id" id="content_type_id" value="">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" name="name"
                            placeholder="Enter Content type's name" id="update_content_type_name">
                    </div>
                    <div class="form-group">
                        <label for="name" class="optional">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Content type's description"
                            id="update_content_type_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name" class="optional">Status</label>
                        <select class="form-control" name="status" id="update_content_type_status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default closeModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
