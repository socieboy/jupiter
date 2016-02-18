<a class="btn btn-default pull-right margin-r-5"
   data-toggle="modal"
   data-backdrop="static"
   data-keyboard="false"
   data-target=".jupiter-create-user-modal">
    <i class="fa fa-user-plus"></i>
    Add User
</a>

<jupiter-create-user inline-template>
    <form action="/api/user" method="POST" enctype="multipart/form-data" v-on:submit.prevent="createUser">
        {{ csrf_field() }}
        <div class="modal fade jupiter-create-user-modal" tabindex="-1" role="dialog" aria-labelledby="createUserModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4>
                            <i class="fa fa-user-plus"></i> Create User
                        </h4>
                    </div>
                    <div class="modal-body">
                        <jupiter-errors :errors.sync="errors"></jupiter-errors>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email">
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" v-model="generatePassword" name="generate_password" value="true">
                                    Generate password and send by email.
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" v-if="! generatePassword">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group" v-if="! generatePassword">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input id="avatar" type="file" name="avatar">
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
</jupiter-create-user>