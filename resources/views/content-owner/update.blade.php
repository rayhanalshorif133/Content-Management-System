<div class="modal fade" id="content-owner-update" tabindex="-1" role="dialog" aria-labelledby="content-owner-updateLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="content-owner-updateLabel"> <i class="fas fa-house-user"></i>
                    Update Content Owner
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" action="{{ route('content-owner.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="content_owner_id" id="content_owner_id">
                    <div class="form-group">
                        <label for="image" class="optional">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" required id="updateName" name="name"
                            placeholder="Enter owner name">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
