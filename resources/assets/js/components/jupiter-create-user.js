Vue.component('jupiter-create-user', {

    data: function(){
        return {
            generatePassword: true,
            errors: '',
        }
    },

    methods: {
        createUser: function () {
            this.$http.post('/api/user', new FormData(this.$el))
                .then(function(response){
                    window.location.href = "/admin/user";
                }).catch(function(response){
                this.errors = response.data
            })
        }
    }

})