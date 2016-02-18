<a class="btn btn-default btn-hover-warning pull-right margin-r-5"
   data-toggle="modal"
   data-backdrop="static"
   data-keyboard="false"
   data-target=".jupiter-user-roles-modal-@{{ user.id }}">
    <i class="fa fa-cubes"></i> Roles
</a>

<jupiter-update-user-roles :user="user" :roles="roles" inline-template>

    <form method="POST" action="/api/user/@{{ user.id }}/roles" v-ajax onSuccess="updatedRolesSuccess" onError="updatedRolesFail">
        {{ csrf_field() }}
        <div class="modal fade jupiter-user-roles-modal-@{{ user.id }}" tabindex="-1" role="dialog" aria-labelledby="roleRolesModal@{{ user.id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4>
                            <i class="fa fa-cubes"></i> @{{ user.name }}
                        </h4>
                    </div>

                    <div class="modal-body">

                        <div class="row permissions">

                            <div class="col-md-12">
                                <h4 class="text-muted">Select roles from the list below:</h4>
                                <jupiter-errors :errors.sync="errors"></jupiter-errors>
                            </div>

                            <div class="col-xs-6 col-sm-4" v-for="role in roles">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="roles[]" :checked="userIsAssignedTo(role)" value="@{{ role.id }}">
                                        @{{ role.label }}
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" :disabled="! unlessOneRoleCheked" class="btn btn-default btn-hover-success pull-right">
                            Save
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>

</jupiter-update-user-roles>
