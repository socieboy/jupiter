<a class="btn btn-default btn-hover-primary pull-right margin-r-5"
   data-toggle="modal"
   data-backdrop="static"
   data-keyboard="false"
   data-target=".jupiter-update-user-modal-@{{ user.id }}">
    <i class="fa fa-pencil"></i>
    Update
</a>

<jupiter-update-user :user="user" inline-template>
    <form action="/api/user" method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateUser">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="modal fade jupiter-update-user-modal-@{{ user.id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4>
                            <img :src="user.avatar" class="avatar avatar-on-header" alt="@{{ user.name }}"> @{{ user.name }}
                        </h4>
                    </div>
                    <div class="modal-body">
                        <jupiter-errors :errors.sync="errors"></jupiter-errors>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" v-model="user.name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" v-model="user.email" class="form-control" name="email">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
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
</jupiter-update-user>