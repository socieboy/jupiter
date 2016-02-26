Vue.component('jupiter-update-user-roles', {

    props: ['user', 'roles'],

    data: function () {
        return {
            errors: '',
        }
    },

    methods: {
        userIsAssignedTo: function (role) {
            return _.find(this.user.roles, function (userRole) {
                return userRole.id == role.id;
            });
        },
        updatedRolesSuccess: function (response) {
            this.errors = null;
            $('.jupiter-user-roles-modal-' + this.user.id).modal('hide')
        },
        updatedRolesFail: function (response) {
            this.errors = response.data
        },
    },

    computed: {
        unlessOneRoleCheked: function () {
            return true;
        }
    }
})