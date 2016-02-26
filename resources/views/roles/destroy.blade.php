<form action="/api/role/@{{ role.id }}" v-ajax:confirm onSuccess="deleteRoleSuccess" onError="deleteRoleFail">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-default btn-hover-danger margin-r-5 pull-right hidden-xs hidden-sm">
        <i class="fa fa-trash"></i> Delete
    </button>
</form>