<div class="d-flex justify-content-between">
    <div>
        &nbsp;{{ isset($result) ? $result : '-' }}
    </div>
    <div>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
            Resiko
        </button>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Risk Matrix</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="Form" method="POST" action="{{ route('workorder.resiko') }}">
                        @csrf
                        <div class="form-group">
                            <label for="frequency">Frequency</label>
                            <input type="text" class="form-control" id="frequency" name="frequency">
                        </div>
                
                        <div class="form-group">
                            <label for="consequency">Consequency</label>
                            <input type="text" class="form-control" id="consequency" name="consequency">
                        </div>
                
                        <button type="submit" data-dismiss="modal" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>