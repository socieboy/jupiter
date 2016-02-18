Vue.component('jupiter-create-role', {

    data: function(){
        return {
            filterKey: '',
            errors: '',
        }
    },

    methods: {
        createRoleSuccess: function (response) {
            window.location.href = "/admin/role";
        },
        createRoleFail: function (response) {
            this.errors = response.data
        },
    }


})