Vue.component('jupiter-table-roles', {

    data: function(){
        return {
            roles: '',
            permissions: '',
            loading: true,
            sortKey: '',
        }
    },

    created: function() {
        this.fetchRoles();
        this.fetchPermissions();
    },

    methods: {
        fetchRoles: function(){
            this.$http.get('/api/role').then(function(response){
                this.$set('roles', response.data)
                this.loading = false;
            })
        },
        fetchPermissions: function(){
            this.$http.get('/api/permission').then(function(response){
                this.$set('permissions', response.data)
            })
        },
        deleteRoleSuccess: function(response){
            window.location.href = "/admin/role";
        },
        deleteRoleFail: function(response){
            alertify.error('Woops! Something went wrong!')
        }
    }

})