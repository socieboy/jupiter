<!-- Create Role Modal -->
<button type="button"
        class="btn btn-primary pull-right"
        data-toggle="modal"
        data-backdrop="static"
        data-keyboard="false"
        data-target=".create-role-modal">
    <i class="fa fa-plus-circle"></i>
    Add Role
</button>

<jupiter-create-role inline-template>
    <form method="POST" action="{{ url('/api/role') }}" v-ajax onSuccess="createRoleSuccess" onError="createRoleFail">
        {{ csrf_field() }}
        <div class="modal fade create-role-modal" tabindex="-1" role="dialog" aria-labelledby="createRoleLabelModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="createRoleLabelModal">
                            <i class="fa fa-lock"></i>
                            Create a new role
                        </h4>
                    </div>
                    <div class="modal-body">
                        <jupiter-errors :errors.sync="errors"></jupiter-errors>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="label">Label</label>
                            <input id="label" type="text" class="form-control" name="label">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-default btn-hover-success pull-right">
                            Save
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</jupiter-create-role>