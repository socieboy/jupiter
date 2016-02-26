

<a class="btn btn-default btn-hover-danger margin-r-5 pull-right hidden-xs hidden-sm"
   data-toggle="modal"
   data-backdrop="static"
   data-keyboard="false"
   data-target=".jupiter-delete-user-modal-@{{ user.id }}">
    <i class="fa fa-trash"></i>
    Delete
</a>

<form action="/api/user/@{{ user.id }}" v-ajax onSuccess="deleteUserSuccess" onError="deleteUserFail">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <div class="modal fade jupiter-delete-user-modal-@{{ user.id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabelModal-@{{ user.id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="deleteUserLabelModal-@{{ user.id }}">
                        <i class="fa fa-trash"></i> Delete
                    </h4>
                </div>
                <div class="modal-body">
                    <jupiter-errors :errors.sync="errors"></jupiter-errors>
                    <h3 class="text-info text-center">@{{ user.name }}</h3>
                    <p class="text-center">
                        Do you really want to delete this record?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default btn-hover-success pull-right">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

