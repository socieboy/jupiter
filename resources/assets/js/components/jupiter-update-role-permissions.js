Vue.component('jupiter-update-role-permissions', {

    props: ['role', 'permissions'],

    data: function () {
        return {
            errors: '',
        }
    },

    methods: {
        roleIsAssignedTo: function (permission) {
            return _.find(this.role.permissions, function (rolePermission) {
                return rolePermission.id == permission.id;
            });
        },
        updatedPermissionsSuccess: function (response) {
            this.errors = null;
            $('.jupiter-role-permissions-modal-' + this.role.id).modal('hide')
        },
        updatedPermissionsFail: function (response) {
            this.errors = response.data
        },
    },

    computed: {
        unlessOnePermissionCheked: function () {
            return true;
        }
    }
})