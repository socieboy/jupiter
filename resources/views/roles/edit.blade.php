<!-- Create Role Modal -->
<button type="button"
        class="btn btn-default btn-hover-primary pull-right hidden-xs hidden-sm"
        data-toggle="modal"
        data-backdrop="static"
        data-keyboard="false"
        data-target=".jupiter-update-role-modal-@{{ role.id }}">
    <i class="fa fa-pencil"></i>
    Update
</button>

<jupiter-update-role :role="role" inline-template>
    <form method="POST" action="/api/role/@{{ role.id }}" v-ajax onSuccess="updateRoleSuccess" onError="updateRoleFail">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="modal fade jupiter-update-role-modal-@{{ role.id }}" tabindex="-1" role="dialog" aria-labelledby="updateRoleModal@{{ role.id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4>
                            <i class="fa fa-pencil"></i>
                            Update @{{ role.label }}
                        </h4>
                    </div>
                    <div class="modal-body">
                        <jupiter-errors :errors.sync="errors"></jupiter-errors>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="@{{ role.name }}">
                        </div>
                        <div class="form-group">
                            <label for="label">Label</label>
                            <input id="label" type="text" class="form-control" name="label" value="@{{ role.label }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-default btn-hover-success pull-right">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</jupiter-update-role>