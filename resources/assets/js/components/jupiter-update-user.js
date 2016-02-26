Vue.component('jupiter-update-user', {

    props: ['user'],

    data: function(){
        return {
            errors: '',
        }
    },

    methods: {
        updateUser: function () {
            this.$http.post('/api/user/' + this.user.id , new FormData(this.$el))
                .then(function(response){
                    window.location.href = "/admin/user";
                }).catch(function(response){
                this.errors = response.data
            })
        }
    }

})