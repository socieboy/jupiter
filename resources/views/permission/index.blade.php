<a class="btn btn-default btn-hover-warning margin-r-5 pull-right"
   data-toggle="modal"
   data-backdrop="static"
   data-keyboard="false"
   data-target=".jupiter-role-permissions-modal-@{{ role.id }}">
   <i class="fa fa-cube"></i> Permissions
</a>

<jupiter-update-role-permissions :role="role" :permissions="permissions" inline-template>

    <form method="POST" action="/api/role/@{{ role.id }}/permissions" v-ajax onSuccess="updatedPermissionsSuccess" onError="updatedPermissionsFail">
        {{ csrf_field() }}
        <div class="modal fade jupiter-role-permissions-modal-@{{ role.id }}" tabindex="-1" role="dialog" aria-labelledby="rolePermissionsLabelModal@{{ role.id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="rolePermissionsLabelModal@{{ role.id }}">
                            <i class="fa fa-gears"></i> @{{ role.label }}
                        </h4>
                    </div>

                    <div class="modal-body">

                        <div class="row permissions">
                            <jupiter-errors :errors.sync="errors"></jupiter-errors>
                            <div class="col-xs-6 col-sm-4 col-md-3" v-for="permission in permissions">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="permissions[]" :checked="roleIsAssignedTo(permission)" value="@{{ permission.id }}">
                                        @{{ permission.label }}
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" :disabled="! unlessOnePermissionCheked" class="btn btn-default btn-hover-success pull-right">
                            Save
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>

</jupiter-update-role-permissions>
