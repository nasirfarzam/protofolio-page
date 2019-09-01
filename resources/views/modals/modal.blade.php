<div class="modal fade" id="addProject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-left">
                <div class="modal-title font-weight-bold">Add New Project</div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <form method="post" enctype="multipart/form-data" action="{{ route('admin.store') }}" class="form-group">
                @csrf
                    <div class="form-group">
                        <input type="file" class="form-control" accept="image/*" name="image">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Project Name">
                    </div>
                    <div class="form-group">
                        <input type="url" class="form-control" name="link" placeholder="Project Link">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
