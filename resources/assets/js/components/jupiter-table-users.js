Vue.component('jupiter-table-users', {

    data: function(){
        return {
            users: '',
            roles: '',
            loading: true,
            sortKey: '',
        }
    },

    created: function() {
        this.fetchUsers();
        this.fetchRoles();
    },

    methods: {
        fetchUsers: function(){
            this.$http.get('/api/user').then(function(response){
                this.$set('users', response.data)
                this.loading = false
            })
        },
        fetchRoles: function(){
            this.$http.get('/api/role').then(function(response){
                this.$set('roles', response.data)
            })
        },
        deleteUserSuccess: function(response){
            window.location.href = "/admin/user";
        },
        deleteUserFail: function(response){
            alertify.error('Woops! Something went wrong!')
        }
    }

})