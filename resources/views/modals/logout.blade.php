<div class="modal fade" id="logoutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <strong>
                    Logout
                </strong>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline-danger">
                        Proceed
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



