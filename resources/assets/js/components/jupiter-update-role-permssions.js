Vue.component('jupiter-update-role-permssions', {

    props: ['role'],

    methods: {
        roleHasPermission: function (role, permission) {
            return _.find(role.permissions, function (p) {
                return p.id == permission.id;
            });
        },
        updatedPermissionsSuccess: function (role) {
            console.log(role)
        }
    }

})