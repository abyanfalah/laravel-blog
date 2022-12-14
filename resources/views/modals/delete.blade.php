<div class="modal fade" id="deleteItemModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white fw-bold">
                Delete post
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">No</button>
                <form action="" method="post">
                    @method("delete")
                    @csrf
                    <button class="btn btn-outline-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
