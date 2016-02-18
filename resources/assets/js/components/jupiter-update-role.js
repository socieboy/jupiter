Vue.component('jupiter-update-role', {

    props:['role'],

    data: function () {
        return {
            errors: '',
        }
    },

    methods: {
        updateRoleSuccess: function (response) {
            window.location.href = "/admin/role";
        },
        updateRoleFail: function (response) {
            this.errors = response.data
        },
    },
})